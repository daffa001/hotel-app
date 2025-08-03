<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'carts';

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function Room()
    {
        return $this->belongsTo(Room::class, 'rooms_id');
    }


    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'c_id');
    }
}
