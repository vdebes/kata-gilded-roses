<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /** @testdox All items have a SellIn value which denotes the number of days we have to sell the item */
    public function testItemsHaveSellInValue(): void
    {
        $value = 10;
        $item = new Item('foo', $value, 0);
        $this->assertObjectHasAttribute('sell_in', $item);
        $this->assertEquals($value, $item->sell_in);
    }
}
