<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return view('student.index', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nim' => 'required|size:8,unique:students', 
            'name' => 'required|min:3|max:50', 
            'jenis_kelamin' => 'required|in:P,L', 
            'jurusan' => 'required', 
            'alamat' => '',
        ]);

        Student::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'gender' => $request->jenis_kelamin,
            'departement' => $request->jurusan,
            'address' => $request->alamat,
        ]);
        
        return redirect()->back()->with('success', 'data berhasil dirtambahkan');
    }

    public function destroy($id)
    {
        $data = Student::find($id)->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
