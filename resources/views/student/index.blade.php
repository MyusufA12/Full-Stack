<!-- resources/views/home.blade.php -->
@extends('master')

@section('title', 'Home')

@section('content')
<body>
    <h1>Data Mahasiswa</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Fakultas</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->fakultas }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>
                        <a href="{{ route('student.edit', $student->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE') <!-- Ini penting -->
                            <button type="submit">Delete</button>
                        </form>
                        
                        <script>
                            function confirmDelete() {
                                return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?');
                            }
                        </script>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
@endsection
<!DOCTYPE html>

