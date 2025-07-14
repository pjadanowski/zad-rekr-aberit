<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItem\StoreCartItemRequest;
use App\Http\Requests\CartItem\UpdateCartItemRequest;
use App\Http\Resources\CartItem\CartItemResource;
use App\Models\CartItem;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = CartItem::with('product')->get();

        return CartItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartItemRequest $request)
    {
        $item = CartItem::create($request->validated());

        return new CartItemResource($item->load('product'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        return new CartItemResource($cartItem->load('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        $cartItem->update($request->validated());

        return new CartItemResource($cartItem->load('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return response()->json(['message' => 'Cart item deleted']);
    }
}
