<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="students",
 *     description="Model Mahasiswa",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nama mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="nim",
 *         type="string",
 *         description="Nomor Induk Mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="fakultas",
 *         type="string",
 *         description="Fakultas Mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="No HP mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         description="Alamat Mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="dob",
 *         type="date",
 *         description="Tanggal lahir Mahasiswa"
 *     )
 * )
 */
class Student extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'name',
        'nim',
        'fakultas',
        'email',
        'phone',
        'address',
        'dob',
    ];
}
