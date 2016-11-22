<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp\Services;

use WiggleDigital\MailChimp\Base\CURL;

class HttpService extends CURL {

    public $url = "";
    public $queryStringParams = "";

    protected $errorService;
    private $_basePath;

    private $_apiKey;

    /**
     * HttpRequestService constructor.
     * @param ErrorService $errorService
     * @param string $apiKey
     */
    function __construct($errorService, $apiKey)
    {
        $this->errorService = $errorService;
        $this->_apiKey = $apiKey;
        $this->setBasePath();
    }

    protected function setBasePath()
    {
        $dataCenter = substr($this->_apiKey,strpos($this->_apiKey,'-')+1);
        $this->_basePath = "https://{$dataCenter}.api.mailchimp.com/3.0";
    }

    public function getBasePath()
    {
        return $this->_basePath;
    }

    /**
     * @param array $params
     */
    public function setQueryStringParams($params)
    {
        $this->queryStringParams = http_build_query($params);
    }

    public function getQueryStringParams()
    {
        return $this->queryStringParams;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function createUrl($url, $params)
    {
        if($params)
        {
            $this->setQueryStringParams($params);
        }

        $url = implode("/",$url)."?".$this->getQueryStringParams();

        $this->setUrl($url);
    }

    public function makeRequest($url, $method, $data = false)
    {
        $this->setOptions([
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_USERPWD => "user:".$this->_apiKey,
            CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
            CURLOPT_POSTFIELDS => $data ? $data : [],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => "WiggleDigital UserAgent",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 20,
        ]);

        $response = $this->request();

        // TODO : Error handling by httpCode
        //$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return $response;
    }
}