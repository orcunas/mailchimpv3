<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 24/09/16
 * Time: 20:44
 */

namespace WiggleDigital\MailChimp\Entities;

use WiggleDigital\MailChimp\CRUD;

class BaseList extends CRUD {

    /*$this->requiredFields = [
        "create" => ["name","contact","permission_reminder","campaign_defaults","email_type_option"],
        "update" => ["name","contact","permission_reminder","campaign_defaults","email_type_option"]
    ];*/

    public function setUrl()
    {
        $id = !empty($this->id) ? $this->id : '';
        $this->url = $this->httpService->getBasePath()."/lists/{$id}";
    }

    public function segments($id = null)
    {
        return new Segment($id, $this->id, $this->httpService, $this->errorService);
    }

}