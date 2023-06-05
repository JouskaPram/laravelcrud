@extends("layout")
@section('title','home')

@section('content')
     @if(session('status'))
    <p>{{session('status')}}</p>
    @endif
    <form name="siswa" id="siswa" method="post" action="/store" class="block"> 
         @csrf
        <input type="text" id="nama" name="nama" class="input input-bordered input-primary w-full max-w-xs block" placeholder="masukan nama siswa">
        <input type="text" id="kelas" name="kelas" class="input input-bordered input-primary w-full max-w-xs block" placeholder="masukan nama kelas">
        <input type="number" id="nomor_absen" name="nomor_absen" class="input input-bordered input-primary w-full max-w-xs block" placeholder="masukan nomor absen">
        <select name="pelajaran_id" id="pelajaran_id" class="select select-bordered select-primary w-full max-w-xs block">
            @foreach($pelajaran as $p)
            <option value="{{$p->id}}">{{$p->nama_pelajaran}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">tambah</button>
    </form>
<table class="table">
    <tr>
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
            <a href="/siswa/{{$s->id}}">update</a>
        </td>
        <td>
             <form  method="post"  action="{{ route('siswa.delete', ['p' => $s->id]) }}">
            @csrf
            @method("DELETE")
            <button type="submit">delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection