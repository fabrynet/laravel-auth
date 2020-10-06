@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h1>Create Employee</h1>
                  <a href="{{ route('employees.index') }}">
                    Index Employees
                  </a>
                </div>

                <div class="card-body">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <form action="{{ route('employees.store') }}" method="post">
                    @csrf
                    @method('POST')

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" name="firstname" value="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" type="text" name="lastname" value="" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="date_of_birth">Date of Birth</label>
                        <input class="form-control" type="date" name="date_of_birth" value="" required>
                      </div>
                      <div class="form-group col-md-8">
                        <label for="private_code">Private Code</label>
                        <input class="form-control" type="number" name="private_code" value="" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="location_id">Location</label>
                        <select class="form-control" name="location_id">
                          @foreach ($locs as $loc)
                            <option value="{{ $loc -> id}}">
                              {{ $loc -> name }}
                              ({{ $loc -> city}})
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <button class="btn btn-primary" type="submit" name="button">Create Employee</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
