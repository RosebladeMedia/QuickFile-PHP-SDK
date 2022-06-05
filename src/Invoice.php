<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Invoice
{
	/**
	 * Create a new invoice, estimate or recurring invoice template
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/invoice/create');
		return $returned->Invoice_Create->Body;
	}

	/**
	 * Delete an invoice, estimate or recurring invoice template
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function delete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/invoice/delete');
		return $returned->Invoice_Delete->Body;
	}

	/**
	 * Retrieve a single invoice, estimate or recurring invoice template
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function get($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/invoice/get');
		return $returned->Invoice_Get->Body;
	}

	/**
	 * Retrieve a URL to for an invoice or estimate PDF document
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function getPdf($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/invoice/getpdf');
		return $returned->Invoice_GetPDF->Body;
	}

	/**
	 * Search for invoices and estimates using a specific set of search parameters
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/invoice/search');
		return $returned->Invoice_Search->Body;
	}

	/**
	 * Send an invoice or estimate by email or snail mail
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function send($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/invoice/send');
		return $returned->Invoice_Send->Body;
	}
}
