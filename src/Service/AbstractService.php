<?php

namespace ZeppelinAPI\Service;

use ZeppelinAPI\Zeppelin;

abstract class AbstractService {
    
    /**
     * @var GetEloqua
     */
    protected $client;
    
    public function __construct( Zeppelin $client ) {
            $this->client = $client;
    }
}