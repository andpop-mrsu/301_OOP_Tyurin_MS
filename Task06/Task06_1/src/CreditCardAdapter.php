<?php

namespace App;

class CreditCardAdapter implements PaymentAdapterInterface
{
    private CreditCard $card;

    public function __construct(CreditCard $card)
    {
        $this->card = $card;
    }
    public function collectMoney($amount): bool
    {
        return $this->card->authorizeTransaction($amount) ? true : false;
    }
}
