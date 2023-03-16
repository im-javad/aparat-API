<?php

namespace App\Exceptions;

use Exception;

class systemErrorInGettingTheFormActionException extends Exception
{
    public $message = 'System error in getting the form action';
}
