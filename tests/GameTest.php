<?php

namespace MrBug\Cardparser;

use PHPUnit\Framework\TestCase;

#[\PHPUnit\Framework\Attributes\CoversClass(\MrBug\Cardparser\Game::class)]
class GameTest extends TestCase
{
    public function test_game_initialization_for_known_codes()
    {
        $data = [
            'POKER',
            'AB',
            'BJ',
            'BAC',
        ];

        foreach ($data as $code) {
            $game = new Game($code);
            $this->assertInstanceOf(Game::class, $game);
            $this->assertSame($code, $game->code);
        }
    }

    public function test_get_name_returns_null_for_unknown_codes()
    {
        $this->assertNull(Game::getName('XYZ'));
        $this->assertNull(Game::getName(''));
        $this->assertNull(Game::getName('123'));
    }

    public function test_get_name_returns_correct_names()
    {
        $this->assertSame('Andar Bahar', Game::getName('AB'));
        $this->assertSame('Baccarat', Game::getName('BAC'));
        $this->assertSame('Blackjack', Game::getName('BJ'));
        $this->assertSame('Poker', Game::getName('POKER'));
    }
}
