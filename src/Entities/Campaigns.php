<?php
/**
 * @author Orcun As <orcun@wiggledigital.com>
 * @since 30/09/16 16:23
 */

namespace WiggleDigital\MailChimp\Entities;

class Campaigns extends CRUD implements CRUDWithActionInterface{

    function __construct()
    {
        parent::__construct();

        $this->endPoint .= "campaigns/";

        $this->_requiredFields = [
            //"create" => ["recipients","contact","permission_reminder","campaign_defaults","email_type_option"],
            //"edit" => ["name","contact","permission_reminder","campaign_defaults","email_type_option"]
        ];
    }

    public function action($actionName)
    {
        $this->endPoint .= $actionName;
        return $this->create([]);
    }
}