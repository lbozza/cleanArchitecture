<?php

namespace App\Infra\DAO\Product;

use App\Domain\Product\ProductDAOInterface;
use App\Domain\Product\ProductDTO;

/**
 * Class ProductDAO
 * @package App\Infra\DAO\Product
 */
class ProductDAO implements ProductDAOInterface
{
    /**
     * @var \PDO
     */
    private \PDO $connection;

    /**
     * ProductDAO constructor.
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param ProductDTO $productDTO
     */
    public function save(ProductDTO $productDTO)
    {
    }
}
