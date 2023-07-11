<?php

declare(strict_types=1);

namespace App\Action\Customer;

use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;

class GetCustomerByIdAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Get customer by id
     * @param int $id
     * @return Customer|null
     */
    public function __invoke(int $id): Customer|null
    {
        return $this->entityManager->getRepository(Customer::class)->find($id);
    }
}
