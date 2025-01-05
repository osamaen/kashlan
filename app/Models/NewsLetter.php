<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends AppModel
{

    protected $fillable  =['email','created_by','updated_by','deleted_by'];
}
