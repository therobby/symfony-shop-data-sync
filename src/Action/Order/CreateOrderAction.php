<?php

declare(strict_types=1);

namespace App\Action\Order;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class CreateOrderAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Create order
     * @param Order $order
     * @return bool
     */
    public function __invoke(Order $order): bool
    {
        $duplicate = $this->entityManager->getRepository(Order::class)->findOneBy([
            'wp_order_id' => $order->getWpOrderId()
        ]);
        if ($duplicate) {
            return false;
        }
        $this->entityManager->persist($order);
        $this->entityManager->flush();
        return true;
    }
}
