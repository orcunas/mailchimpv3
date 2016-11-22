<?php
/**
 * @link https://packagist.org/packages/wiggledigital/mailchimp-v3-php
 * @copyright Copyright (c) 2016 Wiggle Digital
 */

namespace WiggleDigital\MailChimp\Base;

/**
 * Class DependencyInjector
 *
 * Container DI
 * Services
 *
 * @package WiggleDigital\MailChimp\Base
 */
class ServiceLocator {

    /**
     * Holds registered services
     * @var array
     */
    protected $services = [];

    /**
     * DependencyInjector constructor.
     */
    function __construct() {}

    /**
     * Registers a new service
     *
     * @param string $name
     * @param callable $resolver
     */
    public function setService($name, callable $resolver)
    {
        // Checks if service is already registered
        if(array_key_exists($name, $this->services)) return;

        // Sets the given service
        $this->services[$name] = $resolver;
    }

    /**
     * Returns the founded service or throws an error
     *
     * @param string $name
     * @return callable
     * @throws \Exception
     */
    public function getService($name)
    {
        // Check if the service exists
        if(!array_key_exists($name, $this->services))
            throw new \Exception("Service '{$name}' does not exist!");

        // Return the existing service
        return $this->services[$name]($this->services);
    }

    /**
     * Returns the list of available services
     * @return array
     */
    public function listServices()
    {
        return array_keys($this->services);
    }
}