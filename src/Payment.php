<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Payment
{
	/**
	 * Create a new payment record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/payment/create');
		return $returned->Payment_Create->Body;
	}

	/**
	 * Delete a payment record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function delete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/payment/delete');
		return $returned->Payment_Delete->Body;
	}

	/**
	 * Retrieve a payment record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function get($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/payment/get');
		return $returned->Payment_Get->Body;
	}

	/**
	 * Get the collection of payment methods
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function getPayMethods($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/payment/getpaymethods');
		return $returned->Payment_GetPayMethods->Body;
	}

	/**
	 * Search for a payment based on specific search parameters
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/payment/search');
		return $returned->Payment_Search->Body;
	}
}
