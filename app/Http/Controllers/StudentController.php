<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    //
    // Menampilkan form pendaftaran
    public function create()
    {
        return view('student.register');
    }

    // Menyimpan data pendaftaran
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'fakultas' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);

        // Menyimpan data mahasiswa baru
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'fakultas' => $request->fakultas,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
        ]);

        return redirect()->route('student.create')->with('success', 'Pendaftaran berhasil!');
    }
    public function index()
    {
        // Mengambil semua data dari tabel students
        $students = Student::all();

        // Mengirim data ke view
        return view('student.index', compact('students'));
    }

    // Menampilkan form edit berdasarkan ID mahasiswa
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    // Memperbarui data mahasiswa
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'fakultas' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('student.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
    
        if (!$student) {
            return redirect()->route('student.index')->with('error', 'Mahasiswa tidak ditemukan!');
        }
    
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
    
}
