<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataran Beasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 shadow">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex items-center justify-between mx-6">
                <!-- Logo or Brand Name -->
                <div class="text-lg font-bold">
                    <a href="/" class="hover:text-gray-400">My Bee</a>
                </div>

               
                
                <!-- Navigation Links -->
                @if (Route::has('login'))
                    <div class="flex justify-items-end items-center space-x-7">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md text-sm bg-gray-700 hover:bg-gray-600">Dashboard</a>
                        @else
                            <!-- Logo or Brand Name -->
                            <div class="text-md">
                                <a href="{{ route('pengumuman') }}" class="hover:text-gray-400">Pengumuman</a>
                            </div>
                            <a href="{{ route('login') }}" class="px-4 py-2 rounded-md text-sm " style="background-color: rgb(0, 72, 98);">Log in as admin</a>

                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md text-sm bg-green-600 hover:bg-green-500">Register</a>
                            @endif --}}
                        @endauth
                        
                    </div>
                @endif 
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 ">
         @if (session('success'))
            <div class="p-5 text-white font-medium rounded-md border w-1/4 border-white boder-">
                {{ session('success') }}
            </div>
        @endif
        <div class="container mx-auto p-8 flex justify-center">
           
            <form action="{{ route('user.store') }}" method="POST" class="grid grid-cols-2 gap-8">
                @csrf
                <div>
                    <h1 class="mb-6 text-2xl text-white">Informasi Pribadi</h1>
                    <div class="mb-4">
                        <label for="nama" class="text-white">Nama</label>
                        <br>
                        <input name="nama" id="nama" class="rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" type="text" placeholder="Masukkan nama..." required> 
                        @error('nama')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nim" class="text-white">NIM</label>
                        <br>
                        <input name="nim" id="nim" class="rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" type="text" placeholder="Masukkan NIM..." required>
                        @error('nim')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="prodi" class="text-white">Program Studi</label>
                        <br>
                        <input name="prodi" id="prodi" class="rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" type="text" placeholder="Masukkan program studi..." required>
                        @error('prodi')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="semester" class="text-white">Semester</label>
                        <br>
                        <input name="semester" id="semester" class="rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" type="text" placeholder="Masukkan semester..." required>
                        @error('semester')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="ttl_tempat" class="block text-sm font-medium text-gray-200">Tempat Tanggal Lahir</label>
                        <div class="flex space-x-2">
                            <input
                                type="text"
                                id="ttl_tempat"
                                name="ttl_tempat"
                                class="bg-gray-700 mt-1 block w-1/2 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Tempat Lahir"
                                
                            />
                            @error('ttl_tempat')
                                <small class="text-white
                                ">{{ $message }}</small>
                            @enderror
                            <input
                                type="date"
                                id="ttl_tanggal"
                                name="ttl_tanggal"
                                class="bg-gray-700 mt-1 block w-1/2 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm ml-6"
                                
                            />
                            @error('ttl_tanggal')
                                <small class="text-white
                                ">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                </div>
        
                <div>
                    <h1 class="mb-6 text-2xl text-white">Form Pendataran Beasiswa</h1>
                    <div class="mb-4">
                        <label for="gpa" class="text-white">GPA/IP</label>
                        <br>
                        <input name="gpa" id="gpa" class="rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" type="number" placeholder="Masukkan prestasi akademik..." inputmode="numeric" min="1.00" max="4.00" step="0.01" required>
                        @error('gpa')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="prestasi_akademik" class="text-white">Prestasi Akademik</label>
                        <br>
                        <select class=" rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" name="prestasi_akademik" id="prestasi_akademik" required>
                            <option value="first" disabled selected>Pilih tingkat prestasi</option>
                            <option value="internasional">Internasional</option>
                            <option value="nasional">Nasional</option>
                            <option value="provinsi">Provinsi / Kota</option>
                            <option value="kampus">Kampus</option>
                            <option value="tidak_ada">Tidak ada</option>
                        </select>
                        @error('prestasi_akademik')
                            <small>{{ $message }}</small>
                        @enderror
                       
                    </div>
                    <div class="mb-4">
                        <label for="prestasi_non" class="text-white">Prestasi Non Akademik</label>
                        <br>
                        <select class=" rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" name="prestasi_non" id="prestasi_non" required>
                            <option value="first" disabled selected>Pilih tingkat prestasi</option>
                            <option value="internasional">Internasional</option>
                            <option value="nasional">Nasional</option>
                            <option value="provinsi">Provinsi / Kota</option>
                            <option value="kampus">Kampus</option>
                            <option value="tidak_ada">Tidak ada</option>
                        </select>
                        @error('prestasi_non')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="pendapatan_ortu" class="text-white">Pendapatan Orang Tua</label>
                        <br>
                        <input name="pendapatan_ortu" id="pendapatan_ortu" class="rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" type="text" inputmode="numeric" placeholder="Masukkan program studi..." required>
                        @error('pendapatan_ortu')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tanggungan" class="text-white">Tanggungan Orang Tua</label>
                        <br>
                        <input name="tanggungan" id="tanggungan" class="rounded-md p-2 bg-gray-700 focus:bg-gray-600 w-full" type="text" inputmode="numeric" placeholder="Masukkan semester..." required>
                        @error('tanggungan')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>    
                    <button type="submit" class="w-full bg-gray-700 rounded-full p-3">Kirim</button>            
            </form>

        </div>
        
        
    </main>
</body>
</html>
