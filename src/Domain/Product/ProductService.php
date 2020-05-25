<?php

declare(strict_types=1);

namespace App\Domain\Product;

class ProductService
{
    /**
     * @var ProductDAOInterface
     */
    private ProductDAOInterface $productDAO;

    /**
     * ProductService constructor.
     * @param ProductDAOInterface $productDAO
     */
    public function __construct(ProductDAOInterface $productDAO)
    {
        $this->productDAO = $productDAO;
    }

    /**
     * @param ProductDTO $product
     */
    public function save(ProductDTO $product)
    {
        $this->productDAO->save($product);
    }
}