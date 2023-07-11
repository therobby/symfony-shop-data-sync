<?php

declare(strict_types=1);

namespace App\Controller\Subscription;

use App\Action\Subscription\UpdateOrderSubscriptionAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class UpdateOrderSubscriptionController
{
    public function __construct(
        private readonly UpdateOrderSubscriptionAction $updateOrderSubscriptionAction
    ) {
    }

    /**
     * Ubdate order subscription
     * @param int $id
     * @return JsonResponse
     */
    #[Route('/subscription/update/order/{id}', methods:['GET'])]
    public function update(int $id): JsonResponse
    {
        ($this->updateOrderSubscriptionAction)($id);
        return new JsonResponse();
    }
}
