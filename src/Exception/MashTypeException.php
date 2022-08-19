<?php

namespace App\Exception;

class MashTypeException extends \Exception
{
    /** The error message */
    protected $message;
    /** The error code */
    protected $code;
    /** The filename where the error happened  */
    protected String $file;
    /** The line where the error happened */
    protected int $line;
}
