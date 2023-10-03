<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrenchController extends Controller
{
    public function index(){
    	$data = DB::table('Brenchs')->get();
    	return view('data', ['brenchs' => $data]);
    }

    public function add(){
    	return view('insert');
    }

    public function insert(Request $request){
    	$photo = $request->file('photo')->store('public/photos');
    	DB::table('Brenchs')->insert([
    		'register' => random_int(100000, 999999),
    		'name' => $request->name,
    		'photo' => str_replace('public', '', $photo),
    	]);

    	return redirect('brench');
    }

    public function edit($id){
    	$brench = DB::table('Brenchs')->where('id', $id)->get();

    	return view('edit', ['brenchs' => $brench]);
    }

    public function update(Request $request){
    	$photo = $request->file('photo')->store('public/photos');
    	DB::table('Brenchs')->where('id', $request->id)->update([
    		'register' => random_int(100000, 999999),
    		'name' => $request->name,
    		'photo' => str_replace('public', '', $photo),
    	]);

    	return redirect('brench');
    }

    public function delete($id){
    	DB::table('Brenchs')->where('id', $id)->delete();

    	return redirect('brench');
    }
}
