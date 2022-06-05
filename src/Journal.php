<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Journal
{
	/**
	 * Create a new journal
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/journal/create');
		return $returned->Journal_Create->Body;
	}

	/**
	 * Delete an existing journal
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function delete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/journal/delete');
		return $returned->Journal_Delete->Body;
	}

	/**
	 * Retreive an existing journal
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function get($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/journal/get');
		return $returned->Journal_Get->Body;
	}

	/**
	 * Search for a journal based on specific parameters
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/journal/search');
		return $returned->Journal_Search->Body;
	}
}
