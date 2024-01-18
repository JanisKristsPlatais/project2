<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manhwa;
use Illuminate\Http\Request;

class ManhwaController extends Controller
{
    public function up(){
		Schema::create('manhwa', function (Blueprint $table) {
			$table->id();
			
			$table->foreignId('author_id');
			$table->string('name', 256);
			$table->text('description')->nullable();
			$table->decimal('price', 8, 2)->nullable();
			$table->integer('year');
			$table->string('image', 256)->nullable();
			$table->boolean('display');
			
			$table->timestamps();
		});
	}
	

	public function list(){
		$items = Manhwa:orderBy('name', 'asc')->get();
		return view(
			'manhwa.list',[
				'title' => 'Manhwa',
				'items' => $items
			]
		);
	}
	
	
	public function create(){
		$authors = Author::orderBy('name', 'asc')->get();
		return view(
			'manhwa.form',[
				'title' => 'Add manhwa',
				'manhwa' => new Manhwa(),
				'authors' => $authors,
			]
		);
	}
	
	
	public function put(Request $request){
		$validatedData = $request->validate([
			'name' => 'required|min:3|max:256',
			'author_id' => 'required',
			'description' => 'nullable',
			'price' => 'nullable|numeric',
			'year' => 'numeric',
			'image' => 'nullable|image',
			'display' => 'nullable'
		]);
 
		$manhwa = new Manhwa();
		$manhwa->name = $validatedData['name'];
		$manhwa->author_id = $validatedData['author_id'];
		$manhwa->description = $validatedData['description'];
		$manhwa->price = $validatedData['price'];
		$manhwa->year = $validatedData['year'];
		$manhwa->display = (bool) ($validatedData['display'] ?? false);
		if ($request->hasFile('image')) {
			$uploadedFile = $request->file('image');
			$extension = $uploadedFile->clientExtension();
			$name = uniqid();
			$manhwa->image = $uploadedFile->storePubliclyAs('/', $name . '.' . $extension, 'uploads' );
		}
		$manhwa->save();
		
		return redirect('/manhwa');
	}
	
	
	public function update(Manhwa $manhwa){
		$authors = Author::orderBy('name', 'asc')->get();
		return view(
			'manhwa.form',[
				'title' => 'Edit manhwa',
				'manhwa' => $manhwa,
				'authors' => $authors,
			]
		);
	}
	
	
	public function put(Manhwa $manhwa, Request $request){
		$validatedData = $request->validate([
			'name' => 'required|min:3|max:256',
			'author_id' => 'required',
			'description' => 'nullable',
			'price' => 'nullable|numeric',
			'year' => 'numeric',
			'image' => 'nullable|image',
			'display' => 'nullable'
		]);
 
		$manhwa->name = $validatedData['name'];
		$manhwa->author_id = $validatedData['author_id'];
		$manhwa->description = $validatedData['description'];
		$manhwa->price = $validatedData['price'];
		$manhwa->year = $validatedData['year'];
		$manhwa->display = (bool) ($validatedData['display'] ?? false);
		if ($request->hasFile('image')) {
			$uploadedFile = $request->file('image');
			$extension = $uploadedFile->clientExtension();
			$name = uniqid();
			$manhwa->image = $uploadedFile->storePubliclyAs('/', $name . '.' . $extension, 'uploads' );
		}
		$manhwa->save();
		
		return redirect('/manhwa/update/' . $manhwa->id);
	}
	
	
	public function delete(Manhwa $manhwa){
		$manhwa->delete();
		return redirect('/manhwa');
	}
}
