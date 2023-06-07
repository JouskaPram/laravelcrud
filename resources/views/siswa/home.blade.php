
@extends("layout")
@section('title','home')

@section('content')
      @if(session('notauser'))
    <div class="w-1/2 my-2 mt-5">
            <div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{session('notauser')}}</span>
            </div>
    </div>

    @endif
  <div class="w-full widget  p-4 rounded-lg bg-neutral border-l-4 shadow-sm border-gray-800">
  
                <h3 class="text-left font-semibold text-gray-200 text-3xl mb-5">Tambah Siswa</h3>
                         @if(session('sukses'))
    <div class="w-1/2 my-2">
            <div class="alert alert-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{session('sukses')}}</span>
            </div>
    </div>

    @endif
                       
   
   
                <form  name="siswa" id="siswa" method="post" action="/store"  class="space-y-6">
                 @csrf    
                <div class="md:grid md:grid-cols-4 w-full">
                        <div class="md:col-span-2 px-5 mt-3 ">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama</label>
                            <input type="text" id="nama" name="nama" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="md:col-span-2 px-5 mt-3">
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kelas</label>
                            <input type="text" id="kelas" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="md:col-span-2 px-5 mt-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                nomor absen
                            </label>
                            <input type="number" id="nomor_absen" name="nomor_absen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
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
                        class="py-1.5 px-3 mx-5 rounded-md bg-sky-500 hover:bg-sky-400 hover:transition duration-500 text-white font-semibold">tambah</button>
                </form>
            </div>
  
      <form action="{{route('siswa.search')}}" method="GET" class="mt-10">
             <input type="text" id="keyword" name="keyword" class="input input-bordered input-secondary w-2/3 max-w-xs" placeholder="masukan kata kunci">
        <button type="submit" class="btn btn-secondary text-gray-100 ml-5">cari</button>
        </form>
         @if(session('none'))
    <div class="w-1/3 my-2">
        <div class="alert alert-error">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{session('none')}}</span>
        </div>
    </div>
@endif
 @if(session('danger'))
    <div class="w-1/3 my-2">
        <div class="alert alert-error">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{session('danger')}}</span>
        </div>
    </div>
@endif
<table class="table mt-10 hidden md:table w-full">
    <tr class="py-5 px-2 bg-neutral font-semibold text-md">
        <td>Nama</td>
        <td>Kelas</td>
        <td>nomor_absen</td>
        <td>pelajaran</td>
        <td>last modified</td>
        <td colspan="2" class="text-center">action</td>
    </tr>
    @foreach($siswa as $s)
    <tr>
        <td>{{$s->nama}}</td>
        <td>{{$s->kelas}}</td>
        <td>{{$s->nomor_absen}}</td>
        <td>{{$s->pelajaran->nama_pelajaran}}</td>
       <td>{{ $s->user->name }}</td>
        <td>
            <a href="/siswa/{{$s->id}}" class="btn btn-sm btn-primary btn-outline text-gray-100 ">update</a>
        </td>
        <td>
             <form  method="post"  action="{{ route('siswa.delete', ['p' => $s->id]) }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn  btn-sm btn-accent  text-gray-100">delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
 @foreach($siswa as $si)
<ul class="menu menu-xs bg-neutral w-full py-2 mt-2 rounded-box border-b-1 border-base-100 md:hidden">
    <li>
        <div class="flex justify-between">
            <div class="text-lg font-semibold">{{$si->nama}} ({{$si->nomor_absen}})</div> 
            <div class="text-md text-italic font-italic">last modified {{$s->user->name}}</div>
        </div>
       
       
        <p>{{$si->pelajaran->nama_pelajaran}}</p>
        <p class="text-left text-xs">{{ $s->user->name }}</p>
    </li>

</ul>
@endforeach
@endsection