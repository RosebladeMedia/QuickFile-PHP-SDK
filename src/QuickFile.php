<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class QuickFile
{
    // @var int QuickFile Account Number
    public static $accountNumber;

    // @var string App ID
    public static $applicationID;

    // @var string API Key
    public static $apiKey;

    // @var string Submission number generator
    public static $submissionGenerator  = "uniqid";

    // @var boolean Whether to verify SSL certificates or not
    public static $verifySslCerts = false;

    // @var string Main endpoint
    public static $APIBase              = "https://api.quickfile.co.uk/";

    // @var string API version
    public static $apiVersion           = "1_2";

    const VERSION                       = "1.0.1 BETA";

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