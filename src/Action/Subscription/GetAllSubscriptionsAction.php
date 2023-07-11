<?php

declare(strict_types=1);

namespace App\Action\Subscription;

use App\Entity\Subscription;
use Doctrine\ORM\EntityManagerInterface;

class GetAllSubscriptionsAction
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * @return array<Subscription>
     */
    public function __invoke(): array
    {
        return $this->entityManager->getRepository(Subscription::class)->findAll();
    }
}
