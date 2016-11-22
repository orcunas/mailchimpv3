<?php
/**
 * @author Orcun As <contact@orcunas.com>
 * @company Wiggle Digital
 * @since 07/10/16
 */

namespace WiggleDigital\MailChimp;

use WiggleDigital\MailChimp\Base\CURL;

class HTTPRequest extends CURL {

    public $url = "";
    public $queryStringParams = "";

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

}