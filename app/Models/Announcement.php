<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public $incrementing = true;
    public $timestamps = false;
    protected $table = 'announcement';
    protected $primaryKey = 'anns_id';
    protected $guarded = [];  

    public function getAnnouncement(){
        return $this->get();
    }
}
