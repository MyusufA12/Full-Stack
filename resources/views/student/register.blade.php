
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru</title>
</head>
<body>
    <h1>Form Pendaftaran Mahasiswa Baru</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif


        <div>
            <a href="/home">Kembali</a>
        </div>
    </form>
</body>
</html>