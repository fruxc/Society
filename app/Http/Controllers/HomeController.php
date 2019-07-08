<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complaint;
use App\Maintenance;
use App\Payment;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        //
        $users= User::latest()->paginate(5);
        return view('staff', compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function showMain()
    {
        //
        $maintenance = Maintenance::latest()->paginate(10);
        return view('maintenance', compact('maintenance'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function showComp()
    {
        //
        $complaint = Complaint::latest()->paginate(10);
        return view('complaint', compact('complaint'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function showPayment()
    {
        //
        $payment = Payment::latest()->paginate(10);
        return view('payment', compact('payment'))
        ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        //
        return view('complaint.create');
    }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function store(Request $request)
    {
          //
        $request->validate([
            'Description' => ['required', 'string', 'max:255'],
        ]);
        Complaint::create($request->all());
        return redirect()->route('complaint.index')
                          ->with('Success','New Complaint Successfully Registered');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
