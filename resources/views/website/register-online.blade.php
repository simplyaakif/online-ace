@extends('layout.invoice')

@section('content')
    <div >
    <div
        style="background: url({{asset('img/img-lab-computer.jpg')}});background-size: cover"
        class="inset-0 flex h-screen justify-center items-center">
        <div class="w-2/3 min-w-4xl bg-white/75 p-12 rounded-lg shadow">
        <img class="max-w-xs mx-auto my-8"  src="{{asset('img/Logo BG.svg')}}"/>
            <livewire:register-online/>
        </div>
    </div>
    </div>
@endsection
