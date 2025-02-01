@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title', 'Companies')

@section('content_header')
    <h1>{{ __('Companies') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('companies.update', ['company' => $company->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row flex-column-reverse flex-sm-row">
                    <div class="col-12 col-sm-8">
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" id="name" name="name"
                                   class="form-control @error('name') is-invalid @enderror" value="{{ $company->name }} "
                                   required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror" value="{{ $company->email }} "
                                   required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="website">Website</label>
                            <input type="url" id="website" name="website"
                                   class="form-control @error('website') is-invalid @enderror"
                                   value="{{ $company->website }}" required>
                            @error('website')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="logo">Company Logo</label>
                            <div class="image-upload-container position-relative bg-light d-flex flex-column justify-content-center align-items-center" data-target="logo" style="height: 200px;">
                                <div class="image-preview w-100 h-100 overflow-hidden" style="{{$company->logo ? 'display: block' : 'display: none'}}">
                                    <img class="preview-img w-100 h-100 object-fit-cover" src="/storage/{{$company->logo}}" alt="Logo Preview">
                                </div>
                                <div class="image-placeholder d-flex text-center justify-content-center align-items-center mt-3">
                                    <i class="fas fa-cloud-upload-alt fs-3"></i>
                                    <p>Click to upload logo</p>
                                </div>
                                <input type="file" name="logo" class="custom-file-input position-absolute top-0 left-0 w-100 h-100 opacity-0" data-target="logo" accept="image/*"
                                       style="cursor: pointer;">
                            </div>
                            @error('logo')
                            <div class="is-invalid"></div>
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Edit Company</button>
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection

