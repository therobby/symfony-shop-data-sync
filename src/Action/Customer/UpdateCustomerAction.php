<?php

declare(strict_types=1);

namespace App\Action\Customer;

use Doctrine\ORM\EntityManagerInterface;

class UpdateCustomerAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager,
        protected readonly GetCustomerByIdAction $getCustomerByIdAction
    ) {
    }

    /**
     * Update customer
     * @param int $id
     * @param array<string> $data
     * @return bool
     */
    public function __invoke(int $id, array $data): bool
    {
        $customer = ($this->getCustomerByIdAction)($id);
        if (!$customer) {
            return false;
        }

        $firstname = array_key_exists('firstname', $data) ? $data['firstname'] : null;
        $lastname = array_key_exists('lastname', $data) ? $data['lastname'] : null;
        $wpUserId = array_key_exists('wpUserId', $data) ? $data['wpUserId'] : null;

        $firstname ? $customer->setFirstname($firstname) : null;
        $lastname ? $customer->setLastname($lastname) : null;
        intval($wpUserId) > 0 ? $customer->setWpUserId(intval($wpUserId)) : null;
        array_key_exists('address', $data) ? $customer->setAddress($data['address']) : null;
        array_key_exists('contact', $data) ? $customer->setContact($data['contact']) : null;

        $this->entityManager->flush();

        return true;
    }
}
