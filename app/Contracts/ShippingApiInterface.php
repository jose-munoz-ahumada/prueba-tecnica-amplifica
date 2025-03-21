<?php

namespace App\Contracts;

use App\Models\Cart;

interface ShippingApiInterface
{
    public function getToken(): string;
    public function getRegions(): array;
    public function getRates(Cart $cart, string $comuna): array;
}
