<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'name',
      'start_date',
      'end_date',
      'description'
    ];
    // relazione Many To Many tasks <-> employees
    public function employees() {
      return $this -> belongsToMany(Employee::class);
    }
}
