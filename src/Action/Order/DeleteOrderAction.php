<?php

declare(strict_types=1);

namespace App\Action\Order;

use Doctrine\ORM\EntityManagerInterface;

class DeleteOrderAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager,
        protected readonly GetOrderByIdAction $getOrderByIdAction
    ) {
    }

    /**
     * Delete order by id
     * @param int $id
     * @return bool
     */
    public function __invoke(int $id): bool
    {
        $order = ($this->getOrderByIdAction)($id);
        if (!$order) {
            return false;
        }

        $this->entityManager->remove($order);
        $this->entityManager->flush();

        return true;
    }
}
