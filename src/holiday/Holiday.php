<?php

namespace App\holiday;


class Holiday
{
    public function sayXmas()
    {
        $today = $this->getToday();
        if ($today === '12-25') {
            return 'Merry Xmas';
        }
        return 'Today is not Xmas';
    }

    /**
     * @return false|string
     */
    protected function getToday()
    {
        return date('m-d');
    }
}