<?php

declare(strict_types=1);

namespace App\Action\Order;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class GetOrderByIdAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Get order by id
     * @param int $id
     * @return Order|null
     */
    public function __invoke(int $id): Order|null
    {
        return $this->entityManager->getRepository(Order::class)->find($id);
    }
}
