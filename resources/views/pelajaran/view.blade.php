@extends("layout")
@section('title','single page')

@section('content')
    <div>
          @if(session('status'))
    <p>{{session('status')}}</p>
    @endif
    <form name="pelajaran" id="pelajaran" method="post" action="/pelajaran/store">
         @csrf
        <input type="text" id="pelajaran" name="pelajaran" class="input input-bordered input-primary w-full max-w-xs" placeholder="masukan nama pelajaran">
        <button type="submit" class="btn btn-primary">tambah</button>
    </form>

        <table class="table mt-10">
            <tr class="bg-base-200">
                <td>nama pelajaran</td>
                <td class="text-center" colspan="2">action</td>
            </tr>
            @foreach($pelajaran as $pel)
            <tr>
            <td>{{$pel->nama_pelajaran}}</td>
            <td>
                <a href="/pelajaran/{{$pel->id}}">update</a>
            </td>
            <td>
                <form  method="post"  action="{{ route('pelajaran.delete', ['id' => $pel->id]) }}">
            @csrf
            @method("DELETE")
            <button type="submit">delete</button>
        </form>
            </td>
            
            </tr>
                @endforeach 
        </table>
    </div>
@endsection