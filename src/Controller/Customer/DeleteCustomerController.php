<?php

declare(strict_types=1);

namespace App\Controller\Customer;

use App\Action\Customer\DeleteCustomersAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class DeleteCustomerController
{
    public function __construct(
        private readonly DeleteCustomersAction $deleteCustomersAction
    ) {
    }

    /**
     * Delete customer with given id
     * @param int $id
     * @return JsonResponse
     */
    #[Route('/customer/{id}', methods:['DELETE'])]
    public function update(int $id): JsonResponse
    {
        ($this->deleteCustomersAction)($id);
        return new JsonResponse();
    }
}
