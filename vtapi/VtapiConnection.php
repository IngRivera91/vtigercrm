<?php

use GuzzleHttp\Exception\GuzzleException;

require dirname(__DIR__).'/vendor/autoload.php';
require dirname(__DIR__).'/config.vtapi.php';

class VtapiConnection
{
    private $client;
    private $token;
    private $sessionName;
    private $username;
    private $accessKey;
    private $url;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->username = ConfigurationVtapi::$username;
        $this->accessKey = ConfigurationVtapi::$accessKey;
        $this->url = ConfigurationVtapi::$url;

        if (!$this->generateToken()) {
            throw new Exception('Error trying to generate the Token');
        }

        if (!$this->generateSessionName()) {
            throw new Exception('Error trying to generate the SessionName');
        }

    }

    public function getSessionName()
    {
        return $this->sessionName;
    }

    private function generateToken(): bool
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

    private function generateSessionName(): string
    {
        $client = new GuzzleHttp\Client();

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $options = [
            'form_params' => [
                'operation' => 'login',
                'username' => $this->username,
                'accessKey' => md5($this->token.$this->accessKey),
            ]
        ];

        $request = new GuzzleHttp\Psr7\Request('POST', "{$this->url}", $headers);

        try {
            $response = $client->send($request, $options);
        } catch (GuzzleException $e) {
            return false;
        }

        $this->sessionName = json_decode($response->getBody())->result->sessionName;

        return true;
    }
}