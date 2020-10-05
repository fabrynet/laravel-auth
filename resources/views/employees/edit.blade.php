@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h1>
                    Edit Employee:
                    {{ $emp -> firstname}} {{ $emp -> lastname }}
                  </h1>
                  <a href="{{ route('employees.show', $emp -> id) }}">
                    Show Employee
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

                  <form action="{{ route('employees.update', $emp -> id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" name="firstname" value="{{ $emp -> firstname }}" required>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" type="text" name="lastname" value="{{ $emp -> lastname }}" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="date_of_birth">Date of Birth</label>
                        <input class="form-control" type="date" name="date_of_birth" value="{{ $emp -> date_of_birth }}" required>
                      </div>
                      <div class="form-group col-md-8">
                        <label for="private_code">Private Code</label>
                        <input class="form-control" type="number" name="private_code" value="{{ $emp -> private_code }}" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="location_id">Location</label>
                        <select class="form-control" name="location_id">
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
                    </div>

                    <button class="btn btn-primary" type="submit" name="button">Update</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
