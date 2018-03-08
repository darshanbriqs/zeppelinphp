<?php

namespace ZeppelinAPI\Service;

class ParagraphService extends AbstractService
{   
    /**
    *  Get a paragraph information
    */
    public function one( $note_id, $paragraph_id, $options = array() ) {
        return $this->client->request( 'api/notebook/'.$note_id.'/paragraph/'.$paragraph_id.'', 'get', $options );   
    }
    
    /**
    *  Create a new paragraph  
    */
    public function create( $options = array() ) {
        return $this->client->request( 'api/notebook/'.$note_id.'/paragraph', 'post', $options );
    }
    
    /**
    *  Update paragraph configuration  
    */
    public function updateParagraphConfig( $note_id, $paragraph_id ) {
        return $this->client->request( 'api/notebook/'.$note_id.'/paragraph/'.$paragraph_id.'/config', 'put' );   
    }
    
    /**
    *  Get the status of a single paragraph  
    */
    public function statusParagraph( $note_id, $paragraph_id ) {
        return $this->client->request( 'api/notebook/job/'.$note_id.'/'.$paragraph_id.'', 'get' );   
    }
}