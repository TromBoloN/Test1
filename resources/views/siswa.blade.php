@extends('layouts.app')

@section('content')
   
<style>
body {
        font-family: Arial, sans-serif;
        background-color: #f3f4f6;
    }

    .form {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 400px;
    }
    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }
    label {
        font-weight: bold;
        color: #555;
    }
    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 5px;
        margin: 5px 0 20px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }
    input[type="file"] {
        margin-top: 10px;
    }
    button[type="submit"] {
        background-color: #282e28;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }
    button[type="submit"]:hover {
        background-color: #282e28;
    }
</style>
</head>
<body>
<div class="form">
    <div class="form-container">
        <h2>Kumpul Tugas</h2>
        <form action="{{ route('siswa') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Nama:</label><br>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="NIS">NIS:</label><br>
                <input type="text" id="NIS" name="NIS" required>
            </div>
            <div>
                <label for="mapel">Mata Pelajaran:</label><br>
                <select name="mapel" id="mapel" required>
                    <option value="Matematika">Matematika</option>
                    <option value="IPA">IPA</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                </select>
            </div>
            <div>
                <label for="file">Attachment:</label><br>
                <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.txt">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
@endsection
