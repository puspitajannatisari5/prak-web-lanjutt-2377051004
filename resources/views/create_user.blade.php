<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2>Form Create User</h2>

        {{-- TAMPILKAN ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="alert" style="background: #ffe5e5; padding: 10px; border-radius: 8px; color: #c0392b; margin-bottom: 20px;">
                <ul style="list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <label for="nama">Nama</label>
                <i class="fas fa-user"></i>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="input-group">
                <label for="npm">NPM</label>
                <i class="fas fa-id-badge"></i>
                <input type="text" id="npm" name="npm" value="{{ old('npm') }}" required>
            </div>

            <div class="input-group">
                <label for="kelas">Kelas</label>
                <i class="fas fa-user"></i>
                <select id="kelas" name="kelas_id" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Kirim Data</button>
        </form>

        <div class="toggle-theme" onclick="toggleTheme()">Ganti ke Dark/Light Mode</div>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle('dark');
        }
    </script>
</body>
</html>
