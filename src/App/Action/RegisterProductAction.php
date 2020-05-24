<?php

namespace App\Action;

use Domain\Product\ProductService;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * Class RegisterProductAction
 * @package App\Action
 */
final class RegisterProductAction{
    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;

    /**
     * RegisterProductAction constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function save(Request $request, Response $response, $args): Response
    {
        echo 'hello'; die;
        $payload = $request->getAttributes();
        $productService = $this->container->get(ProductService::class);
        $productService->save(
            new ProductDTO(
                $payload['description'],
                $payload['value'],
                $payload['quantity']
            )
        );
        return $response->withStatus(204);
    }

}