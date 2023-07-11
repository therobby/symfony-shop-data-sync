<?php

declare(strict_types=1);

namespace App\Action\Customer;

use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;

class CreateCustomerAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Create customer
     * @param Customer $customer
     * @return bool
     */
    public function __invoke(Customer $customer): bool
    {
        $duplicate = $this->entityManager->getRepository(Customer::class)->findOneBy([
            'firstname' => $customer->getFirstname(),
            'lastname' => $customer->getLastname()
        ]);
        if ($duplicate) {
            return false;
        }
        $this->entityManager->persist($customer);
        $this->entityManager->flush();
        return true;
    }
}
