<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 25/09/16
 * Time: 22:50
 */

namespace WiggleDigital\MailChimp;

use WiggleDigital\MailChimp\Exceptions\MailChimpException;
use WiggleDigital\MailChimp\Services\ErrorService;
use WiggleDigital\MailChimp\Services\HttpService;

abstract class CRUD implements CRUDInterface {

    /**
     * @var HttpService
     */
    protected $httpService;

    /**
     * @var ErrorService
     */
    protected $errorService;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $url;

    function __construct($id, $httpService, $errorService)
    {
        $this->id = $id;
        $this->errorService = $errorService;
        $this->httpService = $httpService;

        $this->setUrl();
    }

    public function read()
    {
        return $this->httpService->makeRequest($this->getUrl(), 'GET');
    }

    public function create($data = [])
    {
        try {
            if(!empty($this->id))
                $this->errorService->idNotAllowed();

            return $this->httpService->makeRequest($this->getUrl(), 'POST', $data);
        } catch (MailChimpException $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public function update($data = [])
    {
        try {
            if(!empty($this->id))
                $this->errorService->idRequired();

            return $this->httpService->makeRequest($this->getUrl(), 'PUT', $data);
        } catch (MailChimpException $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public function delete()
    {
        try {
            if(!empty($this->id))
                $this->errorService->idRequired();

            return $this->httpService->makeRequest($this->getUrl(), 'DELETE');
        } catch (MailChimpException $e) {
            echo $e->getMessage();
        }

        return false;
    }

    /**
     * @return mixed
     */
    abstract function setUrl();

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}