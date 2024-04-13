<?php

use GuzzleHttp\Exception\GuzzleException;

require dirname(__DIR__).'/vendor/autoload.php';
require dirname(__DIR__).'/config.vtapi.php';
class VtapiConnection
{
    private $token;
    private $sessionName;
    private $username;
    private $accessKey;
    private $url;

    public function __construct()
    {
        $this->username = ConfigurationVtapi::$username;
        $this->accessKey = ConfigurationVtapi::$accessKey;
        $this->url = ConfigurationVtapi::$url;
        $this->getToken();

        print_r($this->token);
    }

    private function getToken(): bool
    {
        $client = new GuzzleHttp\Client();

        $request = new GuzzleHttp\Psr7\Request('GET', "{$this->url}?operation=getchallenge&username={$this->username}");

        try {
            $response = $client->send($request);
        } catch (GuzzleException $e) {
            return false;
        }

        $this->token = json_decode($response->getBody())->result->token;

        return true;

    }
}