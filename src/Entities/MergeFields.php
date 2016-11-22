<?php
/**
 * Mail Chimp Merge Fields resource class
 *
 * @author Orcun As <orcun@wiggledigital.com>
 * @since 27/09/16 16:28
 */

namespace WiggleDigital\MailChimp\Entities;

class MergeFields extends Lists {

    function __construct($listId)
    {
        parent::__construct();

        $this->endPoint .= "{$listId}/merge-fields/";

        $this->_requiredFields = [
            "create" => [ "tag","type", "name" ],
            "edit" => [ "tag", "name" ]
        ];
    }
}