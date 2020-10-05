<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Task;

class GuestController extends Controller
{
  public function indexEmployees() {
    $emps = Employee::all();
    return view('employees.index', compact('emps'));
  }
  public function showEmployees($id) {
    $emp = Employee::findOrFail($id);
    $tasks = Task::inRandomOrder()
                  -> take(rand(5, 10))
                  -> get();;
    return view('employees.show', compact('emp','tasks'));
  }
}
