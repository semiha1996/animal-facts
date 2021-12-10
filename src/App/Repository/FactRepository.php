<?php

//src/Repository/FactRepository.php

namespace App\Repository;

use Psr\Http\Client\ClientInterface;
use App\Model\Fact;
use App\Model\FactCollection;
use App\Exception\HttpResponseException;
use App\Exception\InvalidResponseBodyException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\MessageInterface;
use JsonException;
use stdClass;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

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
        for($i=0; $i<10; $i++){
            $request = $this->createRequest(
                    'GET /facts/random',
                    ['amount'=>$amount, 'animal_type'=>$animalType]);
             $response = $httpClient->sendRequest($request);
            try{
                $this->ensureHttpResponseIsOK($response);
            } catch (HttpResponseException $ex) {
                $ex->getMessage();
            }
                $body = $response->getBody();
            try {
                //Returns stdClass or array
                $decodedBody = $this->decodeResponceBody($body);
            } catch(InvalidResponseBodyException $ex){
                $ex->getMessage();
            }
            $factCollection->offsetSet($i, $decodedBody);
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
    public function getFact(string $id):Fact 
    {
        $request = $this->createRequest(
                'GET /facts/:factID',
                [0=>$id]);
        $response = $httpClient->sendRequest($request);
        try{
            $this->ensureHttpResponseIsOK($response);
        } catch (HttpResponseException $ex) {
            $ex->getMessage();
        }
        $body = $response->getBody();
        try{
            $decodedBody = $this->decodeResponceBody($body);
        } catch(InvalidResponseBodyException $ex){
            $ex->getMessage();
        }
        return $decodedBody;
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
            array $params
            ): RequestInterface {
        //Create a client with a base URI
        $httpClient = new Client();
        $request = new Request('GET', $endpoint,$params); 
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
        if($response->getStatusCode() != 200){
            throw new HttpResponceException('Http response NOT OK.');
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
            ):array|\stdClass {
        try{
            $decodedBody = json_decode($body, null, );
        } catch(JsonException $ex){
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

         foreach($object as $property => &$value){
            $fact->$property = &$value;
            unset($object->$property);
        }
        unset($value);
        $object = (unset) $object;
        return $fact;
    } 
}
