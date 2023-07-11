<?php

declare(strict_types=1);

namespace App\Controller\Order;

use App\Action\Order\DeleteOrderAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class DeleteOrderController
{
    public function __construct(
        private readonly DeleteOrderAction $deleteOrderAction
    ) {
    }

    /**
     * Delete order with given id
     * @param int $id
     * @return JsonResponse
     */
    #[Route('/order/{id}', methods:['DELETE'])]
    public function update(int $id): JsonResponse
    {
        ($this->deleteOrderAction)($id);
        return new JsonResponse();
    }
}
