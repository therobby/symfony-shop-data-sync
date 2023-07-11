<?php

declare(strict_types=1);

namespace App\Controller\Order;

use App\Action\Order\UpdateOrderAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class UpdateOrderController
{
    public function __construct(
        private readonly UpdateOrderAction $updateOrderAction
    ) {
    }

    /**
     * Ubdate customer with given id
     * @param int $id
     * @return JsonResponse
     */
    #[Route('/order/{id}', methods:['PATCH'])]
    public function update(Request $request, int $id): JsonResponse
    {
        $orderUpdateData = json_decode($request->getContent(), true);
        ($this->updateOrderAction)($id, $orderUpdateData);

        return new JsonResponse();
    }
}
