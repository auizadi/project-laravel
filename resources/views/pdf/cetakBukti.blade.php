<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    h1{text-align: center; font-size: 2rem}
    table {
      font-family: 'Times New Roman', Times, serif;
      border-collapse: collapse;
      width: 100%;
      text-align: center;
      margin-top: 30px
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      text-align: center
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
    p{
      font-weight: 300;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1>Bukti Penerima Beasiswa</h1>
  <hr>
  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Program Studi</th>
        <th>Semester</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $mahasiswas->nama }}</td>
        <td>{{ $mahasiswas->nim }}</td>
        <td>{{ $mahasiswas->prodi }}</td>
        <td>{{ $mahasiswas->semester }}</td>
        <td>Lolos</td>
      </tr>
    </tbody>
  </table>
  <p>Selamat anda dinyatakan lolos penerimaan beasiswa!</p>
</body>
</html>