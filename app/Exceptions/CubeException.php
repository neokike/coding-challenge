<?php
namespace App\Exceptions;

use Exception;

class CubeException extends Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {

    }
}