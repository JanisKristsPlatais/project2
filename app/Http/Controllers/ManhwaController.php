<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManhwaRequest;
use App\Models\Manhwa;
use App\Models\Author;
use App\Models\Tag;

use Illuminate\Http\Request;





class ManhwaController extends Controller
{
	private function saveManhwaData(Manhwa $manhwa, ManhwaRequest $request){
		$validatedData = $request->validated();
		
		$manhwa->fill($validatedData);
		$manhwa->display = (bool) ($validatedData['display'] ?? false);
		
		if ($request->hasFile('image')) {
			$uploadedFile = $request->file('image');
			$extension = $uploadedFile->clientExtension();
			$name = uniqid();
			$manhwa->image = $uploadedFile->storePubliclyAs('/', $name . '.' . $extension, 'uploads' );
		}
		$manhwa->save();
	}
	
	public function __construct(){
		$this->middleware('auth');
	}



	
	
	public function create(){
		$authors = Author::orderBy('name', 'asc')->get();
		$tags = Tag::orderBy('name', 'asc')->get();
		return view(
			'manhwa.form',[
				'title' => 'Add manhwa',
				'manhwa' => new Manhwa(),
				'authors' => $authors,
				'tags' => $tags,
			]
		);
	}
	
	
	public function put(ManhwaRequest $request){
		$manhwa = new Manhwa();
		$this->saveManhwaData($manhwa, $request);

		$manhwa->tags()->sync($request->input('tags',[]));
		return redirect('/manhwas');
	}
	
	
	public function update(Manhwa $manhwa){
		$authors = Author::orderBy('name', 'asc')->get();
		$tags = Tag::orderBy('name', 'asc')->get();
		return view(
			'manhwa.form',[
				'title' => 'Edit manhwa',
				'manhwa' => $manhwa,
				'authors' => $authors,
				'tags' => $tags,
			]
		);
	}
	
	
	public function patch(Manhwa $manhwa, ManhwaRequest $request){
		$this->saveManhwaData($manhwa, $request);
		$manhwa->tags()->sync($request->input('tags',[]));		
		return redirect('/manhwas/update/' . $manhwa->id);
	}
	
	
	public function delete(Manhwa $manhwa){
		$manhwa->delete();
		return redirect('/manhwas');
	}
	
	public function list()
	{
		$items = Manhwa::orderBy('name', 'asc')->get();
		
		return view(
			'manhwa.list',[
				'title' => 'Manhwas',
				'items' => $items
			]
		);
	}
}
