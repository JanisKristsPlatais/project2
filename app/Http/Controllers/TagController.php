<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	
    // display all tags
	public function list(){
		$items = Tag::orderBy('name', 'asc')->get();
		return view(
			'tag.list',[
				'title' => 'Tags',
				'items' => $items
			]
		);
	}
	
	
	public function create(){
		return view(
			'tag.form',[
				'title' => 'Add new tag',
				'tag' => new Tag()

			]
		);
	}
	
	
	public function put(Request $request){
		$validatedData = $request->validate([
			'name' => 'required',
		]);
		
		$tag = new Tag();
		$tag->name = $validatedData['name'];
		$tag->save();
		
		return redirect('/tags');
	}
	
	
	public function update(Tag $tag){
		return view(
			'tag.form',[
				'title' => 'Edit tag',
				'tag' => $tag
			]
		);
	}


	public function patch(Tag $tag, Request $request){
		$validatedData = $request->validate([
			'name' => 'required',
		]);
		
		$tag->name = $validatedData['name'];
		$tag->save();
		
		return redirect('/tags');
	}
	
	
	public function delete(Tag $tag){
		$tag->delete();
		return redirect('/tags');
	}

}
