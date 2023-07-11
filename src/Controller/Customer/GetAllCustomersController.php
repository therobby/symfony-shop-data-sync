<?php

declare(strict_types=1);

namespace App\Controller\Customer;

use App\Action\Customer\GetCustomersAction;
use App\Serializer\JsonSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class GetAllCustomersController
{
    public function __construct(
        private readonly GetCustomersAction $getCustomersAction
    ) {
    }

    /**
     * Get all customers
     * @return JsonResponse
     */
    #[Route('/customer', methods:['GET'])]
    public function get(): JsonResponse
    {
        return new JsonResponse(
            JsonSerializer::serialize(($this->getCustomersAction)())
        );
    }
}
