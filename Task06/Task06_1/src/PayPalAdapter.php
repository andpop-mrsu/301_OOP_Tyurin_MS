<?php

namespace App;

class PayPalAdapter implements PaymentAdapterInterface
{
    private PayPal $payPal;

    public function __construct(PayPal $payPal)
    {
        $this->payPal = $payPal;
    }
    public function collectMoney($amount): bool
    {
        return $this->payPal->transfer("onafixed@mail.da", $amount) ? true : false;
    }
}
