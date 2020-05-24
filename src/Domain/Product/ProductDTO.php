<?php

namespace App\Domain\Product;

class ProductDTO
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var string
     */
    private string $value;

    /**
     * @var string
     */
    private string $quantity;

    /**
     * ProductDTO constructor.
     * @param string $description
     * @param string $value
     * @param string $quantity
     */
    public function __construct(string $description, string $value, string $quantity)
    {
        $this->description = $description;
        $this->value = $value;
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }
}
