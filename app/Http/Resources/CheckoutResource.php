<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_id' => ProductResource::make($this->product_id),
            'name' => $this->name,
            'address' => $this->address,
            'amount' => $this->amount,
            'status' => $this->status,
        ];
    }
}
