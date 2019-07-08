<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('maintenance')
         ->limit(10)
         ->get();
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <h3 align="center">Maintenance</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
      <th style="border: 1px solid; padding:12px;" width="15%">ID</th>
      <th style="border: 1px solid; padding:12px;" width="20%">Expenses</th>
      <th style="border: 1px solid; padding:12px;" width="30%">Amount</th>
    </tr>
     ';
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->expenses.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->amount.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
