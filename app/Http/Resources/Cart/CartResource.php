<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\CartItem\CartItemResource;
use App\Services\PriceService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'session_id' => $this->session_id,
            'user_id'    => $this->user_id,
            'items'      => CartItemResource::collection($this->whenLoaded('items')),
            'total_price' => $total = $this->items->sum('total_price'),
            'total_price_formatted' => app(PriceService::class)->formatPrice($total), // its just dummy example how to use PriceService
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
