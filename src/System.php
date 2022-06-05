<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class System
{
	/**
	 * Create an invoice, purchase, client or supplier note
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/system/createnote');
		return $returned->System_CreateNote->Body;
	}

	/**
	 * Query the system event log
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function searchEvents($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/system/searchevents');
		return $returned->System_searchEvents->Body;
	}

	/**
	 * Returns meta details for the authorised account
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function getAccountDetails($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/system/getaccountdetails');
		return $returned->System_GetAccountDetails->Body;
	}
}
