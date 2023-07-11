<?php

declare(strict_types=1);

namespace App\Controller\Order;

use App\Action\Order\GetOrdersAction;
use App\Serializer\JsonSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class GetAllOrdersController
{
    public function __construct(
        private readonly GetOrdersAction $getOrdersAction
    ) {
    }

    /**
     * Get all orders
     * @return JsonResponse
     */
    #[Route('/order', methods:['GET'])]
    public function get(): JsonResponse
    {
        return new JsonResponse(
            JsonSerializer::serialize(($this->getOrdersAction)())
        );
    }
}
