<?php

require dirname(__DIR__).'/vtapi/VtapiContacts.php';

class FormController {
    private $debugging;
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;

    public function __construct($data, $debugging = false)
    {
        $this->debugging = $debugging;
        $this->nombre = $data['first_name'];
        $this->apellido = $data['last_name'];
        $this->correo = $data['email'];
        $this->telefono = $data['phone_number'];
    }

    public function createContact()
    {

        try {
            $Contacts = new VtapiContacts();
            $Contacts->createNewContact(
                $this->nombre,
                $this->apellido,
                $this->correo,
                $this->telefono
            );
        } catch (Exception $e) {
            if ($this->debugging) {
                return $e;
            }
            header('Location: '.ConfigurationVtapi::$url."/form/index.php?create=failure");
            exit;
        }

        if ($this->debugging) {
            return true;
        }

        header('Location: '.ConfigurationVtapi::$url."/form/index.php?create=success");
        exit;
    }

}

$formController = new FormController($_POST);
$formController->createContact();


