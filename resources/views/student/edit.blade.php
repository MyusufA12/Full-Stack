@extends('master')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h1>Edit Data Mahasiswa</h1>

    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Metode PUT untuk update -->
        <table>
            <tr>
                <td>
                    <label for="name">Nama:</label>
                </td>
                <td>
                    <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nim">NIM:</label>
                </td>
                <td>
                    <input type="text" id="nim" name="nim" value="{{ old('nim', $student->nim) }}" required>
                @error('nim')
                    <div>{{ $message }}</div>
                @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fakultas">Fakultas:</label>
                </td>
                <td>
                    <input type="text" id="fakultas" name="fakultas" value="{{ old('fakultas', $student->fakultas) }}" required>
                    @error('fakultas')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td>
                    <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">No. Telepon:</label>
                </td>
                <td>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" required>
                    @error('phone')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="address">Alamat:</label>
                </td>
                <td>
                    <textarea id="address" name="address" required>{{ old('address', $student->address) }}</textarea>
                    @error('address')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dob">Tanggal Lahir:</label>
                </td>
                <td>
                    <input type="date" id="dob" name="dob" value="{{ old('dob', $student->dob) }}" required>
                    @error('dob')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
        </table>
        <button type="submit">Perbarui</button>
    </form>
@endsection
