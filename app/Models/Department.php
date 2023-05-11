<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'departments';
    protected $primaryKey = 'dep_id';
    protected $guarded = [];  
    
    
    public static function getDepartment($departmentID){
        return self::where('dep_coll',$departmentID)->get()->toArray();
    }

    
    public function getAdmin(){
        return $this->belongsTo(Admin::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($department) {
    //         $department->created_by = auth()->id();
    //     });
    // }
    
}
