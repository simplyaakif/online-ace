<?php

    namespace App\Http\Controllers;

    use App\Models\Account;
    use App\Models\Invoice;

    class InvoicesController extends Controller {

        public function index()
        {

        }

        public function show(Invoice $invoice)
        {
            $accounts = Account::where('type','<>',2)->get();
            return view('admin.invoice.show',compact('invoice','accounts'));
        }
    }
