<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'cart';

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'c_id');
    }
}
