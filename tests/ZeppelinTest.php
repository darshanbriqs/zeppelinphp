<?php 

/**
*  Corresponding Class to test Zeppelin class
*
*  @author darshan
*/
class ZeppelinTest extends PHPUnit_Framework_TestCase{
	
    /**
    * Create a new note
    *
    */
    public function testCreateNoteApiCall(){
        $var = new ZeppelinAPI\Zeppelin(
                array(
                    'baseUrl'=>'http://127.0.0.1:8080/'
                ));
        
        $data['name'] =  'note with paragraph';
        $data['paragraphs'] = [
            ['title' => 'paragraph title1',
            'text' => 'paragraph text1'],
            ['title' => 'paragraph title2',
            'text' => 'paragraph text2']
        ];

        $this->assertTrue(is_object($var->note()->create($data)));
        unset($var);
    }
    
    /**
    * List of the notes
    *
    */
    public function testListNoteApiCall(){
        $var = new ZeppelinAPI\Zeppelin(
                array(
                    'baseUrl'=>'http://127.0.0.1:8080/'
                ));

        $this->assertTrue(is_object($var->note()->all()));
        unset($var);
    }
    
    /**
    * Get an existing note information
    *
    */
//    public function testGetExistingNoteApiCall(){
//        $var = new ZeppelinAPI\Zeppelin(
//                array(
//                    'baseUrl'=>'http://127.0.0.1:8080/'
//                ));
//        
//        $note_id = '2D8C8D6VD';
//        $this->assertTrue(is_object($var->note()->one($note_id)));
//        unset($var);
//    }
    
    /**
    * Delete a note
    *
    */
//    public function testDeleteNoteApiCall(){
//        $var = new ZeppelinAPI\Zeppelin(
//                array(
//                    'baseUrl'=>'http://127.0.0.1:8080/'
//                ));
//        
//        $note_id = '2D8C8D6VD';
//        $this->assertTrue(is_object($var->note()->delete($note_id)));
//        unset($var);
//    }
    
    /**
    * Get the status of all paragraphs
    *
    */
    public function testStatusOfNoteParagraphApiCall(){
        $var = new ZeppelinAPI\Zeppelin(
                array(
                    'baseUrl'=>'http://127.0.0.1:8080/'
                ));
        
        $note_id = '2A94M5J1Z';
        $res = $var->note()->statusParagraphs($note_id);
        $this->assertTrue(is_object($var->note()->statusParagraphs($note_id)));
        $this->assertEquals('OK', $res->status);
        unset($var);
    }
    
    /**
    * Clone a note
    *
    */
    public function testCloneNoteApiCall(){
        $var = new ZeppelinAPI\Zeppelin(
                array(
                    'baseUrl'=>'http://127.0.0.1:8080/'
                ));
        
        $note_id = '2A94M5J1Z';
        $data['name'] =  'new clone note';
        $res = $var->note()->cloneNote($note_id, $data);
        $this->assertEquals('CREATED', $res->status);
        unset($var);
    }
    
    /**
    * Run all paragraphs
    *
    */
    public function testRunAllParagraphsApiCall(){
        $var = new ZeppelinAPI\Zeppelin(
                array(
                    'baseUrl'=>'http://127.0.0.1:8080/'
                ));
        
        $note_id = '2A94M5J1Z';
        $res = $var->note()->runAllParagraphs($note_id);
        unset($var);
    }
    
    /**
    * Stop all paragraphs
    *
    */
    public function testStopAllParagraphsApiCall(){
        $var = new ZeppelinAPI\Zeppelin(
                array(
                    'baseUrl'=>'http://127.0.0.1:8080/'
                ));
        
        $note_id = '2BWJFTXKJ';
        $res = $var->note()->stopAllParagraphs($note_id);
        $this->assertEquals('OK', $res->status);
        unset($var);
    }
    
    /**
    * Clear all paragraph results
    *
    */
    public function testClearAllParagraphResultsApiCall(){
        $var = new ZeppelinAPI\Zeppelin(
                array(
                    'baseUrl'=>'http://127.0.0.1:8080/'
                ));
        
        $note_id = '2DABH66R9';
        $res = $var->note()->clearAllParagraphResults($note_id);
        $this->assertEquals('OK', $res->status);
        unset($var);
    }
}