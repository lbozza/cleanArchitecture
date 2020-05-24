<?php
declare(strict_types=1);


namespace App\App\Action;

use App\Domain\Product\ProductDTO;
use Domain\Product\ProductService;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * Class RegisterProductAction
 * @package App\Action
 */
class RegisterProductAction
{
    /**
     * @var ContainerInterface
     */
    protected  $container;

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
    public function __invoke(Request $request, Response $response, $args): Response
    {
        $payload = json_decode($request->getBody()->getContents(), true);

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