@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attendance report</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Attendance report</h1>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" onclick="exportToExcel('attendanceTable', 'attendance_user_report')">Export to
            Excel</button>
    </div>


    <table id="attendanceTable" class="table">
        <thead>
            <tr>
                <th scope="col">Nama asisten</th>
                <th scope="col">Kelas</th>
                <th scope="col">Materi</th>
                <th scope="col">Jaga sebagai</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu mulai</th>
                <th scope="col">Waktu selesai</th>
                <th scope="col">Durasi</th>
                <th scope="col">PJ / Asisten / Staff / Admin Approved</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->user->username }}</td>
                    <td> {{ $attendance->kelas->nama_kelas }}</td>
                    <td>{{ $attendance->material->materi }}</td>
                    <td>{{ $attendance->teaching_role }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->start }}</td>
                    <td>{{ $attendance->end }}</td>
                    <td>{{ $attendance->duration }}</td>
                    <td>{{ $attendance->code->codeUsedBy->username }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        function exportToExcel(tableId, filename) {
            const table = document.getElementById(tableId);
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
            XLSX.writeFile(wb, `${filename}.xlsx`);
        }
    </script>
@endsection
