<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Project
{
	/**
	 * Create and attach a project tag to a sales invoice, purchase invoice, estimate or purchase order
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function tagCreate($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/project/tagcreate');
		return $returned->Project_TagCreate->Body;
	}

	/**
	 * Delete a project tag from a sales invoice, purchase invoice, estimate or purchase order
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function tagDelete($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/project/tagdelete');
		return $returned->Project_TagDelete->Body;
	}

	/**
	 * Search for a project tag based on partial or complete string query
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function tagSearch($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/project/tagsearch');
		return $returned->Project_TagSearch->Body;
	}
}
