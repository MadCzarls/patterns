<?php

declare(strict_types=1);

namespace App\Tests\FactoryObject\Notifier\Sms;

use App\FactoryObject\Notifier\Sms\ReceiverValidator;
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
            'receiver is 9 numeric characters long' => [
                '123123123',
                true,
            ],
            'receiver is 9 alphanumeric characters long' => [
                '123a23x23',
                false,
            ],
            'receiver has more than 9 characters' => [
                '123123123X111',
                false,
            ],
            'receiver has less than 9 characters' => [
                '12312312',
                false,
            ],
        ];
    }

    protected function setUp(): void
    {
        $this->validator = new ReceiverValidator();
    }
}
