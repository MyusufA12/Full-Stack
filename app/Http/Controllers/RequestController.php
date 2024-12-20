<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RequestController extends Controller
{
    /** 
     * @OA\Get(
     *      path= "/students",
     *      tags={"students"},
     *      summary="Get all Students.",
     *      description="Grt list of all students.",
     *      @OA\Response(response=200, description="students retrieved successfully") 
     * )
     */

     

    public function home()
    {
    
    return view('home');
    }

    public function about()
    {
    return view('about');
    }

    public function contact()
    {
    return view('contact');
    }

    public function master()
    {
    return view('master');
    }
   
    public function index()
    {
        // Mengambil semua data dari tabel students
        $students = Student::all();

        // Mengirim data ke API
        return response()->json($students,200);  
       //print_r($students);

    }

    public function index1()
    {
        // menampilkan view students
        $students = Student::all();
        return view('student.index', compact('students'));

    }

    /**
 * @OA\Put(
 *      path="/students/{id}",
 *      tags={"students"},
 *      summary="Update an existing Student.",
 *      description="Update the student details in the database by ID.",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID of the student to update",
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name", "nim", "fakultas", "email", "phone", "address", "dob"},
 *              @OA\Property(property="name", type="string", example="John Doe", description="Nama mahasiswa"),
 *              @OA\Property(property="nim", type="string", example="123456789", description="Nomor Induk Mahasiswa"),
 *              @OA\Property(property="fakultas", type="string", example="Teknik", description="Fakultas mahasiswa"),
 *              @OA\Property(property="email", type="string", format="email", example="john.doe@example.com", description="Email mahasiswa"),
 *              @OA\Property(property="phone", type="string", example="081234567890", description="Nomor telepon mahasiswa"),
 *              @OA\Property(property="address", type="string", example="Jl. Kebon Jeruk No. 1, Jakarta", description="Alamat mahasiswa"),
 *              @OA\Property(property="dob", type="string", format="date", example="2000-01-01", description="Tanggal lahir mahasiswa")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Student updated successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="boolean", example=true),
 *              @OA\Property(property="data", type="object", description="Updated student data")
 *          )
 *      ),
 *      @OA\Response(response=400, description="Invalid input"),
 *      @OA\Response(response=404, description="Student not found"),
 *      @OA\Response(response=422, description="Validation error")
 * )
 */

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

        return response()->json('Data mahasiswa berhasil diperbarui!');
    }

     // Menyimpan data mahasiswa baru

     /** 
 * @OA\Post(
 *      path="/students",
 *      tags={"students"},
 *      summary="Menambahkan Data Mahasiswa.",
 *      description="Menambahkan data Mahasiswa ke dalam database.",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name", "nim", "fakultas", "email", "phone", "address", "dob"},
 *              @OA\Property(property="name", type="string", example="John Doe", description="Nama mahasiswa"),
 *              @OA\Property(property="nim", type="string", example="123456789", description="Nomor Induk Mahasiswa"),
 *              @OA\Property(property="fakultas", type="string", example="Teknik", description="Fakultas mahasiswa"),
 *              @OA\Property(property="email", type="string", format="email", example="john.doe@example.com", description="Email mahasiswa"),
 *              @OA\Property(property="phone", type="string", example="081234567890", description="Nomor telepon mahasiswa"),
 *              @OA\Property(property="address", type="string", example="Jl. Kebon Jeruk No. 1, Jakarta", description="Alamat mahasiswa"),
 *              @OA\Property(property="dob", type="string", format="date", example="2000-01-01", description="Tanggal lahir mahasiswa")
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Mahasiswa berhasil ditambahkan",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Mahasiswa berhasil ditambahkan"),
 *              @OA\Property(property="data", type="object", description="Data mahasiswa yang baru ditambahkan")
 *          )
 *      ),
 *      @OA\Response(response=400, description="Data yang diberikan tidak valid"),
 *      @OA\Response(response=422, description="Data gagal disimpan karena kesalahan validasi")
 * )
 */

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
 
         return response()->json('Data Berhasil di tambahlkan');
     }

     /** 
 * @OA\Delete(
 *     path="/students/{id}",
 *     tags={"students"},
 *     summary="Delete a student by ID",
 *     description="Delete a student from the database by ID.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the student to delete",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student deleted successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Student deleted successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Student not found")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Invalid ID provided")
 *         )
 *     )
 * )
 */


    public function destroy($id)
    {
        $student = Student::find($id);
    
        if (!$student) {
            return response()->json('error', 'Mahasiswa tidak ditemukan!');
        }
    
        $student->delete();
        return response()->json('Data Sudah Dihapus');
    }

   


    // API untuk menerima POST request
    public function postRequest(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Ambil data dari request
        $name = $request->input('name');
        $email = $request->input('email');

        // Lakukan sesuatu dengan data, misalnya simpan atau olah
        // Dalam contoh ini, kita hanya akan mengembalikan data sebagai respons

        return response()->json([
            'message' => 'Data received via POST',
            'data' => [
                'name' => $name,
                'email' => $email,
            ]
        ], 201); // 201 untuk sukses POST (Created)
    }

    // API untuk menerima GET request
    public function getRequest(Request $request)
    {
        // Ambil data dari query string
        $name = $request->query('name');
        $email = $request->query('email');

        // Validasi sederhana (optional, karena GET)
        if (!$name || !$email) {
            return response()->json([
                'message' => 'Missing parameters: name or email'
            ], 400); // 400 untuk Bad Request
        }

        // Lakukan sesuatu dengan data, misalnya kembalikan data
        return response()->json([
            'message' => 'Data received via GET',
            'data' => [
                'name' => $name,
                'email' => $email,
            ]
        ], 200); // 200 untuk sukses GET (OK)
    }
}
