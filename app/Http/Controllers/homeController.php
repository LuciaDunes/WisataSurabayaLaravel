<?php

namespace App\Http\Controllers;

use App\Models\destination;
use App\Models\event;
use App\Models\eventbaru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function home(){
        $home = Auth::user();
        return view('home', compact('home'));
    }

    // public function destinasi() {
    //     $destinasi = destination::paginate(2);
    //     return view('destinasi', compact('destinasi'));
    // }

    public function admin(){
        return view('admin.home');
    }
    public function contri(){
        return view('contri.home');
    }

    public function destinasi(){
        $destinasi = destination::paginate(6);
        return view('destinasi',compact('destinasi'));
    }

    public function event(){
        $event = event::paginate(6);
        return view('event', compact('event'));
    }

    public function detail($id){
        $destinasi = destination::findOrFail($id);
        return view('detaildestinasi', compact('destinasi'));
    }

    public function detailEvent($id){
        $event = event::findOrFail($id);
        return view('detailevent', compact('event'));
    }

    public function filter(Request $request){
        // if ($request ->has('search')) {
        //     $destinasi =  destination::where('dest_name', 'LIKE', '%' . $request->search . '%')
        //     ->orWhere('dest_category', 'LIKE', '%' . $request->search . '%')
        //     ->orWhere('dest_location', 'LIKE', '%' . $request->search . '%')
        //     ->paginate(6);
        // }
         if($request ->has('selectcategory')){
            $destinasi = destination::where('dest_category', 'LIKE', '%' . $request->selectcategory . '%')
            ->paginate(6);
        } else {
            $destinasi = destination::all();
        }
        return view('destinasi', compact('destinasi'));
    }

    public function filterEvent(Request $request){
         if ($request ->has('search')) {
            $event =  event::where('event_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_desc', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_location', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_cover', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_mulai', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_akhir', 'LIKE', '%' . $request->search . '%')
            ->paginate(6);
        }
        else {
            $event = event::all();
        }
        return view('event', compact('event'));
    }
}
