<?php

namespace RAdSDev93\MercLegacy\Helper;

trait ErrorTrait
{
    public static function handleErrors(Exception $e)
    {
        if (DEBUG) {
            echo '<pre>';
            print_r($e);
            echo '</pre>';
        } else {
            echo $e->getMessage();
        }
        exit;
    }
}
