<?php

namespace QuickFile;

/**
 * @author Roseblade Media <hello@roseblade.media>
 * @link https://roseblade.media
 */
class Ledger
{
    /**
     * @return  object              Returns a list of nominal ledgers based on the output
     */
    public static function getNominalLedgers($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/ledger/getnominalledgers');
        return $returned->Ledger_GetNominalLedgers->Body;
    }

    /**
     * @return  object              Returns a list of transactions matching the criteria
     */
    public static function search($output)
    {
        // Send request
        $returned = \QuickFile\Request::_sendData($output, '/ledger/search');
        return $returned->Ledger_Search->Body;
    }
}