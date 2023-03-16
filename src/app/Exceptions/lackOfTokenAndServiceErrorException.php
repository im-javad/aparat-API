<?php

namespace App\Exceptions;

use Exception;

class lackOfTokenAndServiceErrorException extends Exception
{
    public $message = 'Lack of token and service error';
}
