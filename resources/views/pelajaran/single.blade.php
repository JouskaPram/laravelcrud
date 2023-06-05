@extends("layout")
@section('title','single page')

@section('content')
    <div>
        <form  method="post"  action="{{ route('pelajaran.update', ['p' => $pelajaran->id]) }}">
            @csrf
            @method("PUT")
            <input type="text" id="namapelajaran" name="namapelajaran" value="{{$pelajaran->nama_pelajaran}}">
            <button type="submit">ubah</button>
        </form>
    </div>
@endsection