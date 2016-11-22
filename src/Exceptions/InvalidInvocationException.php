<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp\Exceptions;

class InvalidInvocationException extends MailChimpException
{

    public function getName()
    {
        return 'Invalid Invocation Exception';
    }
}