<?php

namespace Tests\holiday;

use App\holiday\Holiday;
use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase
{
    private $holiday;

    protected function setUp()
    {
        $this->holiday = new HolidayForTest();
    }

    public function testTodayIsXmas()
    {
        $this->givenToday('12', '25');
        $this->shouldResponse('Merry Xmas');
    }

    public function test_1224_IsXmasToo() {
        $this->givenToday('12', '24');
        $this->shouldResponse('Merry Xmas');
    }

    private function givenToday($month, $day): void
    {
        $this->holiday->setToday(date($month . '-' . $day));
    }

    private function shouldResponse($expected): void
    {
        $this->assertEquals($expected, $this->holiday->sayXmas());
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
