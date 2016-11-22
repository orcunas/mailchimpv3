<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp\Base;

use WiggleDigital\MailChimp\Services\ErrorService;
use WiggleDigital\MailChimp\Services\HttpService;

class Services extends ServiceLocator
{
    protected $config = [];

    function __construct()
    {
        $this->_setErrorService();
        $this->_setHttpService();
    }

    /**
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->config = array_merge($this->config, $config);
    }

    private function _setErrorService()
    {
        $this->setService("errorService", function() {
            return new ErrorService();
        });
    }

    private function _setHttpService()
    {
        $this->setService("httpService", function($services) {
            return new HttpService($services['errorService'], $this->config["httpService.apiKey"]);
        });
    }

}