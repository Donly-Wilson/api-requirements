<?php

namespace App\Domain\Products\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->category == 'insurance') {
            // $discounted_price = $this->price * 70 / 100 ;
            $discounted_price = $this->price - ($this->price * 0.3);
            $discount_percentage = '30%';
        } elseif ($this->sku == '000003') {
            $discounted_price = $this->price - ($this->price * 0.15);
            $discount_percentage = '15%';
        } else {
            $discounted_price = $this->price;
            $discount_percentage = null;
        }

        return [
            'sku' => $this->sku,
            'category' => $this->category,
            'name' => $this->name,
            'price' => [
                'original_price' => $this->price,
                'final' => $discounted_price,
                'discounted_price' => $discount_percentage,
                'currency' => 'EUR',
            ],
        ];
    }
}
