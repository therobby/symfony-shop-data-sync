<?php

declare(strict_types=1);

namespace App\Service\SubscriptionResolver;

use DateTime;

class SubscriptionResolverData
{
    public function __construct(
        protected string $productName,
        protected int $quantity,
        protected DateTime $validTo
    ) {
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getValidTo(): DateTime
    {
        return $this->validTo;
    }
}
