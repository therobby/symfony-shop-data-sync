<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    private ?int $customer_id = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    private ?int $wp_order_id = null;

    #[Assert\NotBlank]
    // uuid
    #[ORM\Column(length: 255)]
    private ?string $subscription_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function setCustomerId(int $customer_id): static
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getWpOrderId(): ?int
    {
        return $this->wp_order_id;
    }

    public function setWpOrderId(int $wp_order_id): static
    {
        $this->wp_order_id = $wp_order_id;

        return $this;
    }

    public function getSubscriptionId(): ?string
    {
        return $this->subscription_id;
    }

    public function setSubscriptionId(string $subscription_id): static
    {
        $this->subscription_id = $subscription_id;

        return $this;
    }
}
