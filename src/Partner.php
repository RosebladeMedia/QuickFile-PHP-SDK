<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Partner
{
	/**
	 * @var int
	 */
	protected static int $accountNumber;

	/**
	 * @var string
	 */
	protected static string $token;

	/**
	 * @var string
	 */
	protected static string $productKey;

	/**
	 * @var string
	 */
	protected static string $secretKey;

	/**
	 * @var string
	 */
	protected static string $applicationId;

	/**
	 * @var string
	 */
	protected static string $apiKey;

	/**
	 * @var string
	 */
	private static string $APIBase 	= 'https://api.quickfile.co.uk/partners/';

	//--------------------------------------------------------------------------
	// Config Functions
	//--------------------------------------------------------------------------

	/**
	 * @param string $key	Secret key issued by QuickFile
	 */
	public static function setSecretKey(string $key): void
	{
		self::$secretKey	= $key;
	}

	/**
	 * @return string
	 */
	public static function getSecretKey(): string
	{
		return self::$secretKey;
	}

	/**
	 * @param int $accountNumber 	User's QuickFile account number
	 */
	public static function setAccountNumber(int $accountNumber): void
	{
		self::$accountNumber	= $accountNumber;
	}

	/**
	 * @return int
	 */
	public static function getAccountNumber(): int
	{
		return self::$accountNumber;
	}

	/**
	 * @param string $token		Token provided by user
	 */
	public static function setToken(string $token): void
	{
		self::$token 	= $token;
	}

	/**
	 * @return string
	 */
	public static function getToken(): string
	{
		return self::$token;
	}

	/**
	 * @param string $productKey 	Product Key from QuickFile
	 */
	public static function setProductKey(string $productKey): void
	{
		self::$productKey 	= $productKey;
	}

	/**
	 * @return string
	 */
	public static function getProductKey(): string
	{
		return self::$productKey;
	}

	/**
	 * @param   string  $applicationID  QuickFile App ID
	 */
	public static function setApplicationID($applicationID): void
	{
		self::$applicationId    = $applicationID;
	}

	/**
	 * @return string
	 */
	public static function getApplicationID(): string
	{
		return self::$applicationId;
	}

	/**
	 * @param   string  $apiKey         Account API Key
	 */
	public static function setAPIKey($apiKey): void
	{
		self::$apiKey           = $apiKey;
	}

	/**
	 * @return string
	 */
	public static function getAPIKey(): string
	{
		return self::$apiKey;
	}

	/**
	 * Sets up the config with an array of 4 variables - AccountNumber, SecretKey, Token, ProductKey
	 *
	 * @param array $credentials
	 * 
	 * @return void
	 */
	public static function config(array $credentials): void
	{
		if (isset($credentials['AccountNumber']))
		{
			self::setAccountNumber($credentials['AccountNumber']);
		}

		if (isset($credentials['SecretKey']))
		{
			self::setSecretKey($credentials['SecretKey']);
		}

		if (isset($credentials['Token']))
		{
			self::setToken($credentials['Token']);
		}

		if (isset($credentials['ProductKey']))
		{
			self::setProductKey($credentials['ProductKey']);
		}
	}

	//--------------------------------------------------------------------------
	// Helper Functions
	//--------------------------------------------------------------------------

	private static function getMD5(): string
	{
		return md5(
			self::getAccountNumber() . ':' .
				self::getSecretKey()
		);
	}

	//--------------------------------------------------------------------------
	// General Functions
	//--------------------------------------------------------------------------

	/**
	 * Generates an Application ID and API Key from the token and other config
	 * details
	 *
	 * @param bool $verifyProduct	Whether to check if the product key returned matches the one set in the config
	 * @param bool $returnArray		Whether to return the results as an array rather than a bool on success/fail
	 * 
	 * @return array|bool 			Array contains APIKey, ApplicationID and AccountNumber, suited for the \QuickFile\QuickFile::config() function
	 */
	public static function authenticate(bool $verifyProduct = true, bool $returnArray = false): array|bool
	{
		/** Setup Guzzle and the data to be sent */
		$client     = new \GuzzleHttp\Client([
			'base_uri' => self::$APIBase
		]);

		$response 	= $client->request('POST', 'authenticate', [
			'form_params' => [
				'token'		=> self::getToken(),
				'md5'		=> self::getMD5()
			]
		]);

		/** Get the status code to check for failures */
		$httpCode               = $response->getStatusCode();

		/** Was the call successful? */
		if ($httpCode != 200)
		{
			/** Code other than 200 OK returned. Log and process the errors, and throw exception */
			throw new \Exception("HTTP Error " . $httpCode . " returned by QuickFile.");
		}
		else
		{
			/** Decode the response and return it */
			$responseObj 	= json_decode((string) $response->getBody());

			/** If the user has asked for the product key to be verified, do so here */
			if ($verifyProduct)
			{
				if ($responseObj->product_key != self::getProductKey())
				{
					return false;
				}
			}

			/** All good, set up the variables */
			self::setApplicationID($responseObj->application_id);
			self::setAPIKey($responseObj->api_key);

			/** An array may be requested, so we handle this here */
			if ($returnArray)
			{
				return [
					'APIKey'			=> $responseObj->api_key,
					'ApplicationID'		=> $responseObj->application_id,
					'AccountNumber' 	=> self::getAccountNumber()
				];
			}

			return true;
		}
	}

	/**
	 * Sets up the config of \QuickFile\QuickFile based on the details saved in this class
	 *
	 * @return void
	 */
	public static function setupConfig(): void
	{
		\QuickFile\QuickFile::config([
			'APIKey'			=> self::getAPIKey(),
			'ApplicationID'		=> self::getApplicationID(),
			'AccountNumber' 	=> self::getAccountNumber()
		]);
	}
}
