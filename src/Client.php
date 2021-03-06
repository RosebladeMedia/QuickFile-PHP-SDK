<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Client
{
    /**
     * @return  object              Returns a list of clients matching the criteria
     */
    public static function search($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/client/search');
        return $returned->Client_Search->Body;
    }

    /**
     * @return  object              Retrieves a client based on ID
     */
    public static function get($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/client/get');
        return $returned->Client_Get->Body;
    }

    /**
     * @return  object              Returns object with client ID and IDs for any contacts
     */
    public static function create($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/client/create');
        return $returned->Client_Create->Body;
    }

    /**
     * @return  object              Returns object with client ID and IDs for any contacts
     */
    public static function update($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/client/update');
        return $returned->Client_Update->Body;;
    }

    /**
     * @return  int                 Returns count of clients deleted
     */
    public static function delete($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/client/delete');
        return $returned->Client_Delete->Body;
	}
	
	/**
     * @return  string|\Exception	Returns the GoCardless bill ID
     */
    public static function newDirectDebitCollection($output)
    {
        // Send request
		$returned 	= \QuickFile\Request::_sendData($output, '/client/newdirectdebitcollection');
		
		$body 		= $returned->Client_NewDirectDebitCollection->Body;
		
		/** Was an error returned? */
		if(!empty($body->Error))
		{
			\QuickFile\Request::setError($body->Error);
			throw new \Exception("An error was returned by QuickFile. Please see error list for details.");
		}

        return $body->GoCardlessBillID;
    }
}