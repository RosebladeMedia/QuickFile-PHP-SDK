<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Estimate
{
	/**
	 * Mark an estimate as accepted or declined
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function acceptDecline($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/estimate/acceptdecline');
		return $returned->Estimate_AcceptDecline->Body;
	}

	/**
	 * Creates an invoice from a given estimate
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function convertToInvoice($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/estimate/convertToInvoice');
		return $returned->Estimate_ConvertToInvoice->Body;
	}
}
