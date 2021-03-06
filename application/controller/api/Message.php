<?php

require_once APP . 'controller/api/AbstractApi.php';
/**
 * Created by Anil Manzoor.
 * This class will strictly be used for Message specific CRUD
 * Date: 02/12/2016
 * Time: 15:47
 * Modified By : Intesar Haider
 */
class Message extends AbstractAPI  {
    /**
     * METHOD : POST
     */
    public function addNewMessage() {
        $requestPayload = $this->requestData;
        
        $response = $this->model->saveNewMessage($requestPayload);
        
        if($response) {
            AbstractApi::_response("Record Saved", 200);
        } else {
            AbstractApi::_response("Something unexpected happened", 500);
        }

    }

    /**
     * METHOD : PUT
     */
    public function updateMessage() {
    }

    /*
     * Get latest message received to a user from a particular or any user for a 
     * any or a particular apartment 
     */
    public function getMessages() 
    {        
        try
        {
            $messageCollection = $this->model->getMessages($this->requestData);
            AbstractAPI::_response($messageCollection);
        }
        catch (Exception $ex)
        {
            AbstractApi::_response("Something unexpected happened" , 500);
        }
    }
    
    /*
     * Get conversation received to a user from a particular user for
     * any or a particular apartment 
     */
    public function getConversation()
    {
        try
        {
            $converstionCollection = $this->model->getConversation($this->requestData);
            AbstractAPI::_response($converstionCollection);
        }
        catch (Exception $ex)
        {
            AbstractApi::_response("Something unexpected happened", 500);
        }        
    }

    /**
     * METHOD : DELETE
     */
    public function deleteMessage() {
    }
    
    /*
     * Get the number of new messages that the user has received
     */
    public function getNewMessagesCount()
    {
        try
        {
            $newMessageCount = $this->model->getNewMessagesCount($this->requestData);
            AbstractAPI::_response($newMessageCount);
        }
        catch (Exception $ex)
        {
            AbstractApi::_response("Something unexpected happened", 500);
        }        
    }
}