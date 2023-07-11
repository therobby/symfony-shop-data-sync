<?php

declare(strict_types=1);

namespace App\Action\Customer;

use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;

class GetCustomersAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Get all customers
     * @return array<Customer>
     */
    public function __invoke(): array
    {
        return $this->entityManager->getRepository(Customer::class)->findAll();
    }
}
