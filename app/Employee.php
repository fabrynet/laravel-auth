<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'firstname',
      'lastname',
      'date_of_birth',
      'private_code',
      'location_id'
    ];
    // relazione One To Many (Inversa) employees -> locations
    public function location() {
      return $this -> belongsTo(Location::class);
    }
    // relazione Many To Many employees <-> tasks
    public function tasks() {
      return $this -> belongsToMany(Task::class);
    }
}
