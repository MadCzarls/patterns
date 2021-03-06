<?php

declare(strict_types=1);

namespace App\Tests\FactoryObject\Notifier\Sms;

use App\FactoryObject\Notifier\Sms\MessageHandler;
use PHPUnit\Framework\TestCase;

class MessageHandlerTest extends TestCase
{
    private MessageHandler $handler;

    /**
     * @dataProvider dataProvider
     */
    public function testPrepare(string $message, string $expected): void
    {
        $this->assertEquals($expected, $this->handler->prepare($message));
    }

    public function dataProvider(): array
    {
        return [
            'message does not have special characters' => [
                'Hello world',
                'Hello world',
            ],
            'message has special characters' => [
                'ZażóŁć GęŚlĄ jaźń!',
                'ZażóŁć GęŚlĄ jaźń!',
            ],
            'empty message' => [
                '',
                '',
            ],
            'message with length exceeding allowed 160' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostru',
            ],
        ];
    }

    protected function setUp(): void
    {
        $this->handler = new MessageHandler();
    }
}
