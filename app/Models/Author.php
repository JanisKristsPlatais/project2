<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	public function manhwas(){
		return $this->hasMany(Manhwa::class);
	}
	
    use HasFactory;
	
}


