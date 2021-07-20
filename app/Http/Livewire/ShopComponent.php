<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;


class ShopComponent extends Component
{
	public function store($product_id,$product_name,$product_price)
	{
		Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
		session()->Flash('success','Item added in cart');
		return redirect()->route('product.cart');
	}
	use WithPagination;
    public function render()
    {
        return view('livewire.shop-component')->layout("layouts.base");
    }
}
