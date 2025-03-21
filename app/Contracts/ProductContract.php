<?php


namespace App\Contracts;


use App\Models\Product;

interface ProductContract
{
    public function get(string $slug);
    public function newest();
}
