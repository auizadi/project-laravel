<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
  <div class="flex  justify-center items-center h-screen ">
    {{-- <div class=" flex flex-col rounded-full bg-slate-300 p-24 justify-center items-center content-center">

    </div> --}}
    <div class="grid grid-cols-2 grid-flow-row gap-7 p-7 justify-between items-center content-center bg-gray-800 rounded-md w-3/5">
       
        <div class="">
        <h1>Informasi Pribadi</h1>
        <h1>Nama                : {{ $mahasiswa->nama }}</h1>
        <h1>Tempat Tanggal Lahir:{{ $mahasiswa->nim }}</h1>
        <h1>NIM                 : {{ $mahasiswa->nim }}</h1>
        <h1>Program Studi       : {{ $mahasiswa->prodi }}</h1>
        <h1>Semester            : {{ $mahasiswa->semester }}</h1>

    </div>
    <div class="">
        <h1>Informasi Beasiswa</h1>
        <h1>GPA/IP              : {{ $mahasiswa->gpa }}</h1>
        <h1>Prestasi Akademik   : {{ $mahasiswa->prestasi_akademik }}</h1>
        <h1>Prestasi Non Akademik: {{ $mahasiswa->prestasi_non }}</h1>
        <h1>Pendapatan Orang Tua: Rp. {{ number_format($mahasiswa->pendapatan_ortu, 2, ',', '.') }}</h1>
        <h1>Tanggungan Orang Tua: {{ $mahasiswa->tanggungan }}</h1>
        <h1>Nilai AHP: {{ number_format($mahasiswa->score, 2) }}</h1>

    </div>
       
        {{-- <div class="flex flex-col gap-2"> 
          <h1 class="font-medium ">Beri Beasiswa?</h1>
          <div class="flex flex-row gap-3">
            <a href="{{ route('pengumuman', ['id' => $mahasiswa->id, 'status' => 'iya']) }}" class="bg-green-600 font-semibold rounded-md text-white px-5 py3">Iya</a>
            <a href="{{ route('pengumuman', ['id' => $mahasiswa->id, 'status' => 'tidak']) }}" class="bg-red-600 font-semibold rounded-md text-white px-5 py3">Tidak</a>
          </div>
          
        </div> --}}
    </div>
    
  </div>
</body>
</html>