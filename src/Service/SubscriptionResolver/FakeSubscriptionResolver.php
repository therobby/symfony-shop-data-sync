<?php

declare(strict_types=1);

namespace App\Service\SubscriptionResolver;

use Faker\Factory;
use Faker\Generator;

class FakeSubscriptionResolver implements SubscriptionResolverInterface
{
    protected Generator $faker;
    public function __construct()
    {
        $this->faker = Factory::create();
    }
    public function resolve(string $uuid): SubscriptionResolverData
    {
        return new SubscriptionResolverData(
            $this->faker->word(),
            $this->faker->randomDigit(),
            $this->faker->dateTimeBetween('now', '+1 year')
        );
    }
}
