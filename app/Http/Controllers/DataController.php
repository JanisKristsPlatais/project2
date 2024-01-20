<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manhwa;
use Illuminate\Http\Request;


class DataController extends Controller
{
    // Returns 3 published Manhwa objects in random order
	public function getTopManhwas(){
		$manhwas = Manhwa::where('display', true) 
			->inRandomOrder()
			->take(3)
			->get();
		return $manhwas;
	}
		
	// Returns the selected Manhwa object, if it’s published
	public function getManhwa(Manhwa $manhwa){
		$selectedManhwa = manhwa::where([
			'id' => $manhwa->id,
			'display' => true,
		])
			->firstOrFail();
		return $selectedManhwa;
	}
	
	// Returns 3 published Manhwa objects in random order- except the selected one
	public function getRelatedManhwas(Manhwa $manhwa){
		$manhwas = Manhwa::where('display', true)
			->where('id', '<>', $manhwa->id)
			->inRandomOrder()
			->take(3)
			->get();
		return $manhwas;
	}
}
