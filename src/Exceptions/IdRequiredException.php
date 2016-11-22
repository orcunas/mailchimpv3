<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 14/10/16
 * Time: 01:27
 */

namespace WiggleDigital\MailChimp\Exceptions;


class IdRequiredException extends MailChimpException
{

    public function getName()
    {
        return 'Id Required Exception';
    }
}