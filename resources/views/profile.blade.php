<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .user-card {
            border: 1px solid #ddd;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .user-info {
            margin: 5px 0;
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ddd;
            margin: 0 auto 10px;
            background-image: url('https://www.w3schools.com/howto/img_avatar.png');
            background-size: cover;
            background-position: center;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .no-users {
            text-align: center;
            color: #666;
            font-style: italic;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Users</h1>
        
        <!-- Tombol untuk membuat user baru -->
        <a href="{{ route('user.create') }}" class="btn">Tambah User Baru</a>
        
        <!-- Pesan sukses jika ada -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Tampilkan daftar users -->
        @if($users && $users->count() > 0)
            @foreach($users as $user)
                <div class="user-card">
                    <div class="avatar"></div>
                    <div class="user-info">
                        <strong>Nama:</strong> {{ $user->nama }}
                    </div>
                    <div class="user-info">
                        <strong>NPM:</strong> {{ $user->npm }}
                    </div>
                    <div class="user-info">
                        <strong>Kelas:</strong> {{ $user->kelas ? $user->kelas->nama_kelas : 'Tidak ada kelas' }}
                    </div>
                    <div class="user-info">
                        <strong>Dibuat pada:</strong> {{ $user->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-users">
                Belum ada data user. <a href="{{ route('user.create') }}">Tambah user pertama</a>
            </div>
        @endif
    </div>
</body>
</html>