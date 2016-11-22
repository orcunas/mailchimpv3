<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp\Services;

use WiggleDigital\MailChimp\Exceptions\IdRequiredException;
use WiggleDigital\MailChimp\Exceptions\InvalidInvocationException;

class ErrorService
{

    public function idNotAllowed()
    {
        throw new InvalidInvocationException("You are not allowed to pass an id (You shall not pass an id)");
    }

    public function idRequired()
    {
        throw new IdRequiredException("You should provide an id.");
    }

}