@extends('layouts.app')

@section('content')
<style>
.user-page {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.nav-bar {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

.table-container {
    margin-top: 20px;
}

.form-kumpul {
    width: 100%;
    border-collapse: collapse;
}

.form-kumpul th, .form-kumpul td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.form-kumpul th {
    background-color: #f2f2f2;
}

.form-kumpul tbody tr:hover {
    background-color: #f2f2f2;
}

.form-kumpul tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.form-kumpul input[type="text"] {
    width: 60px;
    padding: 5px;
}

.form-kumpul button {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

.form-kumpul button:hover {
    background-color: #0056b3;
}
</style>


<div class="user-page">
    <div class="nav-bar">
        <h1>Hello</h1>
    </div>

    <table class="form-kumpul">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Tugas</th>
                <th scope="col">Nilai</th>
            </tr>
        </thead>

        <tbody>
            @foreach($submissions as $submission)
                <tr>
                    <td>{{ $submission->nama }}</td>
                    <td>{{ $submission->NIS }}</td>
                    <td>{{ $submission->mapel }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">View File</a>
                    </td>
                    <td>
                        <!-- Include a hidden input field for NIS -->
                        <input type="hidden" name="NIS" value="{{ $submission->NIS }}">
                        <input type="text" id="grade_{{ $submission->NIS }}" value="" />
                        <button onclick="submitGrade('{{ $submission->NIS }}')">Submit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function submitGrade(NIS) {
        // Get the value of the grade input field
        var nilai = document.getElementById('grade_' + NIS).value;

        // Send AJAX request to submit grading data
        fetch('{{ route("nilai.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                NIS: NIS,
                nilai: nilai
            })
        })
        .then(response => {
            if (response.ok) {
                // Reload the page to update the table
                window.location.reload();
            } else {
                console.error('Failed to submit grading data.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
@endsection
