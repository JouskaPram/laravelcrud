<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single page</title>
</head>
<body>
    <div>
        <form  method="post"  action="{{ route('pelajaran.update', ['p' => $pelajaran->id]) }}">
            @csrf
            @method("PUT")
            <input type="text" id="namapelajaran" name="namapelajaran" value="{{$pelajaran->nama_pelajaran}}">
            <button type="submit">ubah</button>
        </form>
    </div>
</body>
</html>