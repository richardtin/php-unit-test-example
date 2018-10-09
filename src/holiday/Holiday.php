<?php

namespace App\holiday;


class Holiday
{
    public function sayXmas()
    {
        if (date('m-d') === '12-25') {
            return 'Merry Xmas';
        }
        return 'Today is not Xmas';
    }
}