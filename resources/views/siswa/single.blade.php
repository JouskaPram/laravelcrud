@extends("layout")
@section('title', 'home')

@section('content')


 <div class="w-full widget  p-4 rounded-lg bg-neutral border-l-4 shadow-sm border-gray-800">
  
                <h3 class="text-left font-semibold text-gray-200 text-3xl mb-5">Ubah Siswa</h3>
                   @if(session('status'))
    <p>{{session('status')}}</p>
    @endif
                <form  method="post" action="{{ route('siswa.update', ['p' => $siswa->id]) }}"  class="space-y-6">
                 @csrf  
                 @method("PUT")  
                <div class="md:grid md:grid-cols-4 w-full">
                        <div class="md:col-span-2 px-5 mt-3 ">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama</label>
                            <input type="text" id="nama" name="nama" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required
                                value="{{$siswa->nama}}"
                                >
                        </div>
                        <div class="md:col-span-2 px-5 mt-3">
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kelas</label>
                            <input type="text" id="kelas" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required
                                value="{{$siswa->kelas}}"
                                >
                        </div>
                        <div class="md:col-span-2 px-5 mt-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                nomor absen
                            </label>
                            <input type="number" id="nomor_absen" name="nomor_absen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required
                                value="{{$siswa->nomor_absen}}"
                                >
                        </div>
                        <div class="md:col-span-1 px-5 mt-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">pelajaran
                            </label>
                          <select name="pelajaran_id" id="pelajaran_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            @foreach($pelajaran as $p)
            <option value="{{$p->id}}">{{$p->nama_pelajaran}}</option>
            @endforeach
        </select>
                        </div>
                      
                    </div>
                    <button
                        class="py-1.5 px-3 mx-5 rounded-md bg-sky-500 hover:bg-sky-400 hover:transition duration-500 text-white font-semibold">Ubah</button>
                          <a href="/" class="py-2 px-3 mx-5 rounded-md bg-red-500 hover:bg-red-400 hover:transition duration-500 text-white font-semibold">kembali</a>
                </form>
              
            </div>
  
@endsection
