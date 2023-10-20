<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(){
        $h = DB::table('queues')
        ->select('employees.emp_name',
        'customers.cus_tel','customers.id as cus_id','customers.cus_name',
        'massages.massage_price','massages.massage_name',
        'queues.id','queues.content','queues.start_time','queues.finish_time','queues.created_at')
        ->leftjoin('massages', 'queues.massage_id', '=', 'massages.id')
        ->leftjoin('customers', 'queues.customer_id', '=', 'customers.id')
        ->leftjoin('employees', 'queues.employee_id', '=', 'employees.id')
        ->get();

        return view('admin.history')->with('data', $h);
    }
}
