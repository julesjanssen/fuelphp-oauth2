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

Autoloader::add_core_namespace('OAuth');

Autoloader::add_classes(array(
	'OAuth\\Client'					=> __DIR__.'/classes/client.php',
	'OAuth\\OAuth_Exception'		=> __DIR__.'/classes/exception.php',
	'OAuth\\Httpclient'				=> __DIR__.'/classes/httpclient.php',
	'OAuth\\Service'				=> __DIR__.'/classes/service.php',
	'OAuth\\Token'					=> __DIR__.'/classes/token.php',

	'OAuth\\Datastore_Abstract'		=> __DIR__.'/classes/datastore/abstract.php',
	'OAuth\\Datastore_Session'		=> __DIR__.'/classes/datastore/session.php',

	'OAuth\\Service_Configuration'	=> __DIR__.'/classes/service/configuration.php',

));

/* End of file bootstrap.php */