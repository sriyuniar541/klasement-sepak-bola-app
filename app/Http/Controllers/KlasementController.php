<?php

namespace App\Http\Controllers;

use App\Models\Klasement;
use Illuminate\Http\Request;

class KlasementController extends Controller
{
    //get page klasement
    public function index()
    {
        $klasements = Klasement::get();

        return view('klasements.klasement', [
                
            'klasements' => $klasements
        ]); 
    }

    //get halaman create
    public function create()
    {
        return view('klasements.create'); 
    }

    
    // post klub
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'klub_name' => 'required|max:255|min:3|unique:klasements',
            'klub_city' => 'required|max:255'
        ]);


        Klasement::create($validateData);
        
        $request->session()->flash('success', 'insert klub success');
    
        return redirect('/klasement');
        
    }

    
    public function show(Klasement $klasement)
    {
        //
    }


    //get halaman edit
    public function edit($id)
    {
        $klasements = Klasement::findOrFail($id);

        return view('klasements.edit', [
                
            'klasements' => $klasements
        ]); 
    }

   //edit klub
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'klub_name' => 'required|max:255|min:3',
            'klub_city' => 'required|max:255'
        ]);


        Klasement::where('id',$id)->update($validateData);
        
        $request->session()->flash('success', 'update klub success');

        return redirect('/klasement');
    }

   //delete klub
    public function destroy(Request $request, $id)
    {
        $klasements = Klasement::findOrFail($id);

        $klasements->delete();

        $request->session()->flash('success', 'delete klub success');

        return redirect()->back();
    }
}
