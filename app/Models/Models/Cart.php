<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [
        'stock_id',
        'user_id'
    ];

    public function deleteMyCart(Int $stock_id, Int $user_id)
    {
        $user_id = Auth::id();
        $this->where('user_id', $user_id)->where('stock_id', $stock_id)->delete();
        return $message = '商品をカート内から削除しました';
    }
}
