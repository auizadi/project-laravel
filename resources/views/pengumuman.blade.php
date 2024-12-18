<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-72">
            <div class="flex flex-col p-6 justify-center items-center bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                @if ($mahasiswas->isEmpty())
                    <div class="flex justify-center items-center text-center font-semibold text-white">                   
                         <h1>Belum ada penerima beasiswa</h1>
                    </div>
                @else
                            <h1 class="text-white text-2xl my-3 font-semibold">Daftar Penerima Beasiswa</h1>
                            <p class="mb-5 text-gray-500">Kuota penerima beasiswa: {{ $jumlah_penerima }}</p>

                            <table class="text-center text-white border-collapse border border-gray-200 dark:border-gray-700 rounded-md mb-7">
                                <thead>
                                    <tr class="border border-gray-200 dark:border-gray-600 px-4 py-2">
                                        <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">No.</th>
                                        <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Nama</th>
                                        <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">NIM</th>
                                        <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Program Studi</th>
                                        <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Semester</th>
                                        <th class="border border-gray-200 dark:border-gray-600 px-4 py-2">Keterangan</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswas as $mahasiswa)
                                        <tr  >
                                            <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mahasiswa->nama }}</td>
                                            <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mahasiswa->nim }}</td>
                                            <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mahasiswa->prodi }}</td>
                                            <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">{{ $mahasiswa->semester }}</td>
                                            <td class="border border-gray-200 dark:border-gray-600 px-4 py-2">
                                                <div class="flex flex-row gap-2"> 
                                                    <p class="text-white font-medium p-2 bg-green-600 rounded-md">Lulus</p>
                                                    <a href="{{ route('pengumumanid', ['id' => $mahasiswa -> id ,'download' => 'pdf']) }}" class="text-white font-medium hover:bg-sky-700 bg-sky-600 rounded-md p-2" target="blank">Cetak Bukti</a>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
            </div>
        </div>
        
    </div>
    
</div>
</body>
</html>