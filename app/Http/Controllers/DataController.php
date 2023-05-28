<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Exports\ExportData;
use App\Imports\ImportData;
use App\Models\Data;

class DataController extends Controller
{
    public function index()
    {
        return view('data.index');
    }
    public function home()
{
    $data = Data::all();
        return view('data.home', compact('data'));
    
}

    public function create()
    {
        return view('data.create');
    }

    public function store(Request $request)
    
    {
        $validatedData = $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[0-9]+$/',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
            'street' => 'required|string',
            'location' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'country' => 'required|string',
            'lat' => 'required|numeric',
            'lang' => 'required|numeric',
            'comment' => 'required|string'
        ]);
        $data = new Data();
        $data->first_name = $validatedData['first_name'];
        $data->last_name = $validatedData['last_name'];
        $data->email = $validatedData['email'];
        $data->phone = $validatedData['phone'];
        $data->dob = $validatedData['dob'];
        $data->gender = $validatedData['gender'];
        $data->street = $validatedData['street'];
        $data->location = $validatedData['location'];
        $data->city = $validatedData['city'];
        $data->state = $validatedData['state'];
        $data->zip = $validatedData['zip'];
        $data->country = $validatedData['country'];
        $data->lat = $validatedData['lat'];
        $data->lang = $validatedData['lang'];
        $data->comment = $validatedData['comment'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/image');
            $data->image = $imagePath;
        }
    
        $data->save();

        return redirect()->route('data.home');
    }

    public function edit(Data $data)
    {
        return view('data.edit', compact('data'));
    }
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'first_name' => 'required|regex:/^[a-zA-Z]+$/',
        'last_name' => 'required|regex:/^[a-zA-Z]+$/',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|regex:/^[0-9]+$/',
        'dob' => 'required|date',
        'gender' => 'required|string',
        'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
        'street' => 'required|string',
        'location' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'zip' => 'required|numeric',
        'country' => 'required|string',
        'lat' => 'required|numeric',
        'lang' => 'required|numeric',
        'comment' => 'required|string'
    ]);
    $data = Data::findOrFail($id);
    $data->first_name = $validatedData['first_name'];
    $data->last_name = $validatedData['last_name'];
    $data->email = $validatedData['email'];
    $data->phone = $validatedData['phone'];
    $data->dob = $validatedData['dob'];
    $data->gender = $validatedData['gender'];
    $data->street = $validatedData['street'];
    $data->location = $validatedData['location'];
    $data->city = $validatedData['city'];
    $data->state = $validatedData['state'];
    $data->zip = $validatedData['zip'];
    $data->country = $validatedData['country'];
    $data->lat = $validatedData['lat'];
    $data->comment = $validatedData['comment'];
    if ($request->hasFile('image')) {
        // delete the previous image
        if ($data->image) {
        Storage::delete($data->image);
        }
        // store the new image
        $image = $request->file('image');
        $imagePath = $image->store('public/image');
        $data->image = $imagePath;
    }

    $data->save();

    return redirect()->route('data.home');
}
    public function destroy($id)
    {
        $data = Data::find($id);
        $data->delete();
    
        return redirect()->route('data.home');
    }
    public function show($id)
{
    $data = Data::findOrFail($id);

    return view('data.show', compact('data'));
}

public function export() 
{
   
    return Excel::download(new ExportData, 'data.xlsx');
} 

public function import(Request $request)
{
    $validatedData = $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);

    $file = $request->file('file');

    // Temporary file path
    $filePath = $file->getRealPath();

    // Read the file using Maatwebsite\Excel\Facades\Excel
    $data = Excel::import(new ImportData, $filePath);

    // Save imported data to database
    foreach ($data as $row) {
        $validatedRow = Validator::make($row->toArray(), [
            'first_name' => 'required|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[0-9]+$/',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'street' => 'required|string',
            'location' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'country' => 'required|string',
            'lat' => 'required|numeric',
            'lang' => 'required|numeric',
            'comment' => 'required|string'
        ]);

        if ($validatedRow->fails()) {
            return redirect()->back()->withErrors($validatedRow)->withInput();
        }

        $data = new Data();
        $data->first_name = $row['first_name'];
        $data->last_name = $row['last_name'];
        $data->email = $row['email'];
        $data->phone = $row['phone'];
        $data->dob = $row['dob'];
        $data->gender = $row['gender'];
        $data->street = $row['street'];
        $data->location = $row['location'];
        $data->city = $row['city'];
        $data->state = $row['state'];
        $data->zip = $row['zip'];
        $data->country = $row['country'];
        $data->lat = $row['lat'];
        $data->lang = $row['lang'];
        $data->comment = $row['comment'];

        $data->save();
    }

    return redirect()->route('data.home')->with('success', 'Data imported successfully.');
}


   
}