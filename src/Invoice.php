<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Invoice
{
    /**
     * @return  object
     */
    public static function create($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/invoice/create');
        return $returned->Invoice_Create->Body;
    }

    /**
     * @return  object
     */
    public static function delete($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/invoice/delete');
        return $returned->Invoice_Delete->Body;
    }

    /**
     * @return  object
     */
    public static function get($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/invoice/get');
        return $returned->Invoice_Get->Body;
    }

    /**
     * @return  object
     */
    public static function getPdf($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/invoice/getpdf');
        return $returned->Invoice_Delete->Body;
    }

    /**
     * @return  object
     */
    public static function search($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/invoice/search');
        return $returned->Invoice_Search->Body;
    }

    /**
     * @return  object
     */
    public static function send($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/invoice/send');
        return $returned->Invoice_Send->Body;
    }
}