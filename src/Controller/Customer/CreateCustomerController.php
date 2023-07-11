<?php

declare(strict_types=1);

namespace App\Controller\Customer;

use App\Action\Customer\CreateCustomerAction;
use App\Serializer\JsonSerializer;
use App\Validators\Customer\CustomerValidator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class CreateCustomerController
{
    public function __construct(
        private readonly CustomerValidator $customerValidator,
        private readonly CreateCustomerAction $createCustomerAction
    ) {
    }

    /**
     * Add customer
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/customer', methods:['POST'])]
    public function add(Request $request): JsonResponse
    {
        $customer = ($this->customerValidator)(json_decode($request->getContent(), true));
        if (!is_string($customer)) {
            return (
                ($this->createCustomerAction)($customer)
                ? new JsonResponse(JsonSerializer::serialize($customer), 201)
                : new JsonResponse(['error' => 'Customer already exists'], 422)
            );
        }
        return new JsonResponse(['error' => $customer], 400);
    }
}
