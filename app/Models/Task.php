<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'task';
    protected $primaryKey = 'task_id';
    protected $guarded = [];
    
    public function getEmployeeTask(){
        return $this->get();
    }

    public function getUser(){
        return $this->belongsTo(Task::class, 'user_id', 'task_id');
    }

    public function taskReport(){
        return $this->hasMany(TaskReport::class, 'task_id','task_report_id');
    }
}
