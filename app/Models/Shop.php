<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'redeem_shop';
    protected $primaryKey = 'item_id';
    protected $guarded = [];
    protected $fillable = [
        'item_id',
        'item_name',
        'points',
        'item_code',
        'user_id',
        'isClaimed',
        'isSold'
    ];

    public function getRedeemShop(){
        return $this->get();
    }
}
