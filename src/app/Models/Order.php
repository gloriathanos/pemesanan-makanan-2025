<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'menu_ids', 'status'];

    protected $casts = [
        'menu_ids' => 'array', // agar JSON diubah jadi array otomatis
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function menus()
    {
        return Menu::whereIn('id', $this->menu_ids)->get();
    }
}
