<?php

namespace MrBug\Cardparser\Tests;

use MrBug\Cardparser\Symbol;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Symbol::class)]
class SymbolTest extends TestCase
{
    public function test_constructor_sets_properties_correctly()
    {
        $symbol = new Symbol('P1', 'BJ'); // Blackjack Player 1

        $reflection = new \ReflectionClass($symbol);

        $code = $reflection->getProperty('code');
        $code->setAccessible(true);
        $this->assertSame('P1', $code->getValue($symbol));

        $gameCode = $reflection->getProperty('gameCode');
        $gameCode->setAccessible(true);
        $this->assertSame('BJ', $gameCode->getValue($symbol));

        $name = $reflection->getProperty('name');
        $name->setAccessible(true);
        $this->assertSame('Player 1', $name->getValue($symbol));

        $hand = $reflection->getProperty('hand');
        $hand->setAccessible(true);
        $this->assertIsArray($hand->getValue($symbol));
        $this->assertEmpty($hand->getValue($symbol));
    }

    public function test_get_name_returns_expected_values()
    {
        $this->assertSame('Joker', Symbol::getName('AB', 'J'));
        $this->assertSame('Andar', Symbol::getName('AB', 'A'));
        $this->assertSame('Bahar', Symbol::getName('AB', 'B'));

        $this->assertSame('Player', Symbol::getName('BAC', 'P'));
        $this->assertSame('Banker', Symbol::getName('BAC', 'B'));

        $this->assertSame('Player 2', Symbol::getName('BJ', 'P2'));
        $this->assertSame('Banker', Symbol::getName('BJ', 'B'));

        $this->assertSame('Club (Card Suit)', Symbol::getName('GLOBAL', 'C'));
        $this->assertSame('Card/Number Separator', Symbol::getName('GLOBAL', ';'));
    }

    public function test_get_name_returns_null_for_unknown_symbols()
    {
        $this->assertNull(Symbol::getName('BJ', 'XYZ'));
        $this->assertNull(Symbol::getName('UNKNOWN', 'P1'));
        $this->assertNull(Symbol::getName('', ''));
    }

    public function test_set_hand_updates_hand_property()
    {
        $symbol = new Symbol('P1', 'BJ');
        $symbol->setHand(['card1', 'card2']);

        $reflection = new \ReflectionClass($symbol);
        $hand = $reflection->getProperty('hand');
        $hand->setAccessible(true);

        $this->assertSame(['card1', 'card2'], $hand->getValue($symbol));
    }
}
