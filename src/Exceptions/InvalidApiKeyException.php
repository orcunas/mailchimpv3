<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp\Exceptions;

/**
 * InvalidCallException represents an exception caused by incorrect api key.
 *
 * @author Orcun As <orcun@wiggledigital.com>
 * @since 1.0
 */

class InvalidApiKeyException extends MailChimpException {

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid API Key';
    }

}