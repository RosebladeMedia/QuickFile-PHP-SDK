<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class PurchaseOrder
{
	/**
	 * Create a new purchase order record
	 * 
	 * @param 	array	$body		Array for body of API call
	 * 
	 * @return  object              Object containing body of response
	 */
	public static function create($body)
	{
		$returned = \QuickFile\Request::_sendData($body, '/purchaseorder/create');
		return $returned->PurchaseOrder_Create->Body;
	}
}
