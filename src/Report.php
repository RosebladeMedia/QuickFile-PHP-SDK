<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Report
{
	/**
	 * Retreives a creditor or debtor ageing report
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function ageing($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/report/ageing');
		return $returned->Report_Ageing->Body;
	}

	/**
	 * Retreives a balance sheet report
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function balanceSheet($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/report/balancesheet');
		return $returned->Report_BalanceSheet->Body;
	}

	/**
	 * Retreives a chart of nominal accounts
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function chartOfAccounts($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/report/chartofaccounts');
		return $returned->Report_ChartOfAccounts->Body;
	}

	/**
	 * Retreives a profit and loss report
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function profitAndLoss($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/report/profitandloss');
		return $returned->Report_ProfitAndLoss->Body;
	}

	/**
	 * Retreives a list of filed and open VAT returns
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function vatObligations($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/report/vatobligations');
		return $returned->Report_VatObligations->Body;
	}

	/**
	 * Retreives a list of filed and open VAT returns
	 * 
	 * @param 	array	$body		Array for body of API call (should be left empty)
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function subscriptions($body = null)
	{
		$returned = \QuickFile\Request::_sendData([], '/report/subscriptions');
		return $returned->Report_Subscriptions->Body;
	}
}
