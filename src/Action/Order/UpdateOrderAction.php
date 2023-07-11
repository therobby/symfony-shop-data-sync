<?php

declare(strict_types=1);

namespace App\Action\Order;

use Doctrine\ORM\EntityManagerInterface;

class UpdateOrderAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager,
        protected readonly GetOrderByIdAction $getOrderByIdAction
    ) {
    }

    /**
     * Update order
     * @param int $id
     * @param array<string> $data
     * @return bool
     */
    public function __invoke(int $id, array $data): bool
    {
        $order = ($this->getOrderByIdAction)($id);
        if (!$order) {
            return false;
        }

        $customerId = array_key_exists('customerId', $data) ? $data['customerId'] : null;
        $wpOrderId = array_key_exists('wpOrderId', $data) ? $data['wpOrderId'] : null;

        intval($customerId) > 0 ? $order->setCustomerId(intval($customerId)) : null;
        intval($wpOrderId) > 0 ? $order->setWpOrderId(intval($wpOrderId)) : null;

        $this->entityManager->flush();

        return true;
    }
}
