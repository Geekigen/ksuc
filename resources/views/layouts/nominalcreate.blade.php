@extends('layouts.admin')
@section('content')
<div id="page-wrapper">
<div class="main-page">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Generate nominal roll') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/nominal">
    
                            @csrf
    
                            <div class="row mb-3">
                                <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('Students name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Name" type="Name" class="form-control @error('Name') is-invalid @enderror" name="name" value="{{ old('Name') }}" required autocomplete="Name" autofocus>
    
                                    @error('Name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="Adm" class="col-md-4 col-form-label text-md-end">{{ __('Admission') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Adm" type="Adm" class="form-control @error('Adm') is-invalid @enderror" name="adm" required autocomplete="current-Adm">
    
                                    @error('Adm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                             <div class="row mb-3">
                                <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('year') }}</label>
    
                                <div class="col-md-6">
                                    <input id="year" type="year" class="form-control @error('year') is-invalid @enderror" name="year" required autocomplete="current-Adm">
    
                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="school" class="col-md-4 col-form-label text-md-end">{{ __('school') }}</label>
    
                                <div class="col-md-6">
                                    <input id="school" type="year" class="form-control @error('school') is-invalid @enderror" name="school" required autocomplete="current-Adm">
    
                                    @error('school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                         
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enter details') }}
                                    </button>
    
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection