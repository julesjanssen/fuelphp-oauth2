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
 * OAuth\Httpclient Class
 *
 * @package		Fuel
 * @subpackage	OAuth
 * @category	Core
 * @author		jules janssen
 */

class Httpclient
{
    /**
     * @var string
     */
    private $_url;

    /**
     * @var string
     */
    private $_method;

    /**
     * @var string
     */
    private $_parameters;

    /**
     * @var array
     */
    private $_requestHeader;

    /**
     * @var string
     */
    private $_response;

    /**
     * @var array
     */
    private $_headers;

    /**
     * @var array
     */
    private $_info;

    /**
     * @var boolean
     */
    private $_debug = false;

    /**
     * @param string $url
     * @param string $method
     * @param string $parameters
     * @param array $header  any additional header which should be set
     */
    public function __construct($url, $method, $parameters = null, array $header = array()) {
        $this->_url = $url;
        $this->_method = $method;
        $this->_parameters = $parameters;
        $this->_requestHeader = $header;
    }

    /**
     * parses a string with two delimiters to an array
     *
     * example:
     *
     * param1=value1&param2=value2
     *
     * will result with delimiters & and = to
     *
     * array(
     *   'param1' => 'value1',
     *   'param2' => 'value2',
     * )
     *
     * @param string $string
     * @param string $firstDelimiter
     * @param string $secondDelimiter
     * @return array
     */
    public static function parseStringToArray($string, $firstDelimiter, $secondDelimiter) {
        $resultArray = array();
        $parts = explode($firstDelimiter, $string);
        foreach ($parts as $part) {
            $partsPart = explode($secondDelimiter, $part);
            $resultArray[$partsPart[0]] = isset($partsPart[1]) ? trim($partsPart[1]) : '';
        }
        return $resultArray;
    }

    /**
     * executes the curl request
     */
    public function execute() {
        $ch = curl_init();

        if ($this->_method === 'POST') {
            curl_setopt($ch, CURLOPT_URL, $this->_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_parameters);
        } else {
            curl_setopt($ch, CURLOPT_URL, $this->_url . ($this->_parameters ? '?' . $this->_parameters : ''));
        }

        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if (! empty($this->_requestHeader)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->_requestHeader);
        }

        $fullResponse = curl_exec($ch);
        $this->_info = curl_getinfo($ch);

        $this->_response = substr($fullResponse, $this->_info['header_size'], strlen($fullResponse));
        if ($this->_response === false) {
            $this->_response = '';
        }
        $headers = rtrim(substr($fullResponse, 0, $this->_info['header_size']));

        $this->_headers = Httpclient::parseStringToArray($headers, PHP_EOL, ':');

        if ($this->_debug) {
            echo "<pre>";
            print_r($this->_url);
            echo PHP_EOL;
            print_r($this->_headers);
            echo PHP_EOL;
            print_r($this->_response);
            echo "</pre>";
        }

        curl_close($ch);
    }

    /**
     * @return string
     */
    public function getResponse() {
        return $this->_response;
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return $this->_headers;
    }

    /**
     * @param boolean $debug
     */
    public function setDebug($debug) {
        $this->_debug = $debug;
    }

}