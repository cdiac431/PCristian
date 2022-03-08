<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\File;
 
 
class MultiFileUploadController extends Controller
{
    public function index()
    {
        return view('multiple-files-upload');
    }
 
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
        'files' => 'required',
        'files.*' => 'mimes:csv,txt,xlx,xls,pdf'
        ]);
 
 
        if($request->hasfile('files'))
         {
            foreach($request->file('files') as $key => $file)
            {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();
 
                $insert[$key]['name'] = $name;
                $insert[$key]['path'] = $path;
 
            }
         }
 
        File::insert($insert);
 
        return redirect('files-upload')->with('status', 'Arxius penjats correctament');
 
    }
}