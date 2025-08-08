<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStocks extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'room_stocks';


    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'c_id');
    }
    public function Room()
    {
        return $this->belongsTo(Room::class, 'r_id');
    }
    public function Transaction()
    {
        return $this->hasMany(Transaction::class, 't_id');
    }
}
