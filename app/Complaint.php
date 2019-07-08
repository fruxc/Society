<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{

  protected $table = "complaint";

  protected $fillable = [
      'Description', 'Actions', 'complaintby', 'response',
  ];
}
