<?php
/**
 * Created by PhpStorm.
 * User: gopal
 * Date: 25-06-2017
 * Time: 05:48 PM
 */

namespace Gopal\Positionly;


use GuzzleHttp\Client;

class PositionlyClient
{
    const AUTH_ENDPOINT = "https://auth.positionly.com/oauth2/token";

    const API_ENDPOINT = "https://api.positionly.com/v2/";

    protected $client_id;

    protected $client_secret;

    protected $token;

    protected $refresh_token;

    public function __construct($client_id, $client_secret)
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    public function grantPassword($email, $password)
    {

    }

    public function grantRefreshToken($refresh_token)
    {

    }

    public function get($resource_url, $parameters = array()) {
        return $this->callApi($resource_url, $parameters, 'GET');
    }

    public function post($resource_url, $parameters = array()) {
        return $this->callApi($resource_url, $parameters, 'POST');
    }

    public function delete($resource_url, $parameters = array()) {
        return $this->callApi($resource_url, $parameters, 'DELETE');
    }

    public function callApi($resource_url, $parameters = array(), $method = 'GET', $headers = array())
    {
        $client = new Client(['base_uri' => API_ENDPOINT]);
        $options = array();
        if ($method === 'POST')
            $options['json'] = $parameters;
        if ($method === 'GET')
            $options['query'] = $parameters;
        $response = $client->request($method, $resource_url, $options);
        return $response;
    }
}