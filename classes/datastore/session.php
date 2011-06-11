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
 * OAuth\Datastore_Session Class
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

class Datastore_Session extends Datastore_Abstract
{
    public function __construct() {
        session_start();
    }

    /**
     *
     * @return Token
     */
    public function retrieveAccessToken() {
        return \Session::get('token', new Token());
    }

    /**
     * @param Token $token
     */
    public function storeAccessToken(Token $token) {
        \Session::set('token', $token);
    }

    public function  __destruct() {
        session_write_close();
    }
}