<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
          @if(session('status'))
    <p>{{session('status')}}</p>
    @endif
    <form name="pelajaran" id="pelajaran" method="post" action="/pelajaran/store">
         @csrf
        <input type="text" id="pelajaran" name="pelajaran">
        <button type="submit">tambah</button>
    </form>

        <table>
            <tr>
                <td>nama pelajaran</td>
                <td>action</td>
            </tr>
            @foreach($pelajaran as $pel)
            <tr>
            <td>{{$pel->nama_pelajaran}}</td>
            <td>
                <form  method="post"  action="{{ route('pelajaran.delete', ['id' => $pel->id]) }}">
            @csrf
            @method("DELETE")
            <button type="submit">delete</button>
        </form>
            </td>
            <td>
                <a href="/pelajaran/{{$pel->id}}">update</a>
            </td>
            </tr>
                @endforeach 
        </table>
    </div>
</body>
</html>