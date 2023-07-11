<?php

declare(strict_types=1);

namespace App\Action\Order;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class GetOrdersAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Get all order
     * @return array<Order>
     */
    public function __invoke(): array
    {
        return $this->entityManager->getRepository(Order::class)->findAll();
    }
}
