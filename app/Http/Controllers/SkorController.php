<?php

namespace App\Http\Controllers;

use App\Models\Skor;
use App\Models\Klasement;
use Illuminate\Http\Request;

class SkorController extends Controller
{

    public function index()
    {
        $skors = Skor::get();

        return view('skors.skor', [
                
            'skors' => $skors
        ]); 
    }

    
    public function create()
    {
        {
            return view('skors.input_score'); 
        }
    }

    
    public function store(Request $request)
    {
        $request->validate(
            [
            'inputs.*.klub_name' => 'required',
            'inputs.*.skor'  => 'required',
            'inputs.*.status'  => 'required',
            'inputs.*.klub_name_2'  => 'required',
            'inputs.*.skor_2'  => 'required',
            'inputs.*.status_2'  => 'required'
            ],
            [
            'inputs.*.klub_name' => 'The Klub Name field is required',
            'inputs.*.skor' => 'The Skor field is required',
            'inputs.*.status' => 'The Status field is required',
            'inputs.*.klub_name_2' => 'The Klub Name 2 field is required',
            'inputs.*.skor_2' => 'The Skor 2 field is required',
            'inputs.*.status_2' => 'The Status 2 field is required'
            ]
        ); 

        foreach ($request->inputs as $key => $value) {

            Skor::create($value);          
        }   
            $request->session()->flash('success', 'insert klub success');

            return redirect('/skor');
      
    }

    
    public function show(Skor $skor)
    {
        //
    }

   
    public function edit(Request $request, $id)
    {
        $skor = Skor::find($id);  

        return view('skors.update_score', [
            
            'skor' => $skor,

        ]); 
    }

    
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'klub_name' => 'required|min:3',
            'skor'  => 'required',
            'status'  => 'required',
            'klub_name_2'  => 'required|min:3',
            'skor_2'  => 'required',
            'status_2'  => 'required'
        ]); 

        Skor::where('id',$id)->update($validateData);
        
        $request->session()->flash('success', 'update skor success');

        return redirect('/skor');
    }

   
    public function destroy(Request $request, $id)
    {
        $skor = Skor::findOrFail($id);

        $skor->delete();

        $request->session()->flash('success', 'delete pertandingan success');

        return redirect()->back();
    }
}
