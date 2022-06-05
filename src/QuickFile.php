<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class QuickFile
{
	/**
	 * @var int QuickFile account number
	 */
	public static int $accountNumber;

	/**
	 * @var string Application ID for the API call
	 */
	public static string $applicationID;

	/**
	 * @var string API Key for the QuickFile account
	 */
	public static string $apiKey;

	public static string $submissionGenerator  = "uniqid";

	public static bool $verifySslCerts = false;

	public static string $APIBase              = "https://api.quickfile.co.uk/";

	public static string $apiVersion           = "1_2";

	const VERSION                       = "2.0.0beta";

	/**
	 * @param   int     $accountNumber QuickFile account number
	 */
	public static function setAccountNumber($accountNumber)
	{
		self::$accountNumber    = $accountNumber;
	}

	/**
	 * @return  int
	 */
	public static function getAccountNumber()
	{
		return self::$accountNumber;
	}

	/**
	 * @param   string  $applicationID  QuickFile App ID
	 */
	public static function setApplicationID($applicationID)
	{
		self::$applicationID    = $applicationID;
	}

	/**
	 * @return string
	 */
	public static function getApplicationID()
	{
		return self::$applicationID;
	}

	/**
	 * @param   string  $apiKey         Account API Key
	 */
	public static function setAPIKey($apiKey)
	{
		self::$apiKey           = $apiKey;
	}

	/**
	 * @return string
	 */
	public static function getAPIKey()
	{
		return self::$apiKey;
	}

	/**
	 * @param   string  $function       Name of the PHP function that should be used to generate a submission number
	 */
	public static function setSubmissionGenerator($function)
	{
		self::$submissionGenerator  = $function;
	}

	/**
	 * @return string
	 */
	public static function getSubmissionGenerator()
	{
		return self::$submissionGenerator;
	}

	/**
	 * @param   array   $values         Array of authentication details (AccountNumber, APIKey and ApplicationID)
	 */
	public static function config($values)
	{
		self::setAccountNumber($values['AccountNumber']);
		self::setAPIKey($values['APIKey']);
		self::setApplicationID($values['ApplicationID']);
	}
}
