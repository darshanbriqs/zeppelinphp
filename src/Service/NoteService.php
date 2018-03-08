<?php

namespace ZeppelinAPI\Service;

class NoteService extends AbstractService
{
    /**
     * Returns all note
     */
    public function all( $options = array() ) {
        return $this->client->request( 'api/notebook', 'get', $options );   
    }
    
    /**
    *  Returns one note  
    */
    public function one( $note_id, $options = array() ) {
        return $this->client->request( 'api/notebook/'.$note_id.'', 'get', $options );   
    }
    
    /**
    *  Create a new note  
    */
    public function create( $options = array() ) {
        return $this->client->request( 'api/notebook', 'post', $options );
    }
    
    /**
    *  Delete a note  
    */
    public function delete( $note_id ) {
        return $this->client->request( 'api/notebook/'.$note_id.'', 'delete' );   
    }
    
    /**
    *  Get the status of all paragraphs  
    */
    public function statusParagraphs( $note_id ) {
        return $this->client->request( 'api/notebook/job/'.$note_id.'', 'get' );   
    }
    
    
    /**
    *  Clone a note  
    */
    public function cloneNote( $note_id, $options = array() ) {
        return $this->client->request( 'api/notebook/'.$note_id.'', 'post', $options );   
    }
    
    /**
    *  Run all paragraphs  
    */
    public function runAllParagraphs( $note_id ) {
        return $this->client->request( 'api/notebook/job/'.$note_id.'', 'post' );   
    }
    
    /**
    *  Stop all paragraphs  
    */
    public function stopAllParagraphs( $note_id ) {
        return $this->client->request( 'api/notebook/job/'.$note_id.'', 'delete' );   
    }
    
    /**
    *  Clear all paragraph result  
    */
    public function clearAllParagraphResults( $note_id ) {
        return $this->client->request( 'api/notebook/'.$note_id.'/clear', 'put' );   
    }
    
}