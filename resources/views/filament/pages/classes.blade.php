<x-filament-panels::page>
    @if($show_class)
        <section class="mt-4 grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-3">
            @foreach($batches as $batch)
                <div wire:key="{{ $batch->id }}" class="bg-white dark:bg-gray-900 rounded-lg shadow">
                    <div class="p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="text-lg font-medium">
                                    {{$batch->title}}
                                </div>
                                <div class="text-sm text-gray-400">
                                    Active Students
                                </div>
                            </div>
                            <div>
                                <span class="bg-primary-600 text-white rounded-full text-base flex justify-center
                                items-center w-8 h-8">
                                {{count($batch->batch_students()->where('end_date','>=',now())->get())}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4  py-2 text-sm rounded-b-lg bg-gray-50 dark:bg-gray-800">
                        <button wire:click="show_students({{$batch->id}})">
                            View Batch
                        </button>
                    </div>
                </div>
            @endforeach
        </section>
    @else
        <section>
            <button  wire:click="$toggle('show_class')" style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
               class="mb-4 fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                <span class="fi-btn-label">
                    Go Back
                </span>
            </button>
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($students as $student)
                    <li wire:key="{{ $student->id }}" class="col-span-1 flex flex-col text-center bg-white dark:bg-gray-900 rounded-lg shadow divide-y divide-gray-200">
                        <div class="flex-1 flex flex-col p-8">
                            <div href="">
                                {{--                        <img class="w-24 h-24 flex-shrink-0 object-cover mx-auto rounded-full" src="https://portal.ace.org.pk/storage/515/2Pj8fn2hJOh77vLOM0dnQGX6Qye7ti-metaRmFyd2FoIGJhdG9vbC5qcGc=-.jpg" alt="Farwah batool" title="Farwah batool">--}}
                                <h3 class="mt-6 hover:text-cyan-700 text-gray-900 text-sm
                                    font-medium">{{$student->student->name}}</h3>
                            </div>
                            <dl class="my-2 flex-grow flex flex-col justify-between">
                                <dt class="sr-only">Student Details</dt>
                                <dd class="text-gray-500 text-sm">Start Date:
                                    <span class="text-black">
                                {{$student->start_date->format('d-M-Y')}}
                                </span>
                                </dd>
                                <dd class="text-gray-500 text-sm">End Date:
                                    <span class="text-black">
                                {{$student->end_date->format('d-M-Y')}}
                                </span>
                                </dd>
                            </dl>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif
</x-filament-panels::page>

