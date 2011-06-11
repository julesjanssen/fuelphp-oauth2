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
 * OAuth\Service_Configuration Class
 *
 * @package		Fuel
 * @subpackage	OAuth
 * @category	Core
 * @author		jules janssen
 */

class Service_Configuration
{
    /**
     * @var string
     */
    private $_authorizeEndpoint;

    /**
     * @var string
     */
    private $_accessTokenEndpoint;

    /**
     * @var string
     */
    private $_useOnlyAuthorizationHeader = true;

    /**
     * @param string $authorizeEndpoint
     * @param string $accessTokenEndpoint
     */
    public function __construct($authorizeEndpoint, $accessTokenEndpoint) {
        $this->_authorizeEndpoint = $authorizeEndpoint;
        $this->_accessTokenEndpoint = $accessTokenEndpoint;
    }

    /**
     * @return string
     */
    public function getAuthorizeEndpoint() {
        return $this->_authorizeEndpoint;
    }

    /**
     * @return string
     */
    public function getAccessTokenEndpoint() {
        return $this->_accessTokenEndpoint;
    }

    /**
     * @return string
     */
    public function setUseOnlyAuthorizationHeader($useOnlyAuthorizationHeader) {
         $this->_useOnlyAuthorizationHeader = $useOnlyAuthorizationHeader;
    }

    /**
     * @return string
     */
    public function getUseOnlyAuthorizationHeader() {
        return $this->_useOnlyAuthorizationHeader;
    }

}