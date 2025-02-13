<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center text-light p-2">Aplikasi Perhitungan Diskon</h2>
                <form class="border rounded bg-light mt-2 p-2" method="post">
                    <label class="form-label p-2">Harga Barang (Rp.)</label>
                    <input type="number" name="harga" class="form-control" step="0.01" placeholder="Masukan harga barang"
                    min="0" autocomplete="off" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <label class="form-label p-2">Diskon (%)</label>
                    <input type="text" maxlength="3" name="diskon" class="form-control" step="0.01" placeholder="Masukan diskon"
                    min="0" autocomplete="off" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <button type="submit" class="btn btn-primary w-100 mt-2" name="hitung">Hitung</button>
                    <button type="reset" class="btn btn-primary w-100 mt-2" name="reset">Reset</button>
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

                                <div class="border rounded bg-light p-2 mt-2">
                                    <p>Harga Barang : Rp. <b><?php echo number_format($harga,2,',','.') ?></b></p>
                                    <p>Diskon <?php ($diskon) ?> : % <b><?php echo number_format($nilai_diskon,2,',','.') ?></b></p>
                                    <p>Harga Barang Setelah Diskon : Rp. <b><?php echo number_format($total_harga,2,',','.') ?></b></p>
                                    <button type="reset" id="resetButton" class="btn btn-primary w-100 mt-2" name="reset">Hapus</button>
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