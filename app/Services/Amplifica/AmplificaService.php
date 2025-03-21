<?php


namespace App\Services\Amplifica;


use App\Contracts\ShippingApiInterface;
use App\Models\Cart;
use App\Services\Amplifica\Exceptions\AmplificaAuthException;
use App\Services\Amplifica\Exceptions\AmplificaException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AmplificaService implements ShippingApiInterface
{
    protected $token;
    protected $baseUrl;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->baseUrl = config('shipping.amplifica.base_url');
        $this->username = config('shipping.amplifica.username');
        $this->password = config('shipping.amplifica.password');
    }

    public function getToken(): string
    {
        return Cache::remember('amplifica_token', 55, function () {
            $response = Http::post($this->baseUrl . '/auth', [
                'username' => $this->username,
                'password' => $this->password,
            ]);
            if ($response->failed()) {
                $errorMessage = $response->json('message', 'Error desconocido');
                throw new AmplificaAuthException($errorMessage);
            }
            return $response->json('token');
        });
    }

    private function getHeaders(): array
    {
        return ['Authorization' => 'Bearer ' . $this->getToken()];
    }


    public function getRegions(): array
    {
        return Cache::remember('regions', 3600, function () {
            $response = Http::withHeaders($this->getHeaders())->get($this->baseUrl . '/regionalConfig');
            if ($response->failed()) {
                $errorMessage = $response->json('message', 'Error desconocido');
                throw new AmplificaException($errorMessage);
            }

            return $response->json();
        });
    }

    public function getRates(Cart $cart, string $comuna): array
    {
        $products = $this->productCollection($cart);
        if ($products->isEmpty()) {
            throw new AmplificaException('El carro esta vacío');
        }
        $data = [
            'products' => $products,
            'comuna' => $comuna
        ];
        $response = Http::withHeaders($this->getHeaders())->post($this->baseUrl . '/getRate', $data);
        return $response->json();
    }

    private function productCollection(Cart $cart)
    {
        return collect($cart->products)->map(function ($product) {
            $quantity = $product['pivot']['quantity'];
            return [
                'weight' => $product['weight'] * $quantity,
                'quantity' => $quantity
            ];
        });
    }
}
