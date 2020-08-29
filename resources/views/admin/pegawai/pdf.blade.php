<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>email</th>
                <th>jabatan</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pegawai as $datas => $data)
            <tr>
                <td>{{ $datas + 1 }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->jabatan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $pegawai->links() }} --}}
</body>
</html>




