<?php

namespace App\Exceptions;

use Exception;

class VideoNotFoundException extends Exception
{
    public $message = "Video Not Found";
}
