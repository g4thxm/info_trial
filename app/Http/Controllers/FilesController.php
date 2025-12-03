<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use App\Models\Dojo;
use Laravel\Pail\File;

class FilesController extends Controller
{
    public function index()
    {
        //route --> /Info/
        $Files = Files::with('dojo')->orderBy('created_at', 'desc')->paginate(10);
        return view ('Info.index', ["Files" => $Files]);
    }


    public function show($id)
    {
        //route --> /Info/{id}
        $file = Files::with('dojo')->findOrFail($id);
        return view ('Info.show', ["files" => $file]);
    }

    public function create()
    {
        //route --> /Info/create

        $dojos = Dojo::all();
        return view ('Info.create', ["dojos" => $dojos]);
    }

    public function store(Request $request)
    {
        //to store data
        $validated = $request->validate([
            'filename' => 'required|string|max:255|min:5',
            'size' => 'required|integer',
            'type' => 'required|string|max:255|',
            'dojo_id' => 'required|exists:dojos,id',
        ]);
        Files::create($validated);
        return redirect()->route('Files.index')->with('success', 'File created successfully.'); 
    }

    public function destroy(files $file)
    {
        //route --> /Info/{id} to delete
        // $file = Files::findOrFail($id);
        $file->delete();
        return redirect()->route('Files.index')->with('success', 'File deleted successfully.');
    }
}
