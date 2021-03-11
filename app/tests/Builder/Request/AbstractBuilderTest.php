<?php

declare(strict_types=1);

namespace App\Tests\Builder\Request;

use App\Enum\RequestHttpMethodEnum;
use App\Interface\Request\RequestBuilderInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractBuilderTest extends TestCase
{
    /**
     * @return mixed[]
     */
    public function validationThrowsExceptionDataProvider(): array
    {
        return [
            'setting body for GET request' => [
                [
                    'httpMethod' => RequestHttpMethodEnum::from(RequestHttpMethodEnum::GET),
                    'url' => 'https://internet.com',
                    'headers' => [
                        [
                            'name' => 'Connection',
                            'value' => 'keep-alive',
                        ],
                    ],
                    'body' => 'param1=valueParam1&param2=valueParam2'
                ],
                'Body cannot be set for request with method GET',
            ],
            'url not set' => [
                [
                    'httpMethod' => RequestHttpMethodEnum::from(RequestHttpMethodEnum::GET),
                    'headers' => [
                        [
                            'name' => 'Connection',
                            'value' => 'keep-alive',
                        ],
                    ],
                ],
                'Missing request parameter: url',
            ],
            'missing http method' => [
                [
                    'url' => 'https://internet.com',
                    'headers' => [
                        [
                            'name' => 'Connection',
                            'value' => 'keep-alive',
                        ],
                    ],
                ],
                'Missing request parameter: httpMethod',
            ],
            'invalid url' => [
                [
                    'httpMethod' => RequestHttpMethodEnum::from(RequestHttpMethodEnum::POST),
                    'url' => 'invalid url',
                    'headers' => [
                        [
                            'name' => 'Connection',
                            'value' => 'keep-alive',
                        ],
                    ],
                ],
                "'invalid url' is not a valid URL",
            ],
        ];
    }

    protected function setBuilderData(RequestBuilderInterface $builder, array $builderParams)
    {
        if (isset($builderParams['httpMethod'])) {
            $builder->setHttpMethod($builderParams['httpMethod']);
        }

        if (isset($builderParams['url'])) {
            $builder->setUrl($builderParams['url']);
        }

        if (isset($builderParams['body'])) {
            $builder->setBody($builderParams['body']);
        }

        if (isset($builderParams['headers'])) {
            foreach ($builderParams['headers'] as $headerData) {
                $builder->addHeader($headerData['name'], $headerData['value']);
            }
        }
    }
}
