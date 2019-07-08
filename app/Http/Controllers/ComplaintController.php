<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;

class ComplaintController extends Controller
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
      $complaint = Complaint::latest()->paginate(10);
      return view('complaint.index', compact('complaint'))
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
              'Actions' => ['', 'string', 'max:255'],
              'complaintby' => ['','string','max:255'],
              'response' => ['','string','max:255'],
          ]);
          Complaint::create($request->all());
          return redirect()->route('complaint.index')
                          ->with('Success','New Complaint Successfully Registered');

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
          $complaint = Complaint::find($id);
          return view('complaint.detail', compact('complaint'));
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
          $complaint = Complaint::find($id);
          return view('complaint.update', compact('complaint'));
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
              'Description' => ['required', 'string', 'max:255'],
              'Actions' => ['required', 'string', 'max:255'],
              'complaintby' => ['nullable','string','max:255'],
              'response' => ['required','string','max:255'],
          ]);
          $complaint = Complaint::find($id);
          $complaint->Description = $request->get('Description');
          $complaint->Actions = $request->get('Actions');
          $complaint->complaintby = $request->get('complaintby');
          $complaint->response = $request->get('response');
          $complaint->save();
          return redirect()->route('complaint.index')
                          ->with('Success', 'complaint Successfully Updated!!!');
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
          $complaint = Complaint::find($id);
          $complaint->delete();
          return redirect()->route('complaint.index')
                          ->with('Success','Complaint Successfully Deleted!');
      }
  }
