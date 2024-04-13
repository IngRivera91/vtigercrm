<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/config.vtapi.php';
require_once dirname(__DIR__).'/vtapi/VtapiConnection.php';

class VtapiContacts
{
    private $url;
    private $sessionName;
    private $userId;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->url = ConfigurationVtapi::$url;
        try {
            $connection = new VtapiConnection();
            $this->sessionName = $connection->getSessionName();
            $this->userId = $connection->getUserId();
        } catch (Exception $e) {
            throw new Exception($e->getPrevious()->getMessage());
        }

    }

    /**
     * @throws Exception
     */
    public function createNewContact($firstName, $lastName, $email, $phoneNumber)
    {
        $client = new GuzzleHttp\Client();

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $options = [
            'form_params' => [
                'operation' => 'create',
                'sessionName' => $this->sessionName,
                'element' => '{"firstname":"'.$firstName.'", "lastname":"'.$lastName.'", "phone":"'.$phoneNumber.'", "email":"'.$email.'","assigned_user_id":"'.$this->userId.'"}',
                'elementType' => 'Contacts'
            ]];

        $request = new GuzzleHttp\Psr7\Request('POST', "$this->url/webservice.php", $headers);

        try {
            $response = $client->send($request, $options);
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            throw new Exception('Unable to create new contact: ' . $e->getMessage(), 0, $e);
        }

    }

}