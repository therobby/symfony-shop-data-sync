<?php

declare(strict_types=1);

namespace App\Controller\Order;

use App\Action\Order\CreateOrderAction;
use App\Serializer\JsonSerializer;
use App\Validators\Order\OrderValidator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class CreateOrderController
{
    public function __construct(
        private readonly OrderValidator $orderValidator,
        private readonly CreateOrderAction $createOrderAction
    ) {
    }

    /**
     * Add order
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/order', methods:['POST'])]
    public function add(Request $request): JsonResponse
    {
        $order = ($this->orderValidator)(json_decode($request->getContent(), true));
        if (!is_string($order)) {
            return (
                ($this->createOrderAction)($order)
                ? new JsonResponse(JsonSerializer::serialize($order), 201)
                : new JsonResponse(['error' => 'Order already exists'], 422)
            );
        }
        return new JsonResponse(['error' => $order], 400);
    }
}
