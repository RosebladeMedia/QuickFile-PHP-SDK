<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Client
{
	/**
	 * Create a new client record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/create');
		return $returned->Client_Create->Body;
	}

	/**
	 * Delete a client record
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object				Object containing body of response
	 */
	public static function delete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/delete');
		return $returned->Client_Delete->Body;
	}

	/**
	 * Retrieve client and contact data
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function get($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/get');
		return $returned->Client_Get->Body;
	}

	/**
	 * Create a new contact record for an existing client
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function insertContacts($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/insertcontacts');
		return $returned->Client_InsertContacts->Body;
	}

	/**
	 * Retrieve a passwordless login URL for a client
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function login($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/login');
		return $returned->Client_Login->Body;
	}

	/**
	 * Initiate a new Direct Debit collection request
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function newDirectDebitCollection($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/newdirectdebitcollection');
		return $returned->Client_NewDirectDebitCollection->Body;
	}

	/**
	 * Retrieve client records based on a set of search parameters
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/search');
		return $returned->Client_Search->Body;
	}

	/**
	 * Update an existing client record
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function update($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/client/update');
		return $returned->Client_Update->Body;
	}
}
