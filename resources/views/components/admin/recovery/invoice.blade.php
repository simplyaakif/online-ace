@props([
    'invoice'=>'',
    'accounts'=>[],
])
<div class="flex  max-w-4xl mx-auto bg-white">
    <div class="w-3/4 px-8 pt-8">
        <h2 class="text-xl  font-bold ">Invoice #: {{$invoice->invoice_id}}</h2>

        <div class="flex justify-between mt-4">
            <div>
                <h4>Total To be Paid</h4>
                <h3 class="text-xl font-bold text-brand-b">{{$invoice->amount}} Rs</h3>
            </div>
            <div class="text-right">
                <h4>Status</h4>
                <h3 class="text-xl font-bold text-brand-r">Unpaid</h3>
            </div>
        </div>
        <div class="flex justify-between ">
            <div class="text-left">
                <h4>Date of Bill</h4>
                <h3 class="text-xl font-bold text-brand-b">{{carbon($invoice->created_at)->format('d-M-Y')}}</h3>
            </div>
            <div class="text-right">
                <h4>Due Date</h4>
                <h3 class="text-xl font-bold text-brand-r">{{carbon($invoice->due_date)->format('d-M-Y')}}</h3>
            </div>
        </div>

        <div class="mt-4 text-center">
            <h4>Invoice To</h4>
            <h3 class="text-3xl font-bold text-brand-b">{{$invoice->name}}</h3>
        </div>

        <div class="my-4 text-gray-700">
            <table class="w-full">
                <thead>
                <tr>
                    <th class="border border-gray-200 p-2 text-left">Course Name</th>
                    <th class="border border-gray-200 p-2 text-left">Course Duration</th>
                    <th class="border border-gray-200 p-2 text-right">Course Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border border-gray-200 p-2">{{$invoice->course->title}}</td>
                    <td class="border border-gray-200 p-2">{{$invoice->course->duration}}</td>
                    <td class="border border-gray-200 p-2 text-right">{{$invoice->course->price}} Rs</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div>
            <table class="w-full text-gray-700">
                <thead>
                <tr>
                    <th class="border border-gray-200 p-2 text-left">Batch Name</th>
                    <th class="border border-gray-200 p-2 text-left">Class Days</th>
                    <th class="border border-gray-200 p-2 text-right">Time</th>
                </tr>
                </thead>
                <tbody>
                @forelse($invoice->batch->batch_schedule as $schedule)
                    <tr>
                        <td class="border border-gray-200 p-2">{{$invoice->batch->title}}</td>
                        <td class="border border-gray-200 p-2 capitalize">{{$schedule['day']}}</td>
                        <td class="border border-gray-200 p-2 text-right">{{carbon($schedule['time'])->format('h:i A')
                        }}</td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>


        <div class="mt-8 ">
            <h3 class="font-bold text-xl text-brand-b">Terms & Conditions</h3>
            <div class="prose">
            <ul >
                <li>Fee is Non refundable & Non transferrable after 24 Hours.</li>
                <li>70% Attendance is mandatory for Final Examination.</li>
                <li>Students who will appear in Exam will only be awarded Certification</li>
            </ul>
            </div>
        </div>

    </div>
    <div class="w-1/4  mt-8">
        <img class="w-32 ml-auto mr-0 h-auto" src="{{asset('img/ace-long-logo.jpg')}}" alt="">
    </div>
</div>
<div class="max-w-4xl mx-auto bg-white px-8">
    <h2 class="text-xl text-brand-r font-bold mt-4 mb-4">
    Payment Options
    </h2>
    <div class="grid grid-cols-2 gap-2">
        @foreach($accounts as $account)
            <div class="p-4 bg-blue-50 rounded ">
                <ul >
                    <li>Bank: {{$account->bank}}</li>
                    <li>Title: {{$account->title}}</li>
                    <li>Account #: {{$account->account_number}}</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>
