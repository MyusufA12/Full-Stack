<!-- resources/views/home.blade.php -->
@extends('master')

@section('title', 'Home')

@section('content')
    <h1>FORM PENDAFTARAN MAHASISWA BARU</h1>
    // resources/views/student/register.blade.php
    <br><br>    
    <body>
    
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <img src="image/image1.jpg" alt="">
        
        <form action="{{ route('student.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td>
                        <label for="name">Nama:</label>
                    </td>
                    <td>
                        <input type="text" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nim">Nim:</label>
                    </td>
                    <td>
                        <input type="text" name="nim" id="nim" value="{{ old('nim') }}">
                        @error('nim')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fakultas">Fakultas:</label>
                    </td>
                    <td>
                        <input type="text" name="fakultas" id="fakultas" value="{{ old('fakultas') }}">
                        @error('fakultas')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="phone">No. Telepon:</label>
                    </td>
                    <td>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="address">Alamat:</label>
                    </td>
                    <td>
                        <input type="text" name="address" id="address" value="{{ old('address') }}">
                        @error('address')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="dob">Tanggal Lahir:</label>
                    </td>
                    <td>
                        <input type="date" name="dob" id="dob" value="{{ old('dob') }}">
                        @error('dob')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            
    
            <div>
                <button type="submit">Daftar</button>
            </div>
        </form>
    </body>
@endsection


