<?php 

namespace ZeppelinAPI;

/**
*  Zeppelin API
*
*  @author darshan
*/
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Zeppelin {

    protected $baseUrl;
    
    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;
    
    /**
     * @var array
     */
    protected $apis = array();
    
    
    public function __construct($config = array()) {
        if (isset($config['baseUrl'])) {
            $this->baseUrl = $config['baseUrl'];
        }
    }
    
    /**
     * @return string
     */
    public function get_baseUrl() {
        return $this->baseUrl;
    }
    
    
    /**
     * @return \GuzzleHttp\Client
     */
    public function get_httpClient() {
        if (!$this->httpClient) {
            $this->httpClient = new Client(array(
                'base_uri' => $this->get_baseUrl(),
                'headers' => array(
                    'Content-Type' => 'application/json'
                ),
                    ));
        }
        return $this->httpClient;
    }
    
    
    public function get_api($class) {
        $fq_class = '\\ZeppelinAPI\\Service\\' . $class;
        if (!class_exists($fq_class)) {
            throw new ServiceNotFoundException('Service: ' . $class . ' could not be found');
        }
        if (!array_key_exists($fq_class, $this->apis)) {
            $this->apis[$fq_class] = new $fq_class($this);
        }
        return $this->apis[$fq_class];
    }
    
    public function request($path = '', $method = 'get', $data = array()) {
        $options = array();
        switch ($method) {
            case 'get' :
                if (!empty($data)) {
                    $query = array();
                    foreach ($data as $key => $value) {
                        $query[$key] = $value;
                    }
                    $options['filters'] = $query;
                }
                break;
            case 'post' :
            case 'put' :
            case 'patch' :
                if (!empty($data)) {
                    $json = array();
                    foreach ($data as $key => $value) {
                        $json[$key] = $value;
                    }
                    $options['json'] = $json;
                }
                break;
        }
        try {
            /** @var \GuzzleHttp\Psr7\Response $response * */
            $response = $this->get_httpClient()->{$method}($path, $options);
            return json_decode($response->getBody());
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 422) {
                $body = $e->getResponse()->getBody()->getContents();
                $handler = new ValidationExceptionHandler($body);
                $handler->handle();
            } else if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 401) {
                
            } else if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 409) {
                return 'uniqueValidationError';
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return false;
    }
    
    
    /**
     * @return NoteService
     */
    public function note() {
        return $this->get_api('NoteService');
    }
    
    /**
     * @return ParagraphService
     */
    public function paragraph() {
        return $this->get_api('ParagraphService');
    }

    /**
     * @return RepositoryService
     */
    public function repository() {
        return $this->get_api('RepositoryService');
    }
}