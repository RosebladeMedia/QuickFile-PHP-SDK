<?php

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */

// Load composer autoload file
require_once('../vendor/autoload.php');

// Set the account variables
// Found in your QuickFile account
// Account Settings > 3rd Party Integration > API
// There are 2 ways of setting this, either:
$creds  = [
    'AccountNumber' => 6131400000,
    'APIKey'        => '000AA000-AAAA-0000-A',
    'ApplicationID' => '00000000-AAAA-AAAA-AAAA-00AA00AA00AA'
];
\QuickFile\QuickFile::config($creds);

// Or, the other way would be to set them individual
// \QuickFile\QuickFile::setAccountNumber($creds['AccountNumber']);
// \QuickFile\QuickFile::setAPIKey($creds['APIKey']);
// \QuickFile\QuickFile::setApplicationID($creds['ApplicationID']);

// Now, we'll do a client search, and supply an array of data for the body
// based on the API docs at https://api.quickfile.co.uk
try
{
    $results = \QuickFile\Client::search([
        'SearchParameters'   => [
            'ReturnCount'   => 10,
            'Offset'        => 0,
            'OrderResultsBy'=> 'CompanyName',
            'OrderDirection'=> 'DESC',
            'CompanyName'   => 'Bob'
        ]
    ]);

    // If successful, in this instance it will return the results as $results->Record[]
    echo count($results->Record)." results found \r\n";

    // We can loop through them as normal and output the data
    // The returned data here would match the "Body" tag of returned JSON
    // in the API docs
    foreach($results->Record as $row)
    {
        echo $row->CompanyName." (ID: ".$row->ClientID.") \r\n";
	}
	
	// You can also view the raw request and response for debugging, if needed
	var_dump(\QuickFile\Request::getLastRequest());
	var_dump(\QuickFile\Request::getLastResponse());
}
catch(Exception $e)
{
    // Something went wrong
    echo "There was an error getting your results. QuickFile said: \r\n";

    // All QF errors are stored in the getErrors() function
    // These are useful for debugging (e.g. returns issues with the supplied JSON)
    foreach(\QuickFile\Request::getErrors() as $error)
    {
        echo "\r\n".$error;
    }

    die();
}