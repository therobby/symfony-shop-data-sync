<?php

declare(strict_types=1);

namespace App\Controller\Customer;

use App\Action\Customer\UpdateCustomerAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class UpdateCustomerController
{
    public function __construct(
        private readonly UpdateCustomerAction $updateCustomerAction
    ) {
    }

    /**
     * Ubdate customer with given id
     * @param int $id
     * @return JsonResponse
     */
    #[Route('/customer/{id}', methods:['PATCH'])]
    public function update(Request $request, int $id): JsonResponse
    {
        $customerUpdateData = json_decode($request->getContent(), true);
        ($this->updateCustomerAction)($id, $customerUpdateData);

        return new JsonResponse();
    }
}
