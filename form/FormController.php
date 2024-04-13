<?php

require dirname(__DIR__).'/vtapi/VtapiContacts.php';

class FormController {
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;

    public function __construct($data)
    {
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
            print_r($e->getMessage());
            ;
        }

        print_r('contacto creado'.ConfigurationVtapi::$url);
    }

}

$formController = new FormController($_POST);
$formController->createContact();


