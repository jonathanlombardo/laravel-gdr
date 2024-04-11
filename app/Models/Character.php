<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
  use HasFactory;

  protected $fillable = [
    "name",
    "type_id",
    "description",
    "strength",
    "defence",
    "speed",
    "life",
    "intelligence",
  ];


  public function items()
  {
    return $this->belongsToMany(Item::class);
  }
  public function get_description($n_chars = 75)
  {
    return ($n_chars < strlen($this->description)) ? substr($this->description, 0, $n_chars) . '...' : $this->description;
  }

  public function type()
  {
    return $this->belongsTo(Type::class);
  }
}
