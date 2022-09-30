@extends('layout.website')

@section('content')

    <div class=" bg-gray-100">
        <div class="max-w-3xl mx-auto bg-white">

        <x-admin.recovery.invoice :accounts="$accounts" :invoice="$invoice"/>

{{--        <div class=" mt-10">--}}
{{--            <div class="text-center">--}}
{{--                This invoice was generated on {{now()->format('d-M-Y')}}--}}
{{--            </div>--}}
{{--            <div class="h-4 bg-brand-r w-full "></div>--}}
{{--        </div>--}}
        </div>
    </div>

@endsection
