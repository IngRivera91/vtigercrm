<?php

require_once('include/utils/utils.php');
require_once('config.apiconekta.php');
require_once('conekta/ApiConektaCustomers.php');


class CrearCustomerConektaHandler extends VTEventHandler
{
    /**
     * @throws Exception
     */
    public function handleEvent($eventType, $entity)
    {
        $moduleName = $entity->getModuleName();
        if ($moduleName == 'Contacts' && $eventType == 'vtiger.entity.beforesave') {

            $createdTime = $entity->get('createdtime');
            $source = $entity->get('source');

            if ($createdTime !== "" || $source !== "WEBSERVICE") {

                $ConektaCustomer = new ApiConektaCustomers();

                $otherPhone = $entity->get('otherphone');
                $firstName = $entity->get('firstname');
                $email = $entity->get('email');
                $phone = $entity->get('phone');

                if ($otherPhone === "") {
                    try {
                        $otherPhone = $ConektaCustomer->createCustomer($firstName, $email, $phone);
                        $entity->set('otherphone', $otherPhone);
                    } catch (Exception $e) {
                        throw new Exception($e->getMessage());
                    }
                }

                if ($otherPhone !== "") {
                    if ($ConektaCustomer->customerExist($otherPhone)) {
                        try {
                            $ConektaCustomer->updateCustomer($otherPhone, $firstName, $email, $phone);
                        } catch (Exception $e) {
                            throw new Exception($e->getMessage());
                        }
                    }else{
                        throw new Exception('No existe un cliente con el ID ' . $otherPhone);
                    }
                }
            }

        }
    }
}