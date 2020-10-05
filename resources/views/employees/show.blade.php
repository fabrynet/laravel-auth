@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h1>
                    Employee:
                    {{ $emp -> firstname}} {{ $emp -> lastname }}
                  </h1>
                  <a href="{{ route('employees.index') }}">
                    Index Employees
                  </a>
                </div>

                <div class="card-body">
                  <ul class="list-unstyled">
                    <li>
                      <b>Date of birth:</b> {{ $emp -> date_of_birth }}
                    </li>
                    @auth
                    <li>
                      <b>Private code:</b> {{ $emp -> private_code }}
                    </li>
                    @endauth
                    <li>
                      <b>Location:</b> {{ $emp -> location -> name }} ({{ $emp -> location -> city }})
                    </li>
                  </ul>

                  @auth
                  <a class="btn btn-primary" href="{{ route('employees.edit', $emp -> id) }}">
                    Edit
                  </a>
                  <form class="form_delete" action="{{ route('employees.destroy', $emp -> id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" name="button">Delete</button>
                  </form>
                  @else
                    {{ __('Please login if you want Edit/Delete') }}
                  @endauth

                  <p>
                    <h3>
                      Tasks
                    </h3>
                    @if ($emp -> tasks -> isNotEmpty())
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">
                              task
                            </th>
                            <th scope="col">
                              description
                            </th>
                            <th scope="col">
                              start date
                            </th>
                            <th scope="col">
                              end date
                            </th>
                          </tr>
                        </thead>
                        @foreach ($emp -> tasks as $tas)
                          <tr>
                            <td>
                              @auth
                              <form action="{{ route('employees.unassigntask', $emp -> id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="text" name="task_id" value="{{ $tas -> id}}" hidden>
                                <button class="btn btn-danger" type="submit" name="button">X</button>
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
                  </p>

                  @auth
                  <p>
                    <h3>Assign Task</h3>
                    <form class="" action="{{ route('employees.assigntask', $emp -> id) }}" method="post">
                      @csrf
                      @method('POST')
                      <div class="form-group">
                        {{-- <label for="task_id">Task</label> --}}
                        <select class="form-control" name="task_id">
                          @foreach ($tasks as $task)
                            <option value="{{ $task -> id}}">
                              {{ $task -> name }}
                              ({{ $task -> description }})
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <button class="btn btn-primary" type="submit" name="button">Assign</button>
                    </form>
                  </p>
                  @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
