<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contoh Tampilan</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #EAFFEC;
      background-image: url("img/logo.jpeg"), url("img/orang.png"), url("img/dokter_online.png");
      background-repeat: no-repeat, no-repeat, no-repeat;
      background-position: 35px 28px, 950px 390px, 290px 790px;
      background-size: 167px 156px, 388px 300px, 396px 371px;
      position: relative;
    }

    .container {
      position: absolute;
      top: 1300px;
      left: 0;
      width: 100%;
      height: 180px;
      background-color: #D9D9D9;
      background-image: url("img/gedung.png"), url("img/logo.png"), url("img/hp.png");
      background-repeat: no-repeat, no-repeat, no-repeat;
      background-position: 45px 28px, 600px 150px, 1070px 28px;
      background-size: 68px 59px, 240px 20px, 43px 48px;
      position: relative;
    }

    .background-judul {
      position: absolute;
      top: 290px;
      left: 250px;
      color: black;
      font-weight: bold;
      font-size: 45px;
      width: 721px;
      height: 117px;
      text-align: center;
    }

    .background-tulisan {
      position: absolute;
      top: 470px;
      left: 300px;
      color: black;
      font-size: 27px;
      width: 550px;
      height: 164px;
      text-align: left;
    }


    .background-tulisan2 {
      position: absolute;
      top: 850px;
      left: 750px;
      color: black;
      font-size: 27px;
      width: 543px;
      height: 108px;
      text-align: left;
    }

    .background-tulisan3 {
      position: absolute;
      top: 1000px;
      left: 750px;
      color: black;
      font-size: 27px;
      width: 539px;
      height: 117px;
      text-align: left;
    }

    .background-tulisan4 {
      position: absolute;
      top: 26px;
      left: 130px;
      color: black;
      font-size: 27px;
      width: 456px;
      height: 52px;
      text-align: left;
    }

    .background-tulisan5 {
      position: absolute;
      top: 35px;
      left: 1150px;
      color: black;
      font-size: 27px;
      width: 146px;
      height: 28px;
    }

    .background-beranda {
      position: absolute;
      top: 92px;
      left: 410px;
      color: black;
      font-size: 27px;
    }

    .background-tentangkami {
      position: absolute;
      top: 92px;
      left: 560px;
      color: black;
      font-size: 27px;
    }

    .background-kontak {
      position: absolute;
      top: 92px;
      left: 760px;
      color: black;
      font-size: 27px;
    }

    .background-masuk {
      position: absolute;
      top: 92px;
      left: 910px;
      color: black;
      font-size: 27px;
    }

    .background-daftar {
      position: absolute;
      top: 92px;
      left: 1060px;
      color: black;
      font-size: 27px;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="background-tulisan4">JL. Mawar Salim No.001, Rt004/Rw005, Jakarta Utara, Pademangan Timur, 14420.</div>
    <div class="background-tulisan5">021-444698</div>
  </div>
  <div class="background-judul">Mengutamakan Kesehatan Anda dengan Pelayanan Terbaik</div>
  <div class="background-tulisan">Selamat datang di Puskesmas Salim, penyedia layanan kesehatan terpercaya dan terdepan di daerah ini. Kami berkomitmen untuk memberikan pelayanan terbaik kepada Anda dan keluarga, dengan fokus pada kesehatan dan kesejahteraan secara menyeluruh.</div>
  <div class="background-tulisan2">Layanan kesehatan juga bisa diakses melalui smartphone, anda bisa memulai dengan membuat akun dan mendaftarkan nomor antrian agar tidak terlalu lama mengantri.</div>
  <div class ="background-tulisan3">Masih banyak lagi fitur-fitur yang dapat membantu kita dalam menghemat waktu untuk datang ke puskesmas, bisa dapat mendapatkan notifikasi pemberitahuan.</div>
  <div class="background-beranda "><a class="" href="index.php">Beranda</a></div>
  <div class="background-tentangkami "><a class="text-decoration-none" href="tentang_kami.php">Tentang kami</a></div>
  <div class="background-kontak">Kontak</div>
  <div class="background-masuk "><a class="text-decoration-none" href="login_p.php">Masuk</a></div>
  <div class="background-daftar "><a class="text-decoration-none" href="register.php">Daftar</a></div>
</body>
</html>