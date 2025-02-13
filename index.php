<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: "Oswald", serif;
        background-color: black;   
        background-size: 100%;
        background-image: url('2.jpg');
    }
    h2 {
        text-shadow: 0 0 20px rgb(111, 0, 255), 0 0 40px rgba(111, 0, 255), 0 0 60px rgba(111, 0, 255);
    }
    form {
        box-shadow: 0 0 20px rgba(111, 0, 255), 0 0 40px rgba(111, 0, 255), 0 0 60px rgba(111, 0, 255);
    }
    .border {
        box-shadow: 0 0 20px rgba(111, 0, 255), 0 0 40px rgba(111, 0, 255), 0 0 60px rgba(111, 0, 255);
        background-image: url('1.jpg');
        background-size: 100%;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center text-light p-2">Aplikasi Perhitungan Diskon</h2>
                <form class="border rounded bg-dark mt-2 p-2" method="post">
                    <b><label class="form-label text-light p-2">Harga Barang (Rp.)</label></b>
                    <input type="number" name="harga" class="form-control" step="0.01" placeholder="Masukan harga barang"
                    min="0" autocomplete="off" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <b><label class="form-label text-light p-2">Diskon (%)</label></b>
                    <input type="text" maxlength="3" name="diskon" class="form-control" step="0.01" placeholder="Masukan diskon"
                    min="0" autocomplete="off" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <button type="submit" class="btn btn-success w-100 mt-2" name="hitung">Hitung</button>
                    <button type="reset" class="btn btn-secondary w-100 mt-2" name="reset">Reset</button>
                </form>
                <div id="hasil">
                    <?php
                        if(isset($_POST['harga'])){
                            $harga=$_POST['harga'];
                            $diskon=$_POST['diskon'];

                            if($harga < 0){
                                echo "<script>alert('Harga tidak boleh negatif!')</script>";
                            }elseif($diskon < 0 || $diskon > 100){
                                echo "<script>alert('Diskon harus diantara angka 0-100 !')</script>";
                            }else{
                                $nilai_diskon = $harga * ($diskon/100);
                                $total_harga = $harga - $nilai_diskon; ?>

                                <div class="border rounded bg-dark p-2 mt-2">
                                    <b><p class="text-light">Harga Barang : Rp. <b><?php echo number_format($harga,2,',','.') ?></b></p></b>
                                    <b><p class="text-light">Diskon <?php ($diskon) ?> : % <b><?php echo number_format($nilai_diskon,2,',','.') ?></b></p></b>
                                    <b><p class="text-light">Harga Barang Setelah Diskon : Rp. <b><?php echo number_format($total_harga,2,',','.') ?></b></p></b>
                                    <button type="reset" id="resetButton" class="btn btn-danger w-100 mt-2" name="reset">Hapus</button>
                                </div>
                           <?php }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('resetButton').addEventListener('click', function () {
            document.getElementById('hasil').innerHTML = '';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <p class="text-center text-light">&copy; UKK RPL 2025 | KHRESNA RAMADHAN | XII</p>
</body>
</html>