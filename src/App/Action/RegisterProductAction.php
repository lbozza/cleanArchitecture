<?php

declare(strict_types=1);

namespace App\App\Action;

use App\Domain\Product\ProductDTO;
use App\Domain\Product\ProductService;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * Class RegisterProductAction
 * @package App\Action
 */
final class RegisterProductAction
{

    /**
     * @var ProductService
     */
    private ProductService $service;

    /**
     * RegisterProductAction constructor.
     * @param ProductService $service
     */
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $args): Response
    {
        $payload = json_decode($request->getBody()->getContents(), true);

        $this->service->save(
            new ProductDTO(
                $payload['description'],
                $payload['value'],
                $payload['quantity']
            )
        );
        return $response->withStatus(204);
    }

}