<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 26/09/16
 * Time: 00:17
 */

namespace WiggleDigital\MailChimp\Entities;

use WiggleDigital\MailChimp\CRUD;

class Segment extends CRUD
{
    private $_listId;

    /*$this->_requiredFields = [
        "create" => ["name"],
        "edit" => ["name"]
    ];*/

    function __construct($id, $listId, $httpService, $errorService)
    {
        $this->_listId = $listId;

        parent::__construct($id, $httpService, $errorService);
    }

    public function setUrl()
    {
        $id = !empty($this->id) ? $this->id : '';
        $this->url = $this->httpService->getBasePath()."/lists/{$this->_listId}/segments/{$id}";
    }
}