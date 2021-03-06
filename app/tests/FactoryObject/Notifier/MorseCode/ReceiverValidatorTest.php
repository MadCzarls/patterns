<?php

declare(strict_types=1);

namespace App\Tests\FactoryObject\Notifier\MorseCode;

use App\FactoryObject\Notifier\MorseCode\ReceiverValidator;
use PHPUnit\Framework\TestCase;

class ReceiverValidatorTest extends TestCase
{
    private ReceiverValidator $validator;

    /**
     * @dataProvider dataProvider
     */
    public function testIsValid(string $message, bool $expected): void
    {
        $this->assertEquals($expected, $this->validator->isValid($message));
    }

    public function dataProvider(): array
    {
        return [
            'receiver has valid email syntax' => [
                'test@example.com',
                true,
            ],
            'receiver has valid email syntax with empty characters' => [
                'test@example.com    ',
                false,
            ],
            'receiver does not contain @ character' => [
                'testexample.com',
                false,
            ],
            'receiver ends with digit' => [
                'test@example.com2',
                true,
            ],
            'receiver is empty' => [
                '',
                false,
            ],
        ];
    }

    protected function setUp(): void
    {
        $this->validator = new ReceiverValidator();
    }
}
