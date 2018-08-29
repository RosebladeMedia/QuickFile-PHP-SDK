<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Request
{
    // @var string Last request
    private static $lastRequest;

    // @var string Last response
    private static $lastResponse;

    // @var array List of errors from last response (if applicable)
    private static $errorList;

    /**
     * @return string Last recorded response
     */
    public static function getLastRequest()
    {
        return self::$lastRequest;
    }

    /**
     * @return string Last recorded response
     */
    public static function getLastResponse()
    {
        return self::$lastResponse;
    }

    /**
     * @return array Last recorded response
     */
    public static function getErrors()
    {
        return self::$errorList;
    }

    /**
     * @return boolean Check if all details needed are present
     */
    private static function _detailCheck()
    {
        // Do we have - account number, App ID and APIKey?
        if((\QuickFile\QuickFile::getAccountNumber()) && (\QuickFile\QuickFile::getApplicationID()) && (\QuickFile\QuickFile::getAPIKey()))
        {
            return TRUE;
        }
        else
        {
            throw new Exception("Missing required account details");
        }
    }

    /**
     * @return string|boolean Tries to format the standard header (excluding outter wrapper)
     */
    private static function _jsonHeader()
    {
        if(self::_detailCheck())
        {
            // Get a submission code
            $submissionCode = self::_getSubmissionCode();

            // Build array
            $output = array(
                'MessageType'       => 'Request',
                'SubmissionNumber'  => $submissionCode,
                'Authentication'    => array(
                    'AccNumber'         => \QuickFile\QuickFile::getaccountNumber(),
                    'MD5Value'          => md5(\QuickFile\QuickFile::getAccountNumber() . \QuickFile\QuickFile::getAPIKey() . $submissionCode),
                    'ApplicationID'     => \QuickFile\QuickFile::getApplicationID()
                )
            );

            return $output;
        }
    }

    /**
     * @return string|exception Submission number
     */
    private static function _getSubmissionCode()
    {
        $func = \QuickFile\QuickFile::$submissionGenerator;

        if(function_exists($func))
        {
            return $func();
        }
        else
        {
            throw new \Exception("Unknown functon specified for submission number generation");
        }
    }

    /**
     * @param   string  $data       The data to send to the API endpoint
     * @param   string  $endPoint   URL endpoint for the JSON API
     * @return  boolean|object      False on failure, object on success
     */
    public static function _sendData($data, $endPoint)
    {
        // If no end point, use default API end point
        //$endPoint = \QuickFile\QuickFile::$endPoint . $endPoint;

        // Sort out the data
        $output     = array(
            'payload' => array(
                'Header'    => self::_jsonHeader(),
                'Body'      => $data
            )
        );

        try {
            // Setup Guzzle and the data
            $client     = new \GuzzleHttp\Client(['base_uri' => \QuickFile\QuickFile::$APIBase]);
            $response   = $client->request('POST', \QuickFile\QuickFile::$apiVersion.$endPoint, [
                'json'          => $output,
                'http_errors'   => false
            ]);

            // Get the status code
            $httpCode               = $response->getStatusCode();

            // Record the data for analysis (if required)
            self::$lastRequest      = $output;
            self::$lastResponse     = $response->getBody();

            // Check for errors
            if($httpCode != 200)
            {
                $decoded            = json_decode(self::$lastResponse);
                self::$errorList    = (array)$decoded->Errors->Error;

                throw new \Exception("HTTP Error ".$httpCode." returned by QuickFile. See error list for details");
            }
            else
            {
                // Send back
                $decoded            = json_decode(self::$lastResponse);
                return $decoded;
            }
        }
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }

    private function _sortErrors($code)
    {

    }
}