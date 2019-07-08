<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maintenance;

class MaintenanceController extends Controller
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
      $maintenance = Maintenance::latest()->paginate(10);
      return view('maintenance.index', compact('maintenance'))
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
      return view('maintenance.create');
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
              'expenses' => ['required', 'string', 'max:255'],
              'amount' => ['required', 'string', 'max:255'],
          ]);
          Maintenance::create($request->all());
          return redirect()->route('maintenance.index')
                          ->with('Success','New Maintenance Successfully Created');

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
          $maintenance = Maintenance::find($id);
          return view('maintenance.detail', compact('maintenance'));
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
          $maintenance = Maintenance::find($id);
          return view('maintenance.update', compact('maintenance'));
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
              'expenses' => ['required', 'string', 'max:255'],
              'amount' => ['required', 'string', 'max:255'],
          ]);
          $maintenance = Maintenance::find($id);
          $maintenance->expenses = $request->get('expenses');
          $maintenance->amount = $request->get('amount');
          $maintenance->save();
          return redirect()->route('maintenance.index')
                          ->with('Success', 'Maintenance Successfully Updated!!!');
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
          $maintenance = Maintenance::find($id);
          $maintenance->delete();
          return redirect()->route('maintenance.index')
                          ->with('Success','Maintenance Successfully Deleted!');
      }
  }
