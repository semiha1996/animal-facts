<?php

//src/Repository/FactRepository.php

namespace App\Repository;

use Psr\Http\Client\ClientInterface;
use App\Model\Fact;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Model\FactCollection;
use Psr\Http\Message\StreamInterface;
use stdClass;

/**
 * Loads Fact models with information from the remote Animal Facts API
 *
 * @author semiha
 */
class FactRepository {
    protected string $baseUrl;
    
    protected ClientInterface $httpClient;
    
    public function __construct(string $baseUrl, ClientInterface $httpClient) {
        $this->baseUrl = $baseUrl;
        $this->httpClient = $httpClient;
    }

    /**
     * Loads a list with Fact objects
     * @param int $amount - The amount of facts that should be loaded
     * @param string $animalType - The animal type. Default is Fact::CAT
     * @return FactCollection
     */
    public function getRandomList(
            int $amount = 10,
            string $animalType = Fact::CAT): FactCollection{
        
    }
    
    /**
     * Loads single fact by its id
     * @param string $id - The identifier of the fact that should be loaded
     * @return Fact
     */
    public function getFact(string $id):Fact {
        return Fact;
    }
    
    /**
     * Creates the PSR HTTP request object
     * @param string $endpoint - The API endpoint that must be called
     * @param array $params - Query parameters for the URL
     * @return RequestInterface
     */
    protected function createRequest(
            string $endpoint, 
            array $params): RequestInterface{
        
        return RequestInterface;
    }
    
    /**
     * Ensures the response status is OK
     * throws HttpResponseException
     * @param ResponseInterface $response
     */
    protected function ensureHttpResponseIsOK(
            ResponseInterface $response) {
        
    }
    
    /**
     * Decodes the response body
     * throws InvalidResponseBodyException
     * @param StreamInterface $body - The response body for decoding
     * @return array|\stdClass
     */
    protected function decodeResponceBody(
            StreamInterface $body):array|\stdClass {
        
        return;
    }
    
    /**
     * Creates Fact object from stdClass
     * @param stdClass $object - The values that will be added to the Fact object
     * @return Fact
     */
    protected function createFact(stdClass $object): Fact {
        return;
    }
}
