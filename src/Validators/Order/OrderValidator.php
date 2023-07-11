<?php

declare(strict_types=1);

namespace App\Validators\Order;

use App\Entity\Order;
use App\Validators\AbstractValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class OrderValidator extends AbstractValidator
{
    public function __construct(
        protected readonly ValidatorInterface $validator
    ) {
    }

    /**
     * Validate Order
     * @param array<string> $perhapsOrder
     * @return Order|string
     */
    public function __invoke(array $perhapsOrder): Order|string
    {
        $order = new Order();

        $customerId = $this->getValueIfArrayKeyExists($perhapsOrder, 'customerId');
        $wpOrderId = $this->getValueIfArrayKeyExists($perhapsOrder, 'wpOrderId');
        $subscriptionId = $this->getValueIfArrayKeyExists($perhapsOrder, 'subscriptionId');

        $subscriptionId ? $order->setSubscriptionId(strval($subscriptionId)) : null;
        intval($customerId) > 0 ? $order->setCustomerId(intval($customerId)) : null;
        intval($wpOrderId) > 0 ? $order->setWpOrderId(intval($wpOrderId)) : null;

        $errors = $this->validator->validate($order);
        if (count($errors) > 0) {
            return $errors[0]?->getPropertyPath() . ': ' . $errors[0]?->getMessage();
        }
        return $order;
    }
}
