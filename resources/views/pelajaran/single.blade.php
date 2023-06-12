@extends("layout")
@section('title','single page')

@section('content')
    <div class="">
    
        <form  method="post"  action="{{ route('pelajaran.update', ['p' => $pelajaran->id]) }}">
            @csrf
            @method("PUT")
            <input type="text" id="namapelajaran" name="namapelajaran" class="input input-bordered input-primary w-2/3 max-w-xs" placeholder="masukan nama pelajaran" value="{{$pelajaran->nama_pelajaran}}">
            <button type="submit" class="btn btn-primary text-gray-100 ml-5">ubah</button>
        </form>
        <a href="/pelajaran" class="btn btn-primary btn-outline md:mt-10 mt-5">kembali</a>
    </div>
@endsection