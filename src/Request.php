<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Request
{
	/**
	 * @var string Last request
	 */
	private static $_lastRequest;

	/**
	 * @var string Last response
	 */
	private static $_lastResponse;

	/**
	 * @var array List of errors from last response (if applicable)
	 */
	private static $_errorList	= [];

	/**
	 * @return string Last recorded response
	 */
	public static function getLastRequest()
	{
		return self::$_lastRequest;
	}

	/**
	 * @param string 		Data to set
	 */
	public static function setLastRequest($request)
	{
		self::$_lastRequest 	= $request;
	}

	/**
	 * @return string Last recorded response
	 */
	public static function getLastResponse()
	{
		return self::$_lastResponse;
	}

	/**
	 * @param string 		Data to set
	 */
	public static function setLastResponse($response)
	{
		self::$_lastResponse 	= $response;
	}

	/**
	 * @return array Last recorded response
	 */
	public static function getErrors()
	{
		return self::$_errorList;
	}

	/**
	 * @param array|string 		Error to record
	 */
	public static function setErrors($error)
	{
		/** If it's an array, merge it with the one that exists */
		if (is_array($error))
		{
			self::$_errorList 	= array_merge(self::$_errorList, $error);
		}
		else
		{
			self::$_errorList[] = $error;
		}
	}

	/**
	 * @param string            Endpoint for the command
	 * @param string            Data to send
	 * 
	 * @return object|boolean   Data returned from API, or false on error
	 */
	public static function sendToEndPoint($endpoint, $data)
	{
		return self::_sendData($data, $endpoint);
	}

	/**
	 * @return boolean Check if all details needed are present
	 */
	private static function _detailCheck()
	{
		/** Do we have - account number, App ID and APIKey? */
		if ((\QuickFile\QuickFile::getAccountNumber()) && (\QuickFile\QuickFile::getApplicationID()) && (\QuickFile\QuickFile::getAPIKey()))
		{
			return true;
		}
		else
		{
			throw new \Exception("Missing required account details");
		}
	}

	/**
	 * Generates a geneic header for the request
	 * 
	 * @param string 			$submissionCode 	Unique submission code
	 * 
	 * @return string|boolean 	Tries to format the standard header (excluding outter wrapper)
	 */
	private static function _jsonHeader($submissionCode)
	{
		if (self::_detailCheck())
		{
			/** Build the array as required for the header */
			$output = [
				'MessageType'       => 'Request',
				'SubmissionNumber'  => $submissionCode,
				'Authentication'    => [
					'AccNumber'         => \QuickFile\QuickFile::getaccountNumber(),
					'MD5Value'          => md5(\QuickFile\QuickFile::getAccountNumber() . \QuickFile\QuickFile::getAPIKey() . $submissionCode),
					'ApplicationID'     => \QuickFile\QuickFile::getApplicationID()
				]
			];

			return $output;
		}
	}

	/**
	 * @return string|exception Submission number
	 */
	private static function _getSubmissionCode()
	{
		$func = \QuickFile\QuickFile::$submissionGenerator;

		if (function_exists($func))
		{
			return $func();
		}
		else
		{
			throw new \Exception("Unknown functon specified for submission number generation");
		}
	}

	/**
	 * Prepares the data for sending (e.g. setting the expected format)
	 *
	 * @param mixed $data
	 * 
	 * @return array
	 */
	public static function PrepRequest(array $data): array
	{
		/** Generate submission code */
		$submissionCode 	= self::_getSubmissionCode();

		/** Sort out the data into the payload format */
		$output     = [
			'payload' => [
				'Header'    => self::_jsonHeader($submissionCode),
				'Body'      => $data
			]
		];

		return $output;
	}

	/**
	 * @param   array  	$data       The data to send to the API endpoint
	 * @param   string  $endPoint   URL endpoint for the JSON API
	 * @return  boolean|object      False on failure, object on success
	 */
	public static function _sendData(array $data, $endPoint)
	{
		/** We can accept $data as an array and prep the data */
		if (is_array($data))
		{
			if (!isset($data['payload']['Header']))
			{
				$request 	= self::prepRequest($data);
			}
		}

		/** Attempt the call */
		try
		{
			/** Generate the request URL and remove any double slashes */
			$requestUrl 	= \QuickFile\QuickFile::$apiVersion . $endPoint;
			preg_replace('#/+#', '/', $requestUrl);

			/** Setup Guzzle and the data to be sent */
			$client     = new \GuzzleHttp\Client([
				'base_uri' => \QuickFile\QuickFile::$APIBase
			]);

			$response   = $client->request('POST', $requestUrl, [
				'json'          => $request,
				'http_errors'   => false
			]);

			/** Get the status code to check for failures */
			$httpCode               = $response->getStatusCode();

			/** Record the data for debugging (if required) */
			self::setLastRequest($request);
			self::setLastResponse((string) $response->getBody());

			/** Was the call successful? */
			if ($httpCode != 200)
			{
				/** Code other than 200 OK returned. Log and process the errors, and throw exception */
				$decoded	= json_decode(self::$_lastResponse);
				self::setErrors((array)$decoded->Errors->Error);

				throw new \Exception("HTTP Error " . $httpCode . " returned by QuickFile. See error list for details");
			}
			else
			{
				/** Decode the response and return it */
				$decoded            = json_decode(self::$_lastResponse);

				return $decoded;
			}
		}
		catch (\Exception $e)
		{
			throw new \Exception($e->getMessage());
		}
	}
}
