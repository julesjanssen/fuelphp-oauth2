<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2011 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace OAuth;

/**
 * OAuth\Client Class
 *
 * @package		Fuel
 * @subpackage	OAuth
 * @category	Core
 * @author		jules janssen
 */

/**
 * Based on OAuth 2.0 client
 * https://github.com/vznet/oauth_2.0_client_php
 *
 * @author    Bastian Hofmann <bhfomann@vz.net>
 * @copyright 2010 VZnet Netzwerke Ltd.
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/

class Client
{
    /**
     * @var string
     */
    private $_clientKey;

    /**
     * @var string
     */
    private $_clientSecret;

    /**
     * @var string
     */
    private $_callbackUrl;

    /**
     *
     * @param string $clientKey
     * @param string $clientSecret
     * @param string $callbackUrl
     */
    public function __construct($clientKey, $clientSecret, $callbackUrl) {
        $this->_clientKey = $clientKey;
        $this->_clientSecret = $clientSecret;
        $this->_callbackUrl = $callbackUrl;
    }

    /**
     * @return string
     */
    public function getClientKey() {
        return $this->_clientKey;
    }

    /**
     * @return string
     */
    public function getClientSecret() {
        return $this->_clientSecret;
    }

    /**
     * @return string
     */
    public function getCallbackUrl() {
        return $this->_callbackUrl;
    }
}