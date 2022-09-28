@props([
    'course'=>''
])
<div class="bg-white rounded-lg border border-slate-200">
    <div class=" w-full overflow-hidden  bg-slate-100 rounded-t ">
    <img class="w-full h-36 object-cover" src="https://loremflickr.com/400/400" />
{{--                        <span class="text-gray-50">--}}
{{--                    {{$course->title}}--}}
{{--                        </span>--}}
    </div>
    <div class="p-4 text-2xl font-bold text-slate-800 capitalize">
        {{$course->title}}
    </div>
    <div class="p-4">
        <ul class="grid grid-cols-2 text-sm">
            <li>3 times per week</li>
            <li>24 Classes</li>
            <li>Beginners</li>
        </ul>
    </div>

    <div class="border-b border-slate-200"></div>
    <div class="px-4 py-2  flex justify-between">
        <div>
        3/8 Enrolled
        </div>
        <div>
            24000Rs</div>
    </div>

    <div class="w-full p-4 pt-0 pb-4">
        <a href="" class="w-full block text-center bg-slate-200 rounded-lg py-2 hover:bg-brand-r hover:text-white">Learn
            More</a>
    </div>
</div>

