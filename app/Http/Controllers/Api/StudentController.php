<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        if (empty($data[0])) {
            # jika data kosong maka
            return response()->json([
                'message' => 'error',
                'data' => 'data tidak ada'
            ]);
        } else {
            # jika data ada maka
            return response()->json([
                'message' => 'success',
                'data' => $data
            ]);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|size:8,unique:students',
            'name' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'data' => $validator->errors()
            ]);
        }

        Student::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'gender' => $request->jenis_kelamin,
            'departement' => $request->jurusan,
            'address' => $request->alamat,
        ]);

        return response()->json([
            'message' => 'success',
            'data' => 'data berhasil di tambahkan'
        ]);
    }

    public function change(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|size:8,unique:students',
            'name' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'data' => $validator->errors()
            ]);
        }

        $data = Student::find($id);

        if (empty($data)) {
            # jika nim tidak ada maka
            return response()->json([
                'message' => 'error',
                'data' => 'ID tidak ditemukan'
            ]);
        } else {
            # jika ada maka
            $data->update([
                'name' => $request->name,
                'gender' => $request->jenis_kelamin,
                'departement' => $request->jurusan,
                'address' => $request->alamat,
            ]);

            return response()->json([
                'message' => 'success',
                'data' => 'data berhasil di update'
            ]);
        }
    }

    public function destroy($id)
    {
        $data = Student::find($id);

        if (empty($data)) {
            # jika nim tidak ada maka
            return response()->json([
                'message' => 'error',
                'data' => 'ID tidak ditemukan'
            ]);
        } else {
            # jika ada maka
            $data->delete();
            return response()->json([
                'message' => 'success',
                'data' => 'data berhasil di hapus'
            ]);
        }
    }
}
