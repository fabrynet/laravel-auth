<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Employee;
use App\Task;

class LoggedController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

    public function createEmployees() {
      $locs = Location::all();
      return view('employees.create', compact('locs'));
    }

    public function storeEmployees(Request $request) {

      $validatedData = $request -> validate([
        'firstname' => 'bail|required|alpha|max:60',
        'lastname' => 'required|alpha|max:60',
        'date_of_birth' => 'required|date',
        'private_code' => 'required|digits_between:1,15',
        ]);

      Employee::create($request -> all());
      return redirect() -> route('employees.index');

    }

    public function editEmployees($id) {
      $emp = Employee::findOrFail($id);
      $locs = Location::all();
      return view('employees.edit', compact('emp','locs'));
    }

    public function updateEmployees(Request $request, $id) {

      $validatedData = $request -> validate([
        'firstname' => 'bail|required|alpha|max:60',
        'lastname' => 'required|alpha|max:60',
        'date_of_birth' => 'required|date',
        'private_code' => 'required|digits_between:1,15',
        ]);

      $data = $request -> all();
      $emp = Employee::findOrFail($id);
      $emp -> update($data);

      return redirect() -> route('employees.show', $id);

    }

    public function destroyEmployees($id) {
      $emp = Employee::findOrFail($id);
      $emp -> delete();
      return redirect() -> route('employees.index');
    }

    public function assignTaskEmployees(Request $request, $id) {
      $data = $request -> all(); // restituisce array
      $task = $data['task_id'];
      $emp = Employee::findOrFail($id);
      if ( !$emp -> tasks() -> find($task) ) {
        $emp -> tasks() -> attach($task);
      }

      return redirect() -> route('employees.show', $emp -> id);
    }

    public function unassignTaskEmployees(Request $request, $id) {
      $data = $request -> all(); // restituisce array
      $task = $data['task_id'];
      $emp = Employee::findOrFail($id);
      $emp -> tasks() -> detach($task);

      return redirect() -> route('employees.show', $emp -> id);
    }
}
