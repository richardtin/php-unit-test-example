<?php

namespace App\EcStore;

interface IBookDao
{
    public function insert(Order $order);
}