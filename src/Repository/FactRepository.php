<?php

namespace App\Repository;

use Psr\Http\Client\ClientInterface;
use App\Model\Fact;
use App\Model\FactCollection;
use App\Exception\HttpResponseException;
use App\Exception\InvalidResponseBodyException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use JsonException;
use stdClass;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use App\Model\Status;
use App\Model\User;
use App\Exception\InvalidFactTypeException;

/**
 * Loads Fact models with information from the remote Animal Facts API
 *
 * @author semiha
 */
class FactRepository
{
    protected string $baseUrl;
    protected ClientInterface $httpClient;

    public function __construct(string $baseUrl, ClientInterface $httpClient)
    {
        $this->baseUrl = $baseUrl;
        $this->httpClient = $httpClient;
    }

    /**
     * Loads a list with Fact objects
     *
     * @param int $amount - The amount of facts that should be loaded
     *
     * @param string $animalType - The animal type. Default is Fact::CAT
     *
     * @return FactCollection
     */
    public function getRandomList(
        int $amount = 10,
        string $animalType = Fact::CAT
    ): FactCollection {
        $factCollection = new FactCollection();
        $request = $this->createRequest(
            $this->baseUrl . '/facts/random?animal_type=' . $animalType . '&amount=' . $amount
        );
        $response = $this->httpClient->sendRequest($request);
        try {
            $this->ensureHttpResponseIsOK($response);
        } catch (HttpResponseException $ex) {
            $ex->getMessage();
            return $factCollection;
        }
        $body = $response->getBody();
        try {
            //Returns an array in this case
            $decodedBody = $this->decodeResponceBody($body);
            for ($i = 0; $i < DEFAULT_AMOUNT; $i++) {
                $bodyToObj = (object) array_values($decodedBody)[$i];
                //Convert the array to object
                $factObj = $this->createFact($bodyToObj);
                $factCollection->offsetSet($i, $factObj);
            }
        } catch (InvalidResponseBodyException $ex) {
            $ex->getMessage();
        }
        return $factCollection;
    }

    /**
     * Loads single fact by its id
     *
     * @param string $id - The identifier of the fact that should be loaded
     *
     * @return Fact
     */
    public function getFact(string $id): Fact
    {
        $request = $this->createRequest(
            $this->baseUrl . '/facts/' . $id
        );
        $response = $this->httpClient->sendRequest($request);
        try {
            $this->ensureHttpResponseIsOK($response);
        } catch (HttpResponseException $ex) {
            $ex->getMessage();
            return new Fact();
        }
        $body = $response->getBody();
        try {
            //Returns stdClass in this case
            $decodedBody = $this->decodeResponceBody($body);
            $fact = $this->createFact($decodedBody);
        } catch (InvalidResponseBodyException $ex) {
            $ex->getMessage();
        }
        return $fact;
    }

    /**
     * Creates the PSR HTTP request object
     *
     * @param string $endpoint - The API endpoint that must be called
     *
     * @param array $params - Query parameters for the URL
     *
     * @return RequestInterface
     */
    protected function createRequest(
        string $endpoint,
        array $params = []
    ): RequestInterface {
        //Create a client with a base URI
        $this->httpClient = new Client();
        $request = new Request('GET', $endpoint, $params);
        return $request;
    }

    /**
     * Ensures the response status is OK
     *
     * @param ResponseInterface $response
     *
     * @throws HttpResponseException
     */
    protected function ensureHttpResponseIsOK(ResponseInterface $response)
    {
        if ($response->getStatusCode() != 200) {
            throw new HttpResponseException('Http response code != 200 / NOT OK.');
        }
    }

    /**
     * Decodes the response body
     *
     * @param StreamInterface $body - The response body for decoding
     *
     * @return array|\stdClass
     *
     * @throws InvalidResponseBodyException
     */
    protected function decodeResponceBody(
        StreamInterface $body
    ): array|\stdClass {
        try {
            $decodedBody = json_decode($body, null);
        } catch (JsonException $ex) {
            $ex->getMessage();
            throw new InvalidResponseBodyException('Problem with json decoding'
                . 'of the response body ');
        }
        return $decodedBody;
    }

    /**
     * Creates Fact object from stdClass
     *
     * @param stdClass $object - The values that will be added to the Fact object
     *
     * @return Fact
     */
    protected function createFact(\stdClass $object): Fact
    {
        $fact = new Fact();
        // Check if the fields are set at all
        if (isset($object->{'status'}->{'verified'})) {
            $verified = $object->{'status'}->{'verified'};
        } else {
            $verified = false;
        }
        if (isset($object->{'status'}->{'sentCount'})) {
            $sentCount = $object->{'status'}->{'sentCount'};
        } else {
            $sentCount = 0;
        }
        $status = new Status($verified, $sentCount);
        $fact->setStatus($status);

        $fact->setId($object->{'_id'});
        $fact->setText($object->{'text'});

        if (isset($object->{'user'}->{'_id'})) {
            $id = $object->{'user'}->{'_id'};
        } else {
            $id = '';
        }
        if (isset($object->{'user'}->{'photo'})) {
            $photo = $object->{'user'}->{'photo'};
        } else {
            $photo = '';
        }
        if (isset($object->{'user'}->{'name'})) {
            $firstName = $object->{'user'}->{'name'}->{'first'};
            $lastName = $object->{'user'}->{'name'}->{'last'};
            $name = ['first' => $firstName, 'last' => $lastName];
        } else {
            $name = [];
        }
        $user = new User($id, $photo, $name);
        $fact->setAuthor($user);

        try {
            $fact->setType($object->{'type'});
        } catch (InvalidFactTypeException $ex) {
            $ex->getMessage();
        }

        $dateCreatedAt = date_create_immutable($object->{'createdAt'});
        $fact->setCreatedAt($dateCreatedAt);

        if ($object->{'updatedAt'} == '') {
            $fact->setUpdatedAt($dateCreatedAt);
        }
        $dateUpdatedAt = \date_create_immutable($object->{'updatedAt'});
        $fact->setUpdatedAt($dateUpdatedAt);
        return $fact;
    }
}
