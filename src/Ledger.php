<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Ledger
{
	/**
	 * Query a nominal ledger based on a specific date or amount range
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/ledger/search');
		return $returned->Ledger_Search->Body;
	}

	/**
	 * Returns information on a specified range of nominal ledgers
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function getNominalLedgers($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/ledger/getnominalledgers');
		return $returned->Ledger_GetNominalLedgers->Body;
	}
}
