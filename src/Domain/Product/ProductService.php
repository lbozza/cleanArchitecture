<?php

namespace App\Domain\Product;

use App\Domain\Product\ProductDAOInterface;

class ProductService
{
    /**
     * @var ProductDAOInterface
     */
    private  $productDAO;

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