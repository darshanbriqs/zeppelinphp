<?php

namespace ZeppelinAPI\Service;

class RepositoryService extends AbstractService
{   
    /**
    *  Get a paragraph information
    */
    public function reload($options = array() ) {
        return $this->client->request( 'api/notebook-repositories/reload', 'get', $options );   
    }
    
}