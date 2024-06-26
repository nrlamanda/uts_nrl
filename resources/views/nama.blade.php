<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UTS</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css">

</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <h1>Pembelian Produk</h1>
            <p id="berhasil"></p>
            <div class="form-group">
              <label for="">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk" placeholder="Input nama produk">
              <p id="lihat_nama" class="peringatan"></p>
            </div>
            <div class="form-group">
              <label for="">Harga Produk</label>
              <input type="number" class="form-control" id="harga_produk" placeholder="Input harga produk">
              <p id="lihat_harga" class="peringatan"></p>
            </div>
            <div class="form-group">
              <label for="">Qty Produk</label>
              <input type="number" class="form-control" id="qty_produk" placeholder="Input qty produk">
              <p id="lihat_qty" class="peringatan"></p>
            </div>
            <div class="form-group">
              <label for="">Jumlah Pembayaran</label>
              <input type="number" class="form-control" id="jumlah_bayar" placeholder="Input jumlah pembayaran">
              <p id="lihat_jumlah_bayar" class="peringatan"></p>
            </div>
            <div class="form-group mt-4" style="text-align: right;">
              <button class="btn btn-warning" id="clear">Clear</button>
              <button class="btn btn-info" id="pay">Pay</button>
            </div>
          </div>
          <div class="col-sm-6" id="hasil_total_bayar"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $("#clear").click(function () {
      $("#nama_produk").val("")
      $("#harga_produk").val("")
      $("#qty_produk").val("")
      $("#jumlah_bayar").val("")
      $("#berhasil").html("")
      $("#hasil_total_bayar").html("")
    })
    $("#pay").click(function () {
      var nama_produk = $("#nama_produk").val()
      var harga_produk = $("#harga_produk").val()
      var qty_produk = $("#qty_produk").val()
      var jumlah_bayar = $("#jumlah_bayar").val()
      if (nama_produk == "") {
        $("#lihat_nama").text("Nama Produk masih kosong!")
      } else {
        $("#lihat_nama").text("")
      }
      if (harga_produk == "") {
        $("#lihat_harga").text("Harga Produk masih kosong!")
      } else {
        $("#lihat_harga").text("")
      }
      if (qty_produk == "") {
        $("#lihat_qty").text("Qty Produk masih kosong!")
      } else {
        $("#lihat_qty").text("")
      }
      if (jumlah_bayar == "") {
        $("#lihat_jumlah_bayar").text("Jumlah Bayar masih kosong!")
      } else {
        var total_bayar = qty_produk * harga_produk
        var total_kembalian = jumlah_bayar - total_bayar
        if (total_kembalian < 0) {
          $("#lihat_jumlah_bayar").text("Jumlah bayar tidak mencukupi!")
        } else {
          $("#berhasil").html(`
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> Terimakasih telah melakukan pembelian.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          `)
          $("#hasil_total_bayar").html(`
          <h3>Total Pembayaran</h3>
            <div class="row">
              <div class="col-sm-5">Nama Produk</div>
              <div class="col-sm-7">`+ nama_produk + `</div>
            </div>
            <div class="row">
              <div class="col-sm-5">Harga Produk</div>
              <div class="col-sm-7">`+ harga_produk + `</div>
            </div>
            <div class="row">
              <div class="col-sm-5">Qty Pembelian</div>
              <div class="col-sm-7">`+ qty_produk + `</div>
            </div >
            <div class="row">
              <div class="col-sm-5">Total Bayar</div>
              <div class="col-sm-7">
                <h4>`+ total_bayar + `</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">Jumlah Bayar</div>
              <div class="col-sm-7">`+ jumlah_bayar + `</div>
            </div>
            <div class="row">
              <div class="col-sm-5">Jumlah Kembalian</div>
              <div class="col-sm-7">
                <h2 class="text-danger">`+ total_kembalian + `</h2>
              </div>
            </div>
          `)
          $("#lihat_jumlah_bayar").text("")
        }
      }
    })
  </script>

</body>

</html>