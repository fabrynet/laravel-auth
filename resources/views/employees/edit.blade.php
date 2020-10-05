@extends('layouts.app')

@section('content')

  <a href="{{ route('employees.index') }}">
    Index Employees
  </a>

  <h1>Edit Employee</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('employees.update', $emp -> id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" name="firstname" value="{{ $emp -> firstname }}" required>
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" name="lastname" value="{{ $emp -> lastname }}" required>
    </div>
    <div class="form-group">
      <label for="date_of_birth">Date of Birth</label>
      <input type="date" name="date_of_birth" value="{{ $emp -> date_of_birth }}" required>
    </div>
    <div class="form-group">
      <label for="private_code">Private Code</label>
      <input type="number" name="private_code" value="{{ $emp -> private_code }}" required>
    </div>
    <div class="form-group">
      <label for="location_id">Location</label>
      <select name="location_id">
        @foreach ($locs as $loc)
          <option value="{{ $loc -> id}}"
            @if ($loc -> id === $emp -> location -> id)
              {{-- $emp -> location -> id ~ $emp -> location_id --}}
              selected
            @endif
            >
            {{ $loc -> name }}
            ({{ $loc -> city}})
          </option>
        @endforeach
      </select>
    </div>
    <button type="submit" name="button">Update Employee</button>
  </form>

@endsection
