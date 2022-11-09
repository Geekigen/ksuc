@extends('layouts.lecturer')
@section('content')
<div id="page-wrapper">
<div class="main-page">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create courses') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/course">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="Course title" class="col-md-4 col-form-label text-md-end">{{ __('Course title') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Course title" type="text" class="form-control @error('Course title') is-invalid @enderror" name="title" value="{{ old('Course title') }}" required autocomplete="Course title" autofocus>
    
                                    @error('Course title')
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
                            <div class="row mb-3">
                                <label for="Course code" class="col-md-4 col-form-label text-md-end">{{ __('Course code') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Course code" type="text" class="form-control @error('Course code') is-invalid @enderror" name="code" value="{{ old('Course code') }}" required autocomplete="Course code" autofocus>
    
                                    @error('Course code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Year" class="col-md-4 col-form-label text-md-end">{{ __('Year ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Year" type="text" class="form-control @error('Year') is-invalid @enderror" name="Year" value="{{ old('Year') }}" required autocomplete="Year" autofocus>
    
                                    @error('Year')
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