<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Queue;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = DB::table('queues')
        ->select('employees.emp_color as color','employees.id as emp_id','employees.emp_name',
        'customers.cus_tel','customers.id as cus_id','customers.cus_name',
        'massages.massage_price','massages.massage_name','massages.id as mass_id',
        'queues.id','queues.content','queues.start_time','queues.finish_time')
        ->leftjoin('massages', 'queues.massage_id', '=', 'massages.id')
        ->leftjoin('customers', 'queues.customer_id', '=', 'customers.id')
        ->leftjoin('employees', 'queues.employee_id', '=', 'employees.id')
        ->get();
       // echo $appointments;

        $events = [];
        //$appointments = Queue::with(['employee'])->get();
        foreach ($appointments as $d) {
            $events[] = [
                'title' => "Customer: $d->cus_name | Employee: $d->emp_name | Massage: $d->massage_name $$d->massage_price",
                'description' =>
                '<div class="badge bg-primary fs-5 mb-2">Customer</div>' .'<div class="badge text-dark fs-5">'.  $d->cus_name ." ($d->cus_id)".'</div>' .
                '<br><div class="badge bg-info fs-5 mb-2">Phone</div>' .'<div class="badge text-dark fs-5">'.  $d->cus_tel .'</div>' .
                '<br><div class="badge bg-success fs-5 mb-2">Employee</div>' .'<div class="badge text-dark fs-5">'.  $d->emp_name .'</div>' .
                '<br><div class="badge bg-danger fs-5 mb-2">Massage</div>' .'<div class="badge text-dark fs-5">'."$d->massage_name $$d->massage_price".'</div>' .
                '<br><div class="badge bg-warning fs-5 mb-2">Details</div>' .'<div class="badge text-dark fs-5">'.  $d->content .'</div>' ,
                'customer' => $d->cus_name,
                'cus_tel' => $d->cus_tel,
                'cus_id' => $d->cus_id,
                'details' => $d->content,
                'employee' => $d->emp_id,
                'massage_id' => $d->mass_id,
                'massage' => $d->massage_name,
                'price' => $d->massage_price,
                's' => Carbon::parse($d->start_time)->format('H:i'),
                'e' => Carbon::parse($d->finish_time)->format('H:i'),
                'start' => $d->start_time,
                'end' => $d->finish_time,
                'id' => $d->id,
                'classNames' => ['text-dark', 'fw-bold'],
                'backgroundColor'=> $d->color
            ];
        }
        //dd($appointments);
        $title = 'Are you sure you want to delete this Event?!';
        $text = "";
        confirmDelete($title, $text);
        return view('admin.reserve', compact('events'));

    }
    public function delevent(Queue $del)
    {
       // dd($del);
        if ($del->delete()) {
            alert()->success('Success', 'Delete Event Success.');
        } else {
            alert()->error('Error', 'Delete Event Error.');
        }
        return redirect()->route('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $q = new Queue();
        $q->start_time = date("Y/m/d H:i:s", strtotime(date_format(date_create($request->start), "Y/m/d") . " " . $request->time_start));
        $q->finish_time = date("Y/m/d H:i:s", strtotime(date_format(date_create($request->end), "Y/m/d") . " " . $request->time_end));
        $q->content = $request->details;
        $q->customer_id = $request->customer;
        $q->massage_id = $request->massage;
        $q->employee_id = $request->employee;
        $q->save();
        return redirect()->route('index');
        //return date("Y/m/d H:i:s", strtotime(date_format(date_create($request->end),"Y/m/d")." ".$request->time_start));
        //return date_format(date_create($request->end),"Y/m/d");
    }
    public function upandin(Request $request)
    {
        $q = Queue::find($request->id);
        $q->customer_id = $request->customer;
        $q->content = $request->details;
        $q->massage_id = $request->massage;
        //$q->start_time = date("Y/m/d H:i:s", strtotime($request->time_start));
       // $q->finish_time = date("Y/m/d H:i:s", strtotime($request->time_end));
        $q->employee_id = $request->employee;
        $q->save();
        return redirect()->route('index');
        //return date("Y/m/d H:i:s", strtotime(date_format(date_create($request->end),"Y/m/d")." ".$request->time_start));
        //return date_format(date_create($request->end),"Y/m/d");
    }
    public function Dropup(Request $request){
        $q = Queue::find($request->id);
        $q->start_time = date("Y-m-d H:i:s", strtotime($request->start));
        $q->finish_time = date("Y-m-d H:i:s", strtotime($request->end));
        $q->save();
        return "200";
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
