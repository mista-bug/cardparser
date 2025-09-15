<?php

namespace MrBug\Cardparser;
use Exception;

class Parser {
    protected Game $game;
    protected string $cardString;
    protected string $handSeparator = ':';
    protected string $cardSeparator = ';';

    public function __construct(string $cardString, string $gameCode) {
        $this->game = new Game($gameCode);
        $this->cardString = $cardString;
        $this->parse();
    }

    public function parse()
    {
        $explodedCardString = explode($this->handSeparator, $this->cardString);
        foreach ($explodedCardString as $handValue) {

            $cards = explode($this->cardSeparator, $handValue);
            $symbol = new Symbol($cards[0], $this->game->code);
            unset($cards[0]);

            $cardCollection = [];
            foreach ($cards as $cardValue) {
                if ( ! Card::isValid($cardValue)) {
                    throw new Exception('Invalid Card ' . $cardValue);
                }
                $cardCollection[] = new Card($cardValue);
            }

            $symbol->setHand($cardCollection);
            $this->game->handCollection[] = $symbol;
        }

        return $this;
    }

    public function game()
    {
        return $this->game;
    }

    private static function gameSymbols()
    {
        return [
            'J',
            'A',
            'B',
            'P',
            'P1',
            'P2',
            'P3',
            'P4',
            'P5',
            'P6',
            'P7',
            'F',
            'R',
            'Green',
            'Red',
            'D',
            'T',
            'GT',
            'TSB',
            'W',
            'X',
            'Y',
            'Z',
            'C',
            'H',
            'S',
            ';',
            ':',
            ','
        ];
    }
}