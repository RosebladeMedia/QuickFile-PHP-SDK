<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Document
{
	/**
	 * Upload a document (e.g. receipt, sales attachment or general document management file) to QuickFile
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function upload($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/document/upload');
		return $returned->Bank_Search->Body;
	}
}
