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
 * OAuth\Datastore_Abstract Class
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

abstract class Datastore_Abstract
{
    /**
     * @param Token $token
     */
    abstract function storeAccessToken(Token $token);

    /**
     * @return Token
     */
    abstract function retrieveAccessToken();
}