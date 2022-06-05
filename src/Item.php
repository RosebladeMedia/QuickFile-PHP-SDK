<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Item
{
	/**
	 * Create a new inventory item or task
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/item/create');
		return $returned->Item_Create->Body;
	}

	/**
	 * Delete an inventory item or task
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function delete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/item/delete');
		return $returned->Item_Delete->Body;
	}

	/**
	 * Retrieve an inventory item or task
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function get($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/item/get');
		return $returned->Item_Get->Body;
	}

	/**
	 * Search for inventory items or tasks based on a set of search parameters
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/item/search');
		return $returned->Item_Search->Body;
	}
}
