<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 24/09/16
 * Time: 20:00
 *
 * @param string $listId
 */

namespace WiggleDigital\MailChimp\Entities;

class Members extends Lists {

    const STATUS_SUBSCRIBED = "subscribed";
    const STATUS_UNSUBSCRIBED = "unsubscribed";
    const STATUS_CLEANED = "cleaned";
    const STATUS_PENDING = "pending";

    function __construct($listId)
    {
        parent::__construct();

        $this->endPoint .= "{$listId}/members/";

        $this->_requiredFields = [
            "create" => [ "name", "email_address" ]
        ];
    }
}
