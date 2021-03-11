<?php

declare(strict_types=1);

namespace App\Tests\Builder\Request;

use App\Builder\Request\WgetBuilder;
use App\Enum\RequestHttpMethodEnum;

class WgetBuilderTest extends AbstractBuilderTest
{
    /**
     * @param mixed[] $builderParams
     *
     * @dataProvider correctCommandDataProvider
     */
    public function testReturnsCorrectCommand(array $builderParams, string $expected): void
    {
        $builder = new WgetBuilder();

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
                "wget --method GET https://internet.com --header 'Connection: keep-alive'",
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
                "wget --method POST https://world.web --header 'Connection: keep-alive' --post-data 'param1=valueParam1&param2=valueParam2'",
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
        $builder = new WgetBuilder();

        $this->setBuilderData($builder, $builderParams);

        $this->expectExceptionMessage($exceptionMessage);

        $builder->build()->getCommand();
    }
}
