<?php

declare(strict_types=1);

namespace App\Tests\Builder\Request;

use App\Builder\Request\CurlBuilder;
use App\Enum\RequestHttpMethodEnum;

class CurlBuilderTest extends AbstractBuilderTest
{
    /**
     * @param mixed[] $builderParams
     *
     * @dataProvider correctCommandDataProvider
     */
    public function testReturnsCorrectCommand(array $builderParams, string $expected): void
    {
        $builder = new CurlBuilder();

        $this->setBuilderData($builder, $builderParams);

        $this->assertEquals($expected, $builder->build()->getCommand());
    }

    /**
     * @return mixed[]
     */
    public function correctCommandDataProvider(): array
    {
        return [
            'correct command with method GET' => [
                [
                    'httpMethod' => RequestHttpMethodEnum::from(RequestHttpMethodEnum::GET),
                    'url' => 'https://internet.com',
                    'headers' => [
                        [
                            'name' => 'Connection',
                            'value' => 'keep-alive',
                        ],
                    ],
                ],
                "curl -X GET https://internet.com -H 'Connection: keep-alive'",
            ],
            'correct command with method POST' => [
                [
                    'httpMethod' => RequestHttpMethodEnum::from(RequestHttpMethodEnum::POST),
                    'url' => 'https://world.web',
                    'headers' => [
                        [
                            'name' => 'Connection',
                            'value' => 'keep-alive',
                        ],
                    ],
                    'body' => 'param1=valueParam1&param2=valueParam2'
                ],
                "curl -X POST https://world.web -H 'Connection: keep-alive' -d 'param1=valueParam1&param2=valueParam2'",
            ],
        ];
    }

    /**
     * @param mixed[] $builderParams
     *
     * @dataProvider validationThrowsExceptionDataProvider
     */
    public function testValidationThrowsException(array $builderParams, string $exceptionMessage): void
    {
        $builder = new CurlBuilder();

        $this->setBuilderData($builder, $builderParams);

        $this->expectExceptionMessage($exceptionMessage);

        $builder->build()->getCommand();
    }
}
