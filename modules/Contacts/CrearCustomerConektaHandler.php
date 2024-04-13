<?php

require_once('include/utils/utils.php');

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
//                $otherPhone = $ConektaCustomer->createCustomer($firstName, $email, $phone);
//                $entity->set('otherphone', $otherPhone);
//            }
//
//            if ($otherPhone !== "") {
//                if ($ConektaCustomer->customerExist($otherPhone)) {
//                    $ConektaCustomer->updateCustomer($otherPhone, $firstName, $email, $phone);
//                }else{
//                    throw new Exception('URL cannot be empty');
//                }
//            }

        }
    }
}