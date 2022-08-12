@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                <h2>{{ $data['company']['symbol'] }} => {{ $data['company']['name'] }}</h2>
            </div>
        </div>
    </div>
    <hr>
    @include('entities.company.chart', [
        'labels' => $data['charts']['labels'],
        'openData' => $data['charts']['openData'],
        'closeData' => $data['charts']['closeData'],
    ])
    @include('entities.company.table', ['prices' => $data['prices']])
@endsection
