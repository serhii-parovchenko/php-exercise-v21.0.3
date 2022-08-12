@extends('layouts.app')

@section('content')
    @include('entities.company.form')
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.js_reset_form', function () {
            $(this).closest('form')[0].reset();
        });
    </script>
@endsection
