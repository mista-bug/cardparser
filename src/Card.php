<?php 

namespace MrBug\Cardparser;

class Card {
    protected ?string $code;
    protected ?string $fullName;
    protected ?string $suit;
    protected ?string $value;
    protected ?string $dir;
    protected ?string $dirLocation;
    protected ?string $fileType;

    public function __construct(string $code) {
        $this->code = $code;
        $explodedCode = str_split($code);
        $this->suit = $explodedCode[0];
        $this->value = $explodedCode[1];
        $this->fullName = $this->getFullName();
        $this->fileType = '.svg';
    }

    public static function isValid(string $code) : bool
    {
        if (empty($code)) {
            return false;
        }

        $explodedCode = str_split($code);
        $suit = array_key_exists(1, $explodedCode) ? $explodedCode[0] : null;
        $value = array_key_exists(1, $explodedCode) ? $explodedCode[1] : null;

        return ! in_array(null, [
            self::getSuitName($suit),
            self::getValueName($value)
        ], true);
    }

    protected function getFullName() : string
    {
        return self::getValueName($this->value) . ' of ' . self::getSuitName($this->suit) . 's';
    }

    protected static function getSuitName(?string $suit) : ?string
    {
        return match ($suit) {
            'C' => 'Club',
            'D' => 'Diamond',
            'H' => 'Heart',
            'S' => 'Spade',
            default => null
        };
    }

    protected static function getValueName(?string $value) : ?string
    {
        return match ($value) {
            'A' => 'Ace',
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine',
            '10' => 'Ten',
            'J' => 'Jack',
            'Q' => 'Queen',
            'K' => 'King',
            default => null
        };
    }
}