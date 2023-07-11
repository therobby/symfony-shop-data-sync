<?php

declare(strict_types=1);

namespace App\Controller\Order;

use App\Action\Order\GetOrderByIdAction;
use App\Serializer\JsonSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class GetOrderByIdController
{
    public function __construct(
        private readonly GetOrderByIdAction $getOrderByIdAction
    ) {
    }

    /**
     * Get order by id
     * @param int $id
     * @return JsonResponse
     */
    #[Route('/order/{id}', methods:['GET'])]
    public function get(int $id): JsonResponse
    {
        // could use auto fetch instead of calling action with id
        return new JsonResponse(
            JsonSerializer::serialize(($this->getOrderByIdAction)($id))
        );
    }
}
