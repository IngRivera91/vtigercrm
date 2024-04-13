<?php

class FormController {
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;

    public function __construct($data)
    {
        $this->nombre = $data['first_name'];
        $this->apellido = $data['last_name'];
        $this->correo = $data['email'];
        $this->telefono = $data['phone_number'];
    }

    public function createContact()
    {
        print_r($this);
    }

}

$formController = new FormController($_POST);
$formController->createContact();


