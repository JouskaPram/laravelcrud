
@extends("layout")
@section('title','single page')

@section('content')
<h5>Para Pengguna {{$pelajaran->nama_pelajaran}}</h5>
@foreach ($siswa as $s)
<ul>
    
    <li>{{$s->nama}}</li>
</ul>
@endforeach
@endsection