<?php

declare(strict_types=1);

namespace App\Tests\FactoryObject\Notifier\Pager;

use App\FactoryObject\Notifier\Pager\MessageHandler;
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
                'HELLO WORLD',
            ],
            'message has special characters' => [
                'ZażóŁć GęŚlĄ jaźń!',
                'ZAZOLC GESLA JAZN',
            ],
            'empty message' => [
                '',
                '',
            ],
            'message with length exceeding allowed 120' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                'LOREM IPSUM DOLOR SIT AMET CONSECTETUR ADIPISCING ELIT SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA',
            ],
        ];
    }

    protected function setUp(): void
    {
        $this->handler = new MessageHandler();
    }
}
