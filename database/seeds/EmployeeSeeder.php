<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Location;
use App\Task;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Employee::class, 100)
      -> make() // genera 100 istanze del model Employee
      -> each(function($emp) {
        $loc = Location::inRandomOrder() -> first();
        $emp -> location() -> associate($loc);
        $emp -> save();

        $tas = Task::inRandomOrder()
            -> take(rand(5, 20))
            -> get();
        $emp -> tasks() -> attach($tas);
      });
    }
}
