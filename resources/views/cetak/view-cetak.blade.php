<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Pendaftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* margin: 20px;
            padding: 20px; */
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-row {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        .form-row .col-md-4 {
            flex: 0 0 calc(50% - 10px); /* Two columns with a little gap */
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border-radius: 8px; /* Rounded corners */
            border: 1px solid #ccc; /* Adding border */
        }
        label {
            margin-bottom: 5px;
            display: block;
        }
    </style>
</head>
<body>
    <h2>Detail Data Formulir</h2>

    <table>
        @foreach ($dataUser as $value)
        <tbody>
            <tr>
                <th>Nama</th>
                <td>{{ $value->nama }}</td>
            </tr>
            <tr>
                <th>Alamat Sekarang</th>
                <td>{{ $value->alamat_sekarang }}</td>
            </tr>
            <tr>
                <th>Alamat KTP</th>
                <td>{{ $value->alamat_ktp }}</td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td>{{ $value->provinsi }}</td>
            </tr>
            <tr>
                <th>Kota</th>
                <td>{{ $value->kabupaten }}</td>
            </tr>
            <tr>
                <th>Nomor Handphone</th>
                <td>{{ $value->no_hp }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $value->email }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $value->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Provinsi Lahir</th>
                <td>{{ $value->provinsi_lahir }}</td>
            </tr>
            <tr>
                <th>Kabupaten/Kota Lahir</th>
                <td>{{ $value->kabupaten_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ \Carbon\Carbon::parse($value->tanggal_lahir)->format('d-m-Y') }}</td> <!-- Format date -->
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $value->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Status Pernikahan</th>
                <td>{{ $value->status_menikah }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $value->agama }}</td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <td>{{ $value->kewarganegaraan }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</body>
</html>