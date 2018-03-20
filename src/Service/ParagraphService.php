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
    public function create( $note_id, $options = array() ) {
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
    
    /**
    *  Delete a paragraph  
    */
    public function delete( $note_id, $paragraph_id ) {
        return $this->client->request( 'api/notebook/'.$note_id.'/paragraph/'.$paragraph_id.'', 'delete' );   
    }
    
    /**
    *  Run a paragraph asynchronously  
    */
    public function runParagraphAsync( $note_id, $paragraph_id ) {
        return $this->client->request( 'api/notebook/job/'.$note_id.'/'.$paragraph_id.'', 'post' );   
    }
    
    /**
    *  Run a paragraph synchronously  
    */
    public function runParagraphSync( $note_id, $paragraph_id ) {
        return $this->client->request( 'api/notebook/run/'.$note_id.'/'.$paragraph_id.'', 'post' );   
    }
    
    /**
    *  Stop a paragraph  
    */
    public function stopParagraph( $note_id, $paragraph_id ) {
        return $this->client->request( 'api/notebook/job/'.$note_id.'/'.$paragraph_id.'', 'delete' );   
    }
    
    /**
    *  Move a paragraph to the specific index 
    */
    public function moveParagraphToIndex( $note_id, $paragraph_id, $index ) {
        return $this->client->request( 'api/notebook/'.$note_id.'/paragraph/'.$paragraph_id.'/move/'.$index.'', 'post' );   
    }
}