<?php

namespace MrBug\Cardparser;

use MrBug\Cardparser\Parser;
use PHPUnit\Framework\TestCase;

#[\PHPUnit\Framework\Attributes\CoversClass(\MrBug\Cardparser\Parser::class)]
class ParserTest extends TestCase
{
    public function test_parser()
    {
        $testData = [
            [
                'cards' => 'P;HK;DQ;HJ:B;H5;CK;DA',
                'code' => 'BAC',
            ],
            [
                'cards' => 'J;SJ:A;H9;D10;D6:B;DQ;S10;S6',
                'code' => 'AB',
            ],
            [
                'cards' => 'B;C9;DQ:P1;D7;SJ:P2;H9;D2;H9:P3;SQ;C5',
                'code' => 'BJ',
            ]
        ];

        foreach ($testData as $data) {
            $parser = new Parser(
                cardString: $data['cards'],
                gameCode: $data['code']
            );

            $this->assertInstanceOf(Parser::class, $parser);
            $this->assertInstanceOf(Game::class, $parser->game());
        }
    }
}
