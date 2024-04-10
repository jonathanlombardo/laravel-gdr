<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
  use HasFactory;

  protected $fillable = [
    "name",
    "description",
    "attack",
    "defence",
    "speed",
    "life",
  ];

  public function get_description($n_chars = 75){
    return ($n_chars < strlen($this->description)) ? substr($this->description, 0, $n_chars ). '...' : $this->description; 
  }

  public function type(){
    return $this->belongsTo(Type::class);
  }
}
