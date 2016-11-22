<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp\Exceptions;

use Exception;

class MailChimpException extends Exception
{

    function __construct($message)
    {
        $message = "<h1>{$message}</h1>";
        parent::__construct($message);
    }

}