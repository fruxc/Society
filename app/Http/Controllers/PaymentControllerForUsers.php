<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentControllerForUsers extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

   public function __construct()
   {
       $this->middleware('auth:web');
   }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
      return view('payment.create');
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
              'chequeno' => ['required', 'string', 'max:255'],
              'chequeno' => ['required', 'string', 'max:255'],
              'chequedate' => ['required', 'string', 'max:255'],
              'cpto' => ['required', 'string', 'max:255'],
              'paidvia' => ['required', 'string', 'max:255'],
              'paidby' => ['required', 'string', 'max:255'],
              'branch' => ['required', 'string', 'max:255'],
              'deposit' => ['required', 'string', 'max:255'],
              'cashdate' => ['required', 'string', 'max:255'],
          ]);
          complaint::create($request->all());
          return redirect()->route('payment.index')
                          ->with('Success','New Payment Successfully Created');

      }
}
