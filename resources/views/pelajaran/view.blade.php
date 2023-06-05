@extends("layout")
@section('title','single page')

@section('content')
<div class="grid grid-vol"></div>
    <div>
          @if(session('status'))
    <p>{{session('status')}}</p>
    @endif
    <form name="pelajaran" id="pelajaran" method="post" action="/pelajaran/store">
         @csrf
        <input type="text" id="pelajaran" name="pelajaran" class="input input-bordered input-primary w-full max-w-xs" placeholder="masukan nama pelajaran">
        <button type="submit" class="btn btn-primary text-gray-100 ml-5">tambah</button>
    </form>

        <table class="table mt-10 w-1/2" >
            <tr class="bg-neutral py-3 px-3 text-md font-semibold">
                <td>nama pelajaran</td>
                <td class="text-center" colspan="2">action</td>
            </tr>
            @foreach($pelajaran as $pel)
            <tr>
            <td>{{$pel->nama_pelajaran}}</td>
            <td>
                <a href="/pelajaran/{{$pel->id}}" class="badge badge-primary badge-outline text-gray-100 p-3">update</a>
            </td>
            <td>
                <form  method="post"  action="{{ route('pelajaran.delete', ['id' => $pel->id]) }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="badge badge-accent p-3 text-gray-100">delete</button>
        </form>
            </td>
            
            </tr>
                @endforeach 
        </table>
    </div>
@endsection