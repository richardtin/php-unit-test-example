<?php

namespace Tests\EcStore;

use App\EcStore\IBookDao;
use App\EcStore\Order;
use App\EcStore\OrderService;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_sync_book_orders_3_orders_only_2_book_order()
    {
        $target = new OrderServiceForTest();
        $order1 = new Order();
        $order1->type = 'Book';
        $order2 = new Order();
        $order2->type = 'CD';
        $order3 = new Order();
        $order3->type = 'Book';

        $orders = [$order1, $order2, $order3];
        $target->setOrders($orders);

        $spyBookDao = m::spy(IBookDao::class);
        $target->setBookDao($spyBookDao);

        $target->syncBookOrders();

        $spyBookDao->shouldHaveReceived('insert')->with(m::on(function (Order $order) {
            return $order->type === 'Book';
        }))->times(2);
    }
}

class OrderServiceForTest extends OrderService
{
    private $orders;
    private $bookDao;

    public function setBookDao($bookDao)
    {
        $this->bookDao = $bookDao;
    }

    protected function getBookDao(): IBookDao
    {
        return $this->bookDao;
    }

    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    protected function getOrders()
    {
        return $this->orders;
    }
}