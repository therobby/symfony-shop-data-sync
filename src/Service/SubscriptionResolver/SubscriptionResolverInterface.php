<?php

declare(strict_types=1);

namespace App\Service\SubscriptionResolver;

interface SubscriptionResolverInterface
{
    public function resolve(string $uuid): SubscriptionResolverData;
}
