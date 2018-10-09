<?php

namespace Tests\holiday;

use App\holiday\Holiday;
use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase
{
    public function testTodayIsXmas()
    {
        $holiday = new HolidayForTest();
        $holiday->setToday(date('12-25'));
        $this->assertEquals('Merry Xmas', $holiday->sayXmas());
    }
}

class HolidayForTest extends Holiday
{
    private $today;

    public function setToday($date)
    {
        $this->today = $date;
    }

    protected function getToday()
    {
        return $this->today;
    }
}
