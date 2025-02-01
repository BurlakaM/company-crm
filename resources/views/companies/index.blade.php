@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@extends('adminlte::page')
@section('title', 'Companies')

@section('content_header')
    <h1>{{ __('Companies') }}</h1>
@stop

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('companies.create') }}" class="btn btn-success btn-sm align-middle d-block ml-auto mr-2"> <p class="my-1">Create Company</p> </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped" data-table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
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
                {{ $companies->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection



