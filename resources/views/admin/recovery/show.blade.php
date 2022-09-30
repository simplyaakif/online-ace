@extends('layout.website')

@section('content')

    <div class="h-screen bg-gray-100">
        <x-admin.recovery.invoice :invoice="$recovery"/>
    </div>

@endsection
