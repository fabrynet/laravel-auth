@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  <a href="{{ route('employees.index') }}">
                    Index Employees
                  </a>

                  <h1>
                    {{ $emp -> firstname}} {{ $emp -> lastname }}
                  </h1>

                  <ul>
                    <li>
                      <b>Date of birth:</b> {{ $emp -> date_of_birth }}
                    </li>
                    <li>
                      <b>Private code:</b> {{ $emp -> private_code }}
                    </li>
                    <li>
                      <b>Location:</b> {{ $emp -> location -> name }} ({{ $emp -> location -> city }})
                    </li>
                  </ul>

                  @auth
                  <a href="{{ route('employees.edit', $emp -> id) }}">
                    Edit Employee
                  </a>
                  @endauth

                  <h3>
                    Tasks
                  </h3>
                  @if ($emp -> tasks -> isNotEmpty())
                    <table>
                      <thead>
                        <th></th>
                        <th>
                          task
                        </th>
                        <th>
                          description
                        </th>
                        <th>
                          start date
                        </th>
                        <th>
                          end date
                        </th>
                      </thead>
                      @foreach ($emp -> tasks as $tas)
                        <tr>
                          <td>
                            @auth
                            <form action="{{ route('employees.unassigntask', $emp -> id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="text" name="task_id" value="{{ $tas -> id}}" hidden>
                              <button class="delete" type="submit" name="button">Unassign</button>
                            </form>
                            @endauth
                          </td>
                          <td>
                            {{ $tas -> name }}
                          </td>
                          <td>
                            {{ $tas -> description }}
                          </td>
                          <td>
                            {{ $tas -> start_date }}
                          </td>
                          <td>
                            {{ $tas -> end_date }}
                          </td>
                        </tr>
                      @endforeach
                    </table>
                  @else
                    ---
                  @endif

                  @auth
                  <h3>Assign Task</h3>
                  <form class="" action="{{ route('employees.assigntask', $emp -> id) }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label for="task_id">Task</label>
                      <select name="task_id">
                        @foreach ($tasks as $task)
                          <option value="{{ $task -> id}}">
                            {{ $task -> name }}
                            ({{ $task -> description }})
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" name="button">Assign</button>
                  </form>

                  <form action="{{ route('employees.destroy', $emp -> id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="submit" name="button">Delete Employee</button>
                  </form>
                  @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
