<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Manhwa extends Model{	
	use HasFactory;

	protected $fillable = ['name', 'author_id', 'description', 'price', 'year'];
	
	public function author(){
		return $this->belongsTo(Author::class);
	}
	
	public function tags(){
		return $this->belongsToMany(Tag::class);
	}
	
	public function jsonSerialize(): mixed{
		$tagsArray = $this->tags->map(function ($tag) {
			return [
				'id' => $tag->id,
				'name' => $tag->name,
			];
		})->toArray();

		return [
			'id' => intval($this->id),
			'name' => $this->name,
			'description' => $this->description,
			'author' => $this->author->name,
			'tags' => $tagsArray,
			'price' => number_format($this->price, 2),
			'year' => intval($this->year),
			'image' => asset('images/' . $this->image),
		];
	}

}


