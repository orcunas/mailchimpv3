<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp;

use WiggleDigital\MailChimp\Base\Services;
use WiggleDigital\MailChimp\Entities\BaseList;
use WiggleDigital\MailChimp\Entities\Segment;
use WiggleDigital\MailChimp\Services\ErrorService;
use WiggleDigital\MailChimp\Services\HttpService;

/**
 * MailChimp Client Base Class
 *
 * This is an entry point of the application.
 * It should be instantiated like the following:
 *
 * ```php
 * $client = new Client(YOUR_API_KEY);
 * ```
 *
 * @author Orcun As <orcun@wiggledigital.com>
 * @since 1.0
 */

class Client extends Services
{

    /**
     * @var HttpService
     */
    private $_httpService;

    /**
     * @var ErrorService
     */
    private $_errorService;

    /**
     * Client constructor.
     *
     * Creates a new application with the given config and runs it.
     * @param string $apiKey
     */
    function __construct($apiKey)
    {
        parent::__construct();

        $this->setConfig(["httpService.apiKey" => $apiKey]);

        $this->_errorService = $this->getService("errorService");
        $this->_httpService = $this->getService("httpService");
    }

    public function lists($id = null)
    {
        return new BaseList($id, $this->_httpService, $this->_errorService);
    }

    public function segments($listId, $id = null)
    {
        return new Segment($id, $listId, $this->_httpService, $this->_errorService);
    }

}