@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@extends('adminlte::page')
@section('title', 'Employees')

@section('content_header')
    <h1>{{ __('Employees') }}</h1>
@stop

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm align-middle d-block ml-auto mr-2"> <p class="my-1">Create Employee</p> </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped" data-table>
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->company?->name }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $employees->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection



