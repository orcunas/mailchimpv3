<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 25/09/16
 * Time: 00:49
 */

namespace WiggleDigital\MailChimp\Entities;

class InterestCategories extends Lists {

    function __construct($listId)
    {
        parent::__construct();

        $this->endPoint .= "{$listId}/interest-categories/";

        $this->_requiredFields = [
            "create" => [ "type", "title" ],
            "edit" => [ "type", "title" ]
        ];
    }

}