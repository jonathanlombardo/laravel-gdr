<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function characters(){
        return $this->hasMany(Characters::class);
    }

    public function get_description($n_chars = 75)
    {
      return ($n_chars < strlen($this->description)) ? substr($this->description, 0, $n_chars) . '...' : $this->description;
    }
}
