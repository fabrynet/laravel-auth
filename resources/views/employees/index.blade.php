@extends('layouts.main-layout')

@section('content')
  <h1>Index Employees</h1>

  <a href="{{ route('employees.create') }}">Create New Employee</a>

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


@endsection
