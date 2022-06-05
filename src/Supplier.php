<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Supplier
{
	/**
	 * Create a new supplier record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/supplier/create');
		return $returned->Supplier_Create->Body;
	}

	/**
	 * Delete a supplier record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function delete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/supplier/delete');
		return $returned->Supplier_Delete->Body;
	}

	/**
	 * Retrieve supplier and contact data
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function get($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/supplier/get');
		return $returned->Supplier_Get->Body;
	}

	/**
	 * Retrieve supplier records based on a set of search parameters
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/supplier/search');
		return $returned->Supplier_Search->Body;
	}
}
