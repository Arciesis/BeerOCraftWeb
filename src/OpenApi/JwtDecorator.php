<?php

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\Model\Operation;
use ApiPlatform\Core\OpenApi\Model\PathItem;
use ApiPlatform\Core\OpenApi\Model\RequestBody;
use ApiPlatform\Core\OpenApi\OpenApi;
use ArrayObject;

class JwtDecorator implements OpenApiFactoryInterface
{
    private $decorated;

    public function __construct(OpenApiFactoryInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(array $context = []): OpenApi
    {
        $OpenApi = $this->decorated->__invoke($context);
        $schemas = $OpenApi->getComponents()->getSchemas();
        $schemas['Token'] = new ArrayObject([
           'type' => 'object',
           'properties' => [
               'email' => [
                   'type' => 'string',
                   'example' => 'johndoe@example.com',
               ],
               'password' => [
                   'type' => 'string',
                   'example' => 'supersecret',
               ],
           ],
        ]);

        $schemas['Credentials'] = new ArrayObject([
            'type' => 'object',
            'properties' => [
                'email' => [
                    'type' => 'string',
                    'example' => 'johndoe@example.com',
                ],
                'password' => [
                    'type' => 'string',
                    'example' => 'supersecret',
                ],
            ]
        ]);

        $schemas = $OpenApi->getComponents()->getSecuritySchemes() ?? [];
        $schemas['JWT'] = new ArrayObject([
            'type' => 'http',
            'scheme' => 'bearer',
            'bearerFormat' => 'JWT',
        ]);

        $pathItem = new PathItem(
            ref: 'JWT Token',
            post: new Operation(
                operationId: 'postCredentialsItem',
                tags: ['Token'],
                responses: [
                    '200' => [
                        'description' => 'Get the JWT Token',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Token',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            summary: 'Get JWT Token to login.',
//             The docs says to do so but actually it doesn't work...
//            requestBody: new RequestBody(
//                description: 'Generate new JWT Token',
//                content: new ArrayObject(
//                    [
//                        'application/json' => [
//                            'schema' => [
//                                '$ref' => '#/components/schemas/Credentials',
//                            ],
//                        ],
//                    ]
//                ),
//                security: [],
//            ),
        );
        $OpenApi->getPaths()->addPath('/dashboard/login_check', $pathItem);
        return $OpenApi;
    }
}
