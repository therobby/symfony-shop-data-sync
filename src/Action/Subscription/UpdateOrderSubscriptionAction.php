<?php

declare(strict_types=1);

namespace App\Action\Subscription;

use App\Action\Order\GetOrderByIdAction;
use App\Entity\Subscription;
use App\Service\SubscriptionResolver\SubscriptionResolverInterface;
use Doctrine\ORM\EntityManagerInterface;

class UpdateOrderSubscriptionAction
{
    public function __construct(
        protected readonly SubscriptionResolverInterface $subscriptionResolver,
        protected readonly GetOrderByIdAction $getOrderByIdAction,
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    public function __invoke(int $orderId): bool
    {
        $order = ($this->getOrderByIdAction)($orderId);
        if (!$order || !$order->getSubscriptionId()) {
            return false;
        }
        $resolvedSubscription = $this->subscriptionResolver->resolve($order->getSubscriptionId());
        $subscription = new Subscription();
        $subscription->setProductName($resolvedSubscription->getProductName());
        $subscription->setQuantity($resolvedSubscription->getQuantity());
        $subscription->setValidTo($resolvedSubscription->getValidTo());
        $subscription->setOrderId($orderId);

        $this->entityManager->persist($subscription);
        $this->entityManager->flush();

        return true;
    }
}
