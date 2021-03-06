<?php

declare(strict_types=1);

namespace App\Tests\FactoryObject\Notifier\MorseCode;

use App\FactoryObject\Notifier\MorseCode\MessageHandler;
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
                '.... . .-.. .-.. ---  .-- --- .-. .-.. -..',
            ],
            'message has special characters' => [
                'ZażóŁć GęŚlĄ jaźń!',
                '--.. .- --.. --- .-.. -.-.  --. . ... .-.. .-  .--- .- --.. -.',
            ],
            'empty message' => [
                '',
                '',
            ],
        ];
    }

    protected function setUp(): void
    {
        $this->handler = new MessageHandler();
    }
}
