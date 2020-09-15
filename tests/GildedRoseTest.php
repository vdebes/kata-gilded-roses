<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use phpDocumentor\Reflection\Types\Void_;
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

    /** @testdox All items have a Quality value which denotes how valuable the item is */
    public function testItemsHaveQualityValue(): void
    {
        $quality = 10;
        $item = new Item('foo', 0, $quality);

        $this->assertObjectHasAttribute('quality', $item);
        $this->assertEquals($quality, $item->quality);
    }

    /** @testdox At the end of each day our system lowers both values for every item */
    public function testItemsQualityDecreases(): void
    {
        $items = [new Item('foo', 1, 1), new Item('bar', 2, 2)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertLessThan(1, $items[0]->sell_in);
        $this->assertLessThan(1, $items[0]->quality);
        $this->assertLessThan(2, $items[1]->sell_in);
        $this->assertLessThan(2, $items[1]->quality);
    }

    /** @testdox Once the sell by date has passed, Quality degrades twice as fast */
    public function testPassedItemQualityDegradesTwiceAsFast(): Void
    {
        $initialQuality = 100;
        $items = [new Item('foo', 1, $initialQuality)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $updatedQuality = $items[0]->quality;
        $qualityDiff = $initialQuality - $updatedQuality;
        $gildedRose->updateQuality();
        $newQualityDiff = $updatedQuality - $items[0]->quality;

        $this->assertEquals($newQualityDiff, $qualityDiff * 2);
    }

    /** @testdox The Quality of an item is never negative */
    public function testItemQualityCannotBeNegative(): Void
    {
        $items = [new Item('foo', 1, 1), new Item('bar', 2, 2)];
        $gildedRose = new GildedRose($items);

        foreach ($items as $item) {
            while ($item->quality !== 0) {
                $gildedRose->updateQuality();
            }

            $this->assertGreaterThanOrEqual(0, $item->quality);
        }
    }
}
