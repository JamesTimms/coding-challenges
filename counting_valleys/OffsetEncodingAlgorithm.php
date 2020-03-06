<?php

declare(strict_types=1);

/**
 * Class OffsetEncodingAlgorithm
 */
class OffsetEncodingAlgorithm
{
    /**
     * Lookup string
     */
    public const CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @var int
     */
    private $offset;

    /**
     * @param int $offset
     */
    public function __construct(int $offset = 13)
    {
        $this->offset = $offset;
    }

    /**
     * Encodes text by shifting each character (existing in the lookup string) by an offset (provided in the constructor)
     * Examples:
     *      offset = 1, input = "a", output = "b"
     *      offset = 2, input = "z", output = "B"
     *      offset = 1, input = "Z", output = "a"
     *
     * @param string $text
     * @return string
     */
    public function encode(string $text): string
    {
        /**
         * @todo: Implement it
         */
        $encoded_text = "";        
        for($pos=0; $pos < strlen($text); $pos++){
            // $byte = ord($text[$pos]);
            // $shifted_byte = $byte + $this->offset;
            // $encoded_text .= chr($shifted_byte);
            
            // Quick solution due to initial wrong attempt.
            $lookup_pos = strpos('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $text[$pos], $this->offset);
            $encoded_text .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'[$lookup_pos];
        }
        return $encoded_text;
        echo "text: $text\n";
        echo "encoded text: $encoded_text\n";
        return $encoded_text;
    }
}

function getTexts()
{
    return [
        [0, '', ''],
        [1, '', ''],
        [1, 'a', 'b'],
        [0, 'abc def.', 'abc def.'],
        [1, 'abc def.', 'bcd efg.'],
        [2, 'z', 'B'],
        [1, 'Z', 'a'],
        [26, 'abc def.', 'ABC DEF.'],
        [26, 'ABC DEF.', 'abc def.'],
    ];
}

function tests($offset, $text, $encoded_text) {

  $algorithm = new \OffsetEncodingAlgorithm(2);
  $algorithm->encode('z'); 

}

$algorithm = new \OffsetEncodingAlgorithm(2);
$algorithm->encode('z');
