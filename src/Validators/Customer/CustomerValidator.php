<?php

declare(strict_types=1);

namespace App\Validators\Customer;

use App\Entity\Customer;
use App\Validators\AbstractValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CustomerValidator extends AbstractValidator
{
    public function __construct(
        protected readonly ValidatorInterface $validator
    ) {
    }

    /**
     * Add customer
     * @param array<string, string> $perhapsCustomer
     * @return Customer|string
     */
    public function __invoke(array $perhapsCustomer): Customer|string
    {
        $customer = new Customer();

        $firstname = $this->getValueIfArrayKeyExists($perhapsCustomer, 'firstname');
        $lastname = $this->getValueIfArrayKeyExists($perhapsCustomer, 'lastname');
        $wpUserId = $this->getValueIfArrayKeyExists($perhapsCustomer, 'wpUserId');
        $address = $this->getValueIfArrayKeyExists($perhapsCustomer, 'address');
        $contact = $this->getValueIfArrayKeyExists($perhapsCustomer, 'contact');

        $firstname ? $customer->setFirstname(strval($firstname)) : null;
        $lastname ? $customer->setLastname(strval($lastname)) : null;
        intval($wpUserId) > 0 ? $customer->setWpUserId(intval($wpUserId)) : null;
        $customer->setAddress(strval($address));
        $customer->setContact(strval($contact));

        $errors = $this->validator->validate($customer);
        if (count($errors) > 0) {
            return $errors[0]?->getPropertyPath() . ': ' . $errors[0]?->getMessage();
        }
        return $customer;
    }
}
