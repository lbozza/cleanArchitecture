<?php

namespace App\App\Infra\DAO\Product;

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
    private  $connection;

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
        $statement = "INSERT INTO product (description, value, quantity) VALUES (?, ? , ?)";
        $this->connection->beginTransaction();
        $this->connection->prepare($statement)->execute([
            $productDTO->getDescription(),
            $productDTO->getValue(),
            $productDTO->getQuantity()
        ]);
        $this->connection->commit();
    }
}
