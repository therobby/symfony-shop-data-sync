<?php

declare(strict_types=1);

namespace App\Controller\Customer;

use App\Action\Customer\GetCustomerByIdAction;
use App\Serializer\JsonSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class GetCustomerByIdController
{
    public function __construct(
        private readonly GetCustomerByIdAction $getCustomerByIdAction
    ) {
    }

    /**
     * Get customer by id
     * @param int $id
     * @return JsonResponse
     */
    #[Route('/customer/{id}', methods:['GET'])]
    public function get(int $id): JsonResponse
    {
        // could use auto fetch instead of calling action with id

        return new JsonResponse(
            JsonSerializer::serialize(($this->getCustomerByIdAction)($id))
        );
    }
}
