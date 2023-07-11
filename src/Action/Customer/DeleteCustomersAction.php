<?php

declare(strict_types=1);

namespace App\Action\Customer;

use Doctrine\ORM\EntityManagerInterface;

class DeleteCustomersAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager,
        protected readonly GetCustomerByIdAction $getCustomerByIdAction
    ) {
    }

    /**
     * Delete customer
     * @param int $id
     * @return bool
     */
    public function __invoke(int $id): bool
    {
        $customer = ($this->getCustomerByIdAction)($id);
        if (!$customer) {
            return false;
        }

        $this->entityManager->remove($customer);
        $this->entityManager->flush();

        return true;
    }
}
