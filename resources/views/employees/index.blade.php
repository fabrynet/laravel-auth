@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  <h1>Index Employees</h1>

                  @auth
                  <a href="{{ route('employees.create') }}">Create New Employee</a>
                  @endauth

                  <ol>
                    @foreach ($emps as $emp)
                      <li>
                        <a href="{{ route('employees.show', $emp -> id)}}">
                          {{ $emp -> firstname }}
                          {{ $emp -> lastname }}
                        </a>
                      </li>
                    @endforeach
                  </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
