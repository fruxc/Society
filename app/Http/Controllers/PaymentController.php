<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

   public function __construct()
   {
       $this->middleware('auth:admin');
   }

  public function index()
  {
      //
      $payment = Payment::latest()->paginate(10);
      return view('payment.index', compact('payment'))
      ->with('i',(request()->input('page',1)-1)*10);
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
          'deposit' => ['required', 'string', 'max:255'],
          'chequedate' => ['required', 'string', 'max:255'],
          'cashdate' => ['required', 'string', 'max:255'],
          'cpto' => ['required', 'string', 'max:255'],
          'branch' => ['required', 'string', 'max:255'],
          'paidvia' => ['required', 'string', 'max:255'],
              'paidby' => ['required', 'string', 'max:255'],
          ]);
          complaint::create($request->all());
          return redirect()->route('payment.index')
                          ->with('Success','New Payment Successfully Created');

      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
          //
          $payment = Payment::find($id);
          return view('payment.detail', compact('payment'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          //
          $payment = Payment::find($id);
          return view('Payment.update', compact('Payment'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
          //
          $request->validate([
              'chequeno' => ['required', 'string', 'max:255'],
              'chequedate' => ['required', 'string', 'max:255'],
              'cpto' => ['required', 'string', 'max:255'],
              'paidvia' => ['required', 'string', 'max:255'],
              'paidby' => ['required', 'string', 'max:255'],
              'branch' => ['required', 'string', 'max:255'],
              'deposit' => ['required', 'string', 'max:255'],
              'cashdate' => ['required', 'string', 'max:255'],
          ]);
          $payment = Payment::find($id);
          $payment->chequeno = $request->get('chequeno');
          $payment->chequedate = $request->get('chequedate');
          $payment->cpto = $request->get('cpto');
          $payment->paidvia = $request->get('paidvia');
          $payment->paidby = $request->get('paidby');
          $payment->branch = $request->get('branch');
          $payment->desposit = $request->get('desposit');
          $payment->cashdate = $request->get('cashdate');
          $payment->save();
          return redirect()->route('Payment.index')
                          ->with('Success', 'Payment Successfully Updated!!!');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          //
          $payment = Payment::find($id);
          $payment->delete();
          return redirect()->route('payment.index')
                          ->with('Success','Payment Successfully Deleted!');
      }
  }
