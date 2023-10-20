<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CustomerController extends Controller
{
    public function Customer(){
        $title = 'Are you sure you want to delete this Customer?!';
        $text = "";
        confirmDelete($title, $text);
        $e =  Customer::all();

        return view('admin.customer')->with('data', $e);
    }
    public function Addcustomer(Request $request){
        $ae = new Customer();
        $ae->id = IdGenerator::generate(['table' => 'customers', 'length' => 8, 'prefix' => 'MS']);
        $ae->cus_name = $request->name;
        $ae->cus_tel = $request->tel;
        if ($ae->save()) {
            alert()->success('Success', 'Add Member Success.');
        } else {
            alert()->error('Error', 'Add Member Error.');
        }
        return redirect()->route('customer');
    }
    public function Upcustomer(Request $request){
        $ae = Customer::find($request->id);
        $ae->cus_name = $request->name1;
        $ae->cus_tel = $request->tel1;
        if ($ae->save()) {
            alert()->success('Success', 'Update Member Success.');
        } else {
            alert()->error('Error', 'Update Member Error.');
        }
        return redirect()->route('customer');
    }
    public function Delcustomer(Customer $cus){
        if ($cus->delete()) {
            alert()->success('Success', 'Delete Member Success.');
        } else {
            alert()->error('Error', 'Delete Member Error.');
        }
        return redirect()->route('customer');
    }
}
