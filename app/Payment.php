<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

  protected $table = "payment";

  protected $fillable = [
      'chequeno', 'deposit', 'cashdate', 'cpto', 'paidby', 'chequeno', 'chequedate', 'branch',
  ];
}
