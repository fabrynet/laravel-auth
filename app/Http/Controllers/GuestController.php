<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
  public function index() {
    $emps = Employee::all();
    return view('employees.index', compact('emps'));
  }
  public function show($id) {
    $emp = Employee::findOrFail($id);
    $tasks = Task::inRandomOrder()
                  -> take(rand(5, 10))
                  -> get();;
    return view('employees.show', compact('emp','tasks'));
  }
}
