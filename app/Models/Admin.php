<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public $incrementing = true;
    public $timestamps = false;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $guarded = [];  

    public function getManager(){

        return $this->hasMany(Admin::class, 'user_id', 'admin_id');
        }
        // public function getAdmin(){
        //     return $this->hasOne(admin::class, 'admin_id', 'id');
        // }

        // public static function getAdmin($adminID){
        //     return self::where('admin_coll',$adminID)->get()->toArray();
        // }

        // public function getDepartment(){
        //     return $this->hasMany(Department::class, 'dep_id', 'admin_id');
        // }

        public static function getAdmin($adminID){
            return self::where('admin_coll',$adminID)->get()->toArray();
        }
    
}
