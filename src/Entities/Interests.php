<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 24/09/16
 * Time: 20:43
 */

namespace WiggleDigital\MailChimp\Entities;

class Interest extends InterestCategory {

    function __construct($listId, $categoryId)
    {
        parent::__construct($listId);

        $this->endPoint .= "{$categoryId}/interests/";

        $this->_requiredFields = [
            "create" => ["name"],
            "edit" => ["name"]
        ];
    }
}