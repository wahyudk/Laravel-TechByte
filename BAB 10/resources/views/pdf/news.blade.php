<!DOCTYPE html>
<html>
<head>
    <title>Daftar Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Berita</h1>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $item)
                <tr>
                    <td><img src="{{ public_path('img_categories/' . $item->foto) }}" alt="Foto" width="100"></td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->isi }}</td>
                    <td>{{ $item->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
