<?php

declare(strict_types=1);

namespace App\Controller\Subscription;

use App\Action\Subscription\GetAllSubscriptionsAction;
use App\Serializer\JsonSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class GetAllSubscriptionsController
{
    public function __construct(
        private readonly GetAllSubscriptionsAction $getAllSubscriptionsAction
    ) {
    }

    /**
     * Get all subscriptions
     * @return JsonResponse
     */
    #[Route('/subscription', methods:['GET'])]
    public function get(): JsonResponse
    {
        return new JsonResponse(
            JsonSerializer::serialize(($this->getAllSubscriptionsAction)())
        );
    }
}
