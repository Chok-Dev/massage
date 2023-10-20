<?php

namespace App\Http\Controllers;

use App\Models\Massage;
use Illuminate\Http\Request;

class MassageController extends Controller
{
    public function Massage(){
        $title = 'Are you sure you want to delete this massage?!';
        $text = "";
        confirmDelete($title, $text);
        $e =  Massage::all()->sortByDesc('id');

        return view('admin.massage')->with('data', $e);
    }
    public function Addmassage(Request $request){
        $ae = new Massage();
        $ae->massage_name = $request->name;
        $ae->massage_price = $request->price;
        if ($ae->save()) {
            alert()->success('Success', 'Add Massage Success.');
        } else {
            alert()->error('Error', 'Add Massage Error.');
        }
        return redirect()->route('massage');
    }
    public function Upmassage(Request $request){
        $ae = Massage::find($request->id);
        $ae->massage_name = $request->name1;
        $ae->massage_price = $request->price1;
        if ($ae->save()) {
            alert()->success('Success', 'Update Massage Success.');
        } else {
            alert()->error('Error', 'Update Massage Error.');
        }
        return redirect()->route('massage');
    }

    public function Delmassage(Massage $mas){
        if ($mas->delete()) {
            alert()->success('Success', 'Delete Massage Success.');
        } else {
            alert()->error('Error', 'Delete Massage Error.');
        }
        return redirect()->route('massage');
    }
}
