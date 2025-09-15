<?php

namespace MrBug\Cardparser;


class Symbol
{
    protected string $code;
    protected string $gameCode;
    protected string $name;
    protected array $hand;

    public function __construct(string $symbolCode, string $gameCode)
    {
        $this->code = $symbolCode;
        $this->gameCode = $gameCode;
        $this->name = self::getName($this->gameCode, $this->code);
        $this->hand = [];
    }

    public function setHand(array $hand)
    {
        $this->hand = $hand;
    }

    public static function getName(string $gameCode, string $symbol)
    {
        return match ("{$gameCode}:{$symbol}") {
            // Andar Bahar (AB)
            'AB:J' => 'Joker',
            'AB:A' => 'Andar',
            'AB:B' => 'Bahar',

            // Baccarat (BAC)
            'BAC:P' => 'Player',
            'BAC:B' => 'Banker',

            // Blackjack (BJ)
            'BJ:B' => 'Banker',
            'BJ:P1' => 'Player 1',
            'BJ:P2' => 'Player 2',
            'BJ:P3' => 'Player 3',
            'BJ:P4' => 'Player 4',
            'BJ:P5' => 'Player 5',
            'BJ:P6' => 'Player 6',
            'BJ:P7' => 'Player 7',

            // General suits & separators (global)
            'GLOBAL:C' => 'Club (Card Suit)',
            'GLOBAL:H' => 'Heart (Card Suit)',
            'GLOBAL:S' => 'Spade (Card Suit)',
            'GLOBAL:;' => 'Card/Number Separator',
            'GLOBAL::' => 'Type Separator',
            'GLOBAL:,' => 'Hand Separator',

            default => null,
        };
    }
}
