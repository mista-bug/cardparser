<?php

namespace MrBug\Cardparser\Tests;

use MrBug\Cardparser\Card;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Card::class)]
class CardTest extends TestCase
{
    public function test_constructor_sets_properties_correctly()
    {
        $card = new Card('HA'); // Ace of Hearts

        $reflection = new \ReflectionClass($card);

        $code = $reflection->getProperty('code');
        $code->setAccessible(true);
        $this->assertSame('HA', $code->getValue($card));

        $suit = $reflection->getProperty('suit');
        $suit->setAccessible(true);
        $this->assertSame('H', $suit->getValue($card));

        $value = $reflection->getProperty('value');
        $value->setAccessible(true);
        $this->assertSame('A', $value->getValue($card));

        $fullName = $reflection->getProperty('fullName');
        $fullName->setAccessible(true);
        $this->assertSame('Ace of Hearts', $fullName->getValue($card));

        $fileType = $reflection->getProperty('fileType');
        $fileType->setAccessible(true);
        $this->assertSame('.svg', $fileType->getValue($card));
    }

    public function test_is_valid_returns_true_for_valid_codes()
    {
        $this->assertTrue(Card::isValid('HA'));
        $this->assertTrue(Card::isValid('DQ'));
        $this->assertTrue(Card::isValid('S5'));
    }

    public function test_is_valid_returns_false_for_invalid_codes()
    {
        $this->assertFalse(Card::isValid('XZ'));  // bad suit
        $this->assertFalse(Card::isValid('H0'));  // bad value
        $this->assertFalse(Card::isValid(''));    // empty
        $this->assertFalse(Card::isValid('H'));   // incomplete
        $this->assertFalse(Card::isValid('HZZ')); // too long but also invalid
    }

    public function test_get_full_name_works_correctly()
    {
        $card = new Card('DQ'); // Diamond Queen
        $reflection = new \ReflectionClass($card);
        $method = $reflection->getMethod('getFullName');
        $method->setAccessible(true);

        $this->assertSame('Queen of Diamonds', $method->invoke($card));
    }

    public function test_get_suit_and_value_names()
    {
        $reflection = new \ReflectionClass(Card::class);

        $suitMethod = $reflection->getMethod('getSuitName');
        $suitMethod->setAccessible(true);

        $valueMethod = $reflection->getMethod('getValueName');
        $valueMethod->setAccessible(true);

        $this->assertSame('Heart', $suitMethod->invoke(null, 'H'));
        $this->assertSame('King', $valueMethod->invoke(null, 'K'));
        $this->assertNull($suitMethod->invoke(null, 'X'));
        $this->assertNull($valueMethod->invoke(null, 'Z'));
    }
}
