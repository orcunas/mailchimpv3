<?php
/**
 * @author Orcun As <orcun@wiggledigital.com>
 * @since 30/09/16 16:58
 */

namespace WiggleDigital\MailChimp\Entities;

class CampaignAction extends Campaign {

    function __construct($campaignId)
    {
        parent::__construct();

        $this->endPoint .= "{$campaignId}/actions/";

        $this->_requiredFields = [
            //"create" => ["recipients","contact","permission_reminder","campaign_defaults","email_type_option"],
            //"edit" => ["name","contact","permission_reminder","campaign_defaults","email_type_option"]
        ];
    }

}