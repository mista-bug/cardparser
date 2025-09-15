##
**Sample Usage**
```php
    $parser = new Parser(
        cardString: 'B;C9;DQ:P1;D7;SJ:P2;H9;D2;H9:P3;SQ;C5',
        gameCode: 'BJ',
    );
```

**Results**
```php
object(MrBug\Cardparser\Parser)#646 (4) {
  ["game":protected]=>
  object(MrBug\Cardparser\Game)#375 (3) {
    ["name":protected]=>
    string(9) "Blackjack"
    ["code"]=>
    string(2) "BJ"
    ["handCollection"]=>
    array(4) {
      [0]=>
      object(MrBug\Cardparser\Symbol)#655 (4) {
        ["code":protected]=>
        string(1) "B"
        ["gameCode":protected]=>
        string(2) "BJ"
        ["name":protected]=>
        string(6) "Banker"
        ["hand":protected]=>
        array(2) {
          [0]=>
          object(MrBug\Cardparser\Card)#653 (5) {
            ["code":protected]=>
            string(2) "C9"
            ["fullName":protected]=>
            string(13) "Nine of Clubs"
            ["suit":protected]=>
            string(1) "C"
            ["value":protected]=>
            string(1) "9"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
          [1]=>
          object(MrBug\Cardparser\Card)#652 (5) {
            ["code":protected]=>
            string(2) "DQ"
            ["fullName":protected]=>
            string(17) "Queen of Diamonds"
            ["suit":protected]=>
            string(1) "D"
            ["value":protected]=>
            string(1) "Q"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
        }
      }
      [1]=>
      object(MrBug\Cardparser\Symbol)#651 (4) {
        ["code":protected]=>
        string(2) "P1"
        ["gameCode":protected]=>
        string(2) "BJ"
        ["name":protected]=>
        string(8) "Player 1"
        ["hand":protected]=>
        array(2) {
          [0]=>
          object(MrBug\Cardparser\Card)#20 (5) {
            ["code":protected]=>
            string(2) "D7"
            ["fullName":protected]=>
            string(17) "Seven of Diamonds"
            ["suit":protected]=>
            string(1) "D"
            ["value":protected]=>
            string(1) "7"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
          [1]=>
          object(MrBug\Cardparser\Card)#641 (5) {
            ["code":protected]=>
            string(2) "SJ"
            ["fullName":protected]=>
            string(14) "Jack of Spades"
            ["suit":protected]=>
            string(1) "S"
            ["value":protected]=>
            string(1) "J"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
        }
      }
      [2]=>
      object(MrBug\Cardparser\Symbol)#645 (4) {
        ["code":protected]=>
        string(2) "P2"
        ["gameCode":protected]=>
        string(2) "BJ"
        ["name":protected]=>
        string(8) "Player 2"
        ["hand":protected]=>
        array(3) {
          [0]=>
          object(MrBug\Cardparser\Card)#644 (5) {
            ["code":protected]=>
            string(2) "H9"
            ["fullName":protected]=>
            string(14) "Nine of Hearts"
            ["suit":protected]=>
            string(1) "H"
            ["value":protected]=>
            string(1) "9"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
          [1]=>
          object(MrBug\Cardparser\Card)#598 (5) {
            ["code":protected]=>
            string(2) "D2"
            ["fullName":protected]=>
            string(15) "Two of Diamonds"
            ["suit":protected]=>
            string(1) "D"
            ["value":protected]=>
            string(1) "2"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
          [2]=>
          object(MrBug\Cardparser\Card)#597 (5) {
            ["code":protected]=>
            string(2) "H9"
            ["fullName":protected]=>
            string(14) "Nine of Hearts"
            ["suit":protected]=>
            string(1) "H"
            ["value":protected]=>
            string(1) "9"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
        }
      }
      [3]=>
      object(MrBug\Cardparser\Symbol)#596 (4) {
        ["code":protected]=>
        string(2) "P3"
        ["gameCode":protected]=>
        string(2) "BJ"
        ["name":protected]=>
        string(8) "Player 3"
        ["hand":protected]=>
        array(2) {
          [0]=>
          object(MrBug\Cardparser\Card)#595 (5) {
            ["code":protected]=>
            string(2) "SQ"
            ["fullName":protected]=>
            string(15) "Queen of Spades"
            ["suit":protected]=>
            string(1) "S"
            ["value":protected]=>
            string(1) "Q"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
          [1]=>
          object(MrBug\Cardparser\Card)#594 (5) {
            ["code":protected]=>
            string(2) "C5"
            ["fullName":protected]=>
            string(13) "Five of Clubs"
            ["suit":protected]=>
            string(1) "C"
            ["value":protected]=>
            string(1) "5"
            ["dir":protected]=>
            uninitialized(?string)
            ["dirLocation":protected]=>
            uninitialized(?string)
            ["fileType":protected]=>
            string(4) ".svg"
          }
        }
      }
    }
  }
  ["cardString":protected]=>
  string(37) "B;C9;DQ:P1;D7;SJ:P2;H9;D2;H9:P3;SQ;C5"
  ["handSeparator":protected]=>
  string(1) ":"
  ["cardSeparator":protected]=>
  string(1) ";"
}
```
    
