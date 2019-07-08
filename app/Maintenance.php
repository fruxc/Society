<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{

  protected $table = "maintenance";

  protected $fillable = [
      'expenses','amount'
  ];
}
