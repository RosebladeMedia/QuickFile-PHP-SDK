<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Bank
{
	/**
	 * Returns a list of bank statement transactions for a set of given set of search parameters.
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function search($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/bank/search');
		return $returned->Bank_Search->Body;
	}

	/**
	 * Create a new Bank Account
	 * Please refer [here](https://community.quickfile.co.uk/t/api-method-for-creating-bank-accounts/18738) for more information
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object				Object containing body of response
	 */
	public static function createAccount($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/bank/createaccount');
		return $returned->Bank_CreateAccount->Body;
	}

	/**
	 * Creates upto 100 new untagged bank transactions
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function createTransaction($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/bank/createtransaction');
		return $returned->Bank_CreateTransaction->Body;
	}

	/**
	 * Returns a list of bank accounts based on a search criteria
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function getAccounts($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/bank/getaccounts');
		return $returned->Bank_GetAccounts->Body;
	}

	/**
	 * Returns a list of bank balances based on an array of bank nominal codes
	 * 
	 * @param	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function getAccountBalances($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/bank/getaccountbalances');
		return $returned->Bank_GetAccountBalances->Body;
	}
}
