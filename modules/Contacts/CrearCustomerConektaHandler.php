<?php

require_once('include/utils/utils.php');
include_once dirname(__DIR__,2).'/conekta/ApiConektaCustomers.php';

class CrearCustomerConektaHandler extends VTEventHandler
{
    public function handleEvent($eventType, $entity)
    {
        $moduleName = $entity->getModuleName();
        if ($moduleName == 'Contacts' && $eventType == 'vtiger.entity.beforesave') {

//            $ConektaCustomer = new ApiConektaCustomers();
//
//            $otherPhone = $entity->get('otherphone');
//            $firstName = $entity->get('firstName');
//            $email = $entity->get('email');
//            $phone = $entity->get('phone');
//
//            if ($otherPhone === "") {
//                try {
//                    $otherPhone = $ConektaCustomer->createCustomer($firstName, $email, $phone);
//                    $entity->set('otherphone', $otherPhone);
//                } catch (Exception $e) {
//                    throw new Exception($e->getMessage());
//                }
//            }
//
//            if ($otherPhone !== "") {
//                if ($ConektaCustomer->customerExist($otherPhone)) {
//                    try {
//                        $ConektaCustomer->updateCustomer($otherPhone, $firstName, $email, $phone);
//                    } catch (Exception $e) {
//                        throw new Exception($e->getMessage());
//                    }
//                }else{
//                    throw new Exception('No existe un cliente con el ID ' . $otherPhone);
//                }
//            }

        }
    }
}