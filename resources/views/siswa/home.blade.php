@extends("layout")
@section('title','home')

@section('content')

  <div class="w-full widget  p-4 rounded-lg bg-neutral border-l-4 shadow-sm border-gray-800">
  
                <h3 class="text-left font-semibold text-gray-200 text-3xl mb-5">Tambah Siswa</h3>
                   @if(session('status'))
    <p>{{session('status')}}</p>
    @endif
                <form  name="siswa" id="siswa" method="post" action="/store"  class="space-y-6">
                 @csrf    
                <div class="grid grid-cols-4 w-full">
                        <div class="col-span-2 px-5 mt-3 ">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama</label>
                            <input type="text" id="nama" name="nama" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="col-span-2 px-5 mt-3">
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kelas</label>
                            <input type="text" id="kelas" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="col-span-2 px-5 mt-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                nomor absen
                            </label>
                            <input type="number" id="nomor_absen" name="nomor_absen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="col-span-1 px-5 mt-3">
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
                        class="py-1.5 px-3 mx-5 rounded-md bg-sky-500 hover:bg-sky-400 hover:transition duration-500 text-white font-semibold">tambah</button>
                </form>
            </div>
  
    
<table class="table mt-10">
    <tr class="py-5 px-2 bg-neutral font-semibold text-md">
        <td>Nama</td>
        <td>Kelas</td>
        <td>nomor_absen</td>
        <td>pelajaran</td>
        <td colspan="2" class="text-center">action</td>
    </tr>
    @foreach($siswa as $s)
    <tr>
        <td>{{$s->nama}}</td>
        <td>{{$s->kelas}}</td>
        <td>{{$s->nomor_absen}}</td>
        <td>{{$s->pelajaran->nama_pelajaran}}</td>
        <td>
            <a href="/siswa/{{$s->id}}" class="badge badge-primary badge-outline text-gray-100 p-3">update</a>
        </td>
        <td>
             <form  method="post"  action="{{ route('siswa.delete', ['p' => $s->id]) }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="badge badge-accent p-3 text-gray-100">delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection