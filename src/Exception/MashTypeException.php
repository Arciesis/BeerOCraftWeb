<?php

namespace App\Exception;

class MashTypeException extends \Exception
{
    /** The error message */
    protected $message;
    /** The error code */
    protected $code;
    /** The filename where the error happened  */
    protected $file;
    /** The line where the error happened */
    protected $line;
}