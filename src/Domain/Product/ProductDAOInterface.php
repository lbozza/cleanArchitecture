<?php

namespace App\Domain\Product;

interface ProductDAOInterface
{
    public function save(ProductDTO $productDTO);
}