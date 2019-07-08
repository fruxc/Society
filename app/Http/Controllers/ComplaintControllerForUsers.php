<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;

class ComplaintControllerForUsers extends Controller
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
              // 'complaintby' => ['','string','max:255'],
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
  }
