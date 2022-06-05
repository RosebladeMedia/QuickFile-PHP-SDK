<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Purchase
{
	/**
	 * Create a new purchase invoice record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/purchase/create');
		return $returned->Purchase_Create->Body;
	}

	/**
	 * Delete an existing purchase invoice
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function delete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/purchase/delete');
		return $returned->Purchase_Delete->Body;
	}

	/**
	 * Retrieve an existing purchase invoice
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function get($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/purchase/get');
		return $returned->Purchase_Get->Body;
	}

	/**
	 * Search for a purchase invoices based on specific search parameters
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/purchase/search');
		return $returned->Purchase_Search->Body;
	}
}
