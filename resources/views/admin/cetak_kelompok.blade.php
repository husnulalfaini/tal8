<!DOCTYPE html>
<html lang="en">
<head>
<title>Cetak Data Petani</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.kop{
  background-color: white;
  height: 8%;
  margin-bottom: 0px;
  width: 100%;

}
.logo{
  float: left;
  background-color: white;
  text-align: right;
  height: 100%;
  width: 13%;
}
.instansi{
  background-color: white;
  height: 100%;
  font-size: 20px;
  text-align: center;
  width: 100%;
}
.garis{
  background-color: black;
  height: 0.2%;
  width: 100%;
}

/* Style the header */
header {
  background-color: white;
  padding: 30px;
  margin-top: 0px;
  padding: 0px;
  text-align: center;
  font-size: 18px;
  font: arial;
  color: Black;
}



/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 60%;
  height: 200px; /* only for demonstration, should be removed */
  background: white;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding-top: 20px;
  width: 29%;
  background-color: white;
  height: 200px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}


/* Style the footer */
footer {
  background-color: white;
  padding: 10px;
  text-align: center;
  color: black;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: grey;
  color: white;
}
footer {
  background-color: white;
  padding: 10px;
  text-align: center;
  color: black;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>
  <div class="kop">
    <div class="logo" >
    <img src="{{asset('public/asset/dist/img/API.png')}}" alt="Flowers in Chania" width="70" height="70">
    </div>
    <div class="instansi">
      PT. ANUGERAH PORANGKAYA INDONESIA
      <p>Glenmore - Banyuwangi</p>
    </div>
  </div>
  <div class="garis">
  </div>
<header>
<h2 >Data Kelompok</h2>
</header>

<section>
  <nav>
  <table >
  <tr>
    <td style="width:10%">Nama Kelompok</td>
    <td style="width:2%">:</td>
    <td style="width:40%">{{$kelompok->nama}}</td>
  </tr>
  <tr>
    <td style="width:10%">Wilayah </td>
    <td style="width:2%">:</td>
    <td style="width:40%">Kecamatan {{$kelompok->alamat}}</td>
  </tr>
  <tr>
    <td style="width:10%">Ketua</td>
    <td style="width:2%">:</td>
    <td style="width:40%">{{$ketua->name}}</td>
  </tr>
  <tr>
    <td style="width:10%">Jumlah Anggota</td>
    <td style="width:2%">:</td>
    <td style="width:40%">{{$anggota}}</td>
  </tr>
  <tr>
    <td style="width:10%">jumlah Lahan</td>
    <td style="width:2%">:</td>
  <td style="width:40%">{{$jumlah_lahan}}</td>
  </tr>
  <tr>
    <td style="width:10%">Hasil Panen</td>
    <td style="width:2%">:</td>
    <td style="width:40%">{{$hasil}}</td>
  </tr>
</table>
  </nav>
  
  <article>
  <img src="{{ asset('public/storage/'.$ketua->foto)}}" alt="Foto diri" width="150" height="150">

  </article>
</section>

<footer>
  <h3>Riwayat Panen Kelompok</h3>
  <table id="customers">
  <tr>
    <th >No</th>
    <th>Petani</th>
    <th>lahan</th>
    <th>Panen Katak</th>
    <th>Panen Umbi</th>
    <th>Tanggal Panen</th>
  </tr>
  @php
  $no=1;
  @endphp
  @foreach ($panen as $item)
  <tr>
      <td>{{$no++}}</td>
      <td>{{$item->nama}}</td>
      <td>{{$item->lahan}}</td>
      <td>{{$item->panen_katak}}</td>
      <td>{{$item->panen_umbi}}</td>
      <td>{{$item->tanggal}}</td>
  </tr>
@endforeach
</table>
</footer>
<div class="section">

</div>

</body>
</html>

