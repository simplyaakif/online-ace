@extends('layout.website')
@section('content')
    <div x-data="{mobile:false}" class="relative bg-gray-50 overflow-hidden">
        <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full" aria-hidden="true">
            <div class="relative h-full max-w-7xl mx-auto">
                <svg class="absolute right-full transform translate-y-1/4 translate-x-1/4 lg:translate-x-1/2"
                     width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"></rect>
                </svg>
                <svg
                    class="absolute left-full transform -translate-y-3/4 -translate-x-1/4 md:-translate-y-1/2 lg:-translate-x-1/2"
                    width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="5d0dd344-b041-4d26-bec4-8d33ea57ec9b" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#5d0dd344-b041-4d26-bec4-8d33ea57ec9b)"></rect>
                </svg>
            </div>
        </div>

        <div class="relative pt-6 pb-16 sm:pb-24">
            <div x-data="{ open: false, focus: true }" x-init="init()" @keydown.escape="onEscape"
                 @close-popover-group.window="onClosePopoverGroup">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <nav class="relative flex items-center justify-between sm:h-10 md:justify-center"
                         aria-label="Global">
                        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                <a href="#">
                                    <span class="sr-only">Ace Online</span>
                                    <x-logo class="h-10 w-20"/>
                                </a>
                                <div class="-mr-2 flex items-center md:hidden">
                                    <button type="button" class="bg-gray-50 rounded-md p-2 inline-flex items-center
                                    justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100
                                    focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                            @click="open= true" @mousedown="if (open) $event.preventDefault()"
                                            aria-expanded="false" :aria-expanded="open.toString()">
                                        <span class="sr-only">Open main menu</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex md:space-x-10">

                            <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Product</a>

                            <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Features</a>

                            <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Marketplace</a>

                            <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Company</a>

                        </div>
                        <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
              <span class="inline-flex rounded-md shadow">
                <a href="{{route('filament.auth.login')}}"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                  Log in
                </a>
              </span>
                        </div>
                    </nav>
                </div>

                <div x-show="open" x-transition:enter="duration-150 ease-out"
                     x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     x-description="Mobile menu, show/hide based on menu open state."
                     class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                     x-ref="panel" @click.away="open = false" style="display: none;">
                    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <div>
                                <x-logo class="w-12 h-8"/>
                            </div>
                            <div class="-mr-2">
                                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center
                                justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none
                                 focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="open=false">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3">

                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Product</a>

                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Features</a>

                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Marketplace</a>

                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Company</a>

                        </div>
                        <a href="{{route('filament.auth.login')}}"
                           class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                            Log in
                        </a>
                    </div>
                </div>

            </div>

            <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-bold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Platform to make you</span>
                        <span class="block text-brand-r xl:inline">skilled online</span>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl
                md:max-w-3xl">Live Online Sessions, right from the comfort of your home. All regular courses
                        available by professional tutors.</p>
                    <div class="mt-5 max-w-2xl mx-auto sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border
                        border-transparent text-base font-medium rounded-md text-white bg-brand-b hover:bg-brand-r
                        md:py-4 md:text-lg md:px-10"> Register Online</a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border
                        border-transparent text-base font-medium rounded-md text-brand-b bg-white hover:bg-gray-50
                        md:py-4 md:text-lg md:px-10"> Apply for Demo Class </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <section class="bg-gray-50">
        <div class="container mx-auto">
            <div class="grid grid-cols-4 gap-4">
            @foreach($courses as $course)
                <div class="bg-white rounded">
                    <div class="h-36 bg-brand-r rounded-t flex justify-center items-center">
                        <span class="text-gray-50">
                    {{$course->title}}
                        </span>
                    </div>
                    <div class="p-4">
                    {{$course->title}}
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

@endsection
