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

    private $target;

    private $spyBookDao;

    protected function setUp()
    {
        $this->target = new OrderServiceForTest();
        $this->spyBookDao = m::spy(IBookDao::class);
        $this->target->setBookDao($this->spyBookDao);
    }


    public function test_sync_book_orders_3_orders_only_2_book_order()
    {
        $this->givenOrders(['Book', 'CD', 'Book']);

        $this->target->syncBookOrders();

        $this->bookDaoShouldInsert(2);
    }

    /**
     * @param $type
     * @return Order
     */
    private function createOrder($type): Order
    {
        $order = new Order();
        $order->type = $type;
        return $order;
    }

    private function givenOrders($types): void
    {
        $orders = [];
        foreach ($types as $type) {
            $orders[] = $this->createOrder($type);
        }
        $this->target->setOrders($orders);
    }

    private function bookDaoShouldInsert($times): void
    {
        $this->spyBookDao->shouldHaveReceived('insert')->with(m::on(function (Order $order) {
            return $order->type === 'Book';
        }))->times($times);
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