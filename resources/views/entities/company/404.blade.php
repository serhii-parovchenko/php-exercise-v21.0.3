@extends('layouts.app')

@section('content')
    <div class="col">
        <div class="d-flex justify-content-center">
            <div class="alert alert-warning">
                <h3>{{ __('The company prices data not found!') }}</h3>
                <div class="d-flex justify-content-center">
                    {{ __('To return back, please, click on the link: ') }}
                    <a href="{{ route('company-home') }}" class="alert-link">{{ __('here') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
