<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="mx-auto text-white text-2xl font-bold mb-6">Pengumuman Penerima Beasiswa</h1>
        <table class=" text-white border-collapse border border-gray-200 dark:border-gray-700 rounded-md">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                {{-- <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">No.</th> --}}
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">No. </th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Nama</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">NIM</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Pogram Studi</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Nilai AHP</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Keterangan</th>
                {{-- <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Tempat Lahir</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Tanggal Lahir</th> --}}
                {{-- <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Semester</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">GPA/IP</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Prestasi Akademik</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Prestasi Non Akademik</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Pendapatan Orang Tua</th>
                <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Tanggungan Orang Tua</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswas as $mahasiswa)
                <tr>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mahasiswa->nama }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mahasiswa->nim }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mahasiswa->prodi }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ number_format($mahasiswa->score, 2) }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">
                      <div class="flex flex-row gap-2">
                        <p class="text-white text-sm bg-green-700 p-2 rounded-md text-center font-medium">Lulus</p>
                        <a href="" class="text-white bg-sky-600 p-2 rounded-md text-center font-medium">Cetak Bukti</a>
                      </div>
                    </td>
                    {{-- <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs->ttl_tempat }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs->ttl_tanggal }}</td> --}}
                    {{-- <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs->semester }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs->gpa }}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs-> prestasi_akademik}}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs-> prestasi_non}}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs-> pendapatan_ortu}}</td>
                    <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mhs-> tanggungan}}</td> --}}
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center border border-gray-200 dark:border-gray-600 px-4 py-2">
                        Tidak ada data mahasiswa.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
        </div>
    </div>
    
</div>
</body>
</html>