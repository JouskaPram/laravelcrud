@extends("layout")
@section('title','single page')

@section('content')

    <div>
          @if(session('sukses'))
    <div class="w-1/2 my-2">
            <div class="alert alert-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{session('sukses')}}</span>
            </div>
    </div>

    @endif
    @if(session('danger'))
    <div class="w-1/2 my-2">
        <div class="alert alert-error">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{session('danger')}}</span>
        </div>
    </div>
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
                <a href="/pelajaran/{{$pel->id}}" class="btn btn-sm btn-primary btn-outline text-gray-100 ">update</a>
            </td>
            <td>
                <form  method="post"  action="{{ route('pelajaran.delete', ['id' => $pel->id]) }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-sm btn-accent  text-gray-100">delete</button>
        </form>
            </td>
            
            </tr>
                @endforeach 
        </table>
        <form action="{{route('pelajaran.search')}}" method="GET" class="mt-10">
             <input type="text" id="keyword" name="keyword" class="input input-bordered input-secondary w-full max-w-xs" placeholder="masukan nama pelajaran">
        <button type="submit" class="btn btn-secondary text-gray-100 ml-5">cari</button>
        </form>
    </div>
@endsection