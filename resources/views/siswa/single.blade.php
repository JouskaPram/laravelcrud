@extends("layout")
@section('title', 'home')

@section('content')

<form method="post" action="{{ route('siswa.update', ['p' => $siswa->id]) }}" class="block">
    @csrf
    @method("PUT")
    <input type="text" id="nama" name="nama" class="input input-bordered input-primary w-full max-w-xs block" placeholder="masukan nama siswa" value="{{$siswa->nama}}">
    <input type="text" id="kelas" name="kelas" class="input input-bordered input-primary w-full max-w-xs block" placeholder="masukan nama kelas" value="{{$siswa->kelas}}">
    <input type="number" id="nomor_absen" name="nomor_absen" class="input input-bordered input-primary w-full max-w-xs block" placeholder="masukan nomor absen" value="{{$siswa->nomor_absen}}">
    <select name="pelajaran_id" id="pelajaran_id" class="select select-bordered select-primary w-full max-w-xs block">
        <!-- <option value="">{{$siswa->pelajaran->nama_pelajaran}}</option> -->
        @foreach($pelajaran as $p)
        <option value="{{$p->id}}">{{$p->nama_pelajaran}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">ubah</button>
</form>
@endsection
