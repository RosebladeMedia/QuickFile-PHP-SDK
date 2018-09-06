<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Supplier
{
    /**
     * @return  object              Returns a list of suppliers matching the criteria
     */
    public static function search($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/supplier/search');
        return $returned->Supplier_Search->Body;
    }

    /**
     * @return  object              Retrieves details of a supplier based on the supplied ID
     */
    public static function get($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/supplier/get');
        return $returned->Supplier_Get->Body;
    }

    /**
     * @return  object              Returns an object with SupplierID for the new supplier
     */
    public static function create($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/supplier/create');
        return $returned->Supplier_Create->Body;
    }

    /**
     * @return  int                 Returns object with count of deleted suppliers
     */
    public static function delete($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/supplier/delete');
        return $returned->Supplier_Delete->Body;
    }
}