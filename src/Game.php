<?php

namespace MrBug\Cardparser;


class Game {
    protected ?string $name;
    public ?string $code;
    public array $handCollection;
    
    public function __construct(string $code) {
        $this->code = $code;
        $this->name = self::getName($this->code);
        $this->handCollection = [];
    }

    public static function getName(string $code) : ?string
    {
        return match ($code) {
            "AB"        => "Andar Bahar",
            "BAC"       => "Baccarat",
            "BJ"        => "Blackjack",
            "POKER"     => "Poker",
            default => null,
        };
    }
}
