@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
                <div class="card-header">{{ __('Verify your account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Click here to verify') }}
                                </button>
                              
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection