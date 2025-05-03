<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\PayPal;
use App\CreditCard;
use App\PayPalAdapter;
use App\CreditCardAdapter;
use App\PaymentAdapterInterface;

class CollectMoneyTest extends TestCase
{
    public function testCollectMoneyWithPayPalAdapter()
    {
        $paypal = new PayPal('customer@aol.com', 'password');
        $adapter = new PayPalAdapter($paypal);

        $this->assertInstanceOf(PaymentAdapterInterface::class, $adapter);
        $result = $adapter->collectMoney(100);
        $this->assertTrue($result);
    }

    public function testCollectMoneyWithCreditCardAdapter()
    {
        $card = new CreditCard(1234567890123456, '09/22');
        $adapter = new CreditCardAdapter($card);

        $this->assertInstanceOf(PaymentAdapterInterface::class, $adapter);
        $result = $adapter->collectMoney(200);
        $this->assertTrue($result);
    }
}
