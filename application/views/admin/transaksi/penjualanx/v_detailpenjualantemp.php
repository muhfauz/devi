<?php
$no = 0;
$total_penjualan = 0;
foreach ($penjualantemp as $a) : $no++;
    $total_penjualan = $total_penjualan + $a->total_bayarpenjualan;
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $a->kd_barang ?></td>
        <td><?php echo $a->nama_barang ?></td>
        <td><?php echo $a->jumlah_penjualan ?></td>
        <td><?php echo date('d F Y', strtotime($a->ED)) ?></td>
        <td>Rp. <?php echo number_format($a->hargajual_barang) ?></td>
        <td class="float-right">Rp.
            <?php echo number_format($a->total_bayarpenjualan, '0', '.', '.') ?>

        </td>
        <td>
            <a href="#" class="btn btn-danger btn-sm mb-1 hapus" kd_detailpenjualantemp="<?php echo $a->kd_detailpenjualantemp ?>"> <i class="fa fa-trash mr-2"></i> </a>
            <a href="#" class="btn btn-info btn-sm mb-1 edit" kd_detailpenjualantemp="<?php echo $a->kd_detailpenjualantemp ?>" kd_barang="<?php echo $a->kd_barang ?>" nama_barang="<?php echo $a->nama_barang ?>" hargajual_barang="<?php echo $a->hargajual_barang ?>" jumlah_penjualan="<?php echo $a->jumlah_penjualan ?>" ED="<?php echo $a->ED ?>"> <i class="fa fa-edit mr-2"></i></a>

        </td>
    </tr>
<?php endforeach; ?>
<tr>
    <td>Grand Total</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>


    <td class="float-right">
        <p id="grandtotal"> Rp. <?php echo number_format($total_penjualan, '0', '.', '.') ?></p>
        <input id="grandtotal2" name="total_penjualan" type="hidden" value="<?php echo $total_penjualan; ?>">

    </td>
    <td></td>
</tr>

<script>
    $(function() {
        function tampilkanbarang() {
            var kd_barang = $('#kd_barang').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/transaksi/penjualan/tampilkanpenjualantemp') ?>",
                data: {
                    kd_barang: kd_barang,
                },
                cache: false,
                success: function(respond) {
                    $('#tampilkanbarangx').html(respond);
                    $('#kd_barang').val('');
                    $('#nama_barang').val('');
                    $('#ijin_edar').val('');
                    $('#jumlah_penjualan').val('');
                    $('#hna_std').val('');
                    $('#ED').val('');
                    // document.getElementById("kd_barang").readOnly = false;
                    var myElement = document.getElementById("tambahbarang1");
                    myElement.textContent = "Tambah";
                }
            })
        }

        function loadgrandtotal() {
            var grandtotal = $('#grandtotal').text();
            var grandtotal2 = $('#grandtotal2').val();
            var grandtotal3 = $('#grandtotal3').val();
            // var uang_muka = $('#grandtotal2').text() / 2;
            $('.grandtotalatas').text(grandtotal);
            $('#total_penjualan').text(grandtotal2);
            $('.uangmukaatas').val(grandtotal2);
            $('#uang_muka').val(grandtotal2);
            $('#total_penjualan').val(grandtotal2);

        }
        loadgrandtotal();
        // tampilkanpaket();


        $('.hapus').click(function() {
            var kd_detailpenjualantemp = $(this).attr("kd_detailpenjualantemp");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/transaksi/penjualan/hapusdetailpenjualantemp') ?>",
                data: {
                    kd_detailpenjualantemp: kd_detailpenjualantemp,
                },
                cache: false,
                success: function(respond) {
                    swal("Selamat!", "Data Berhasil dihapusi!", "success");
                    tampilkanbarang();
                }
            })
        });
        $('.edit').click(function() {
            // $('#showpelanggan').modal('show');
            var kd_detailpenjualantemp = $(this).attr("kd_detailpenjualantemp");
            var kd_barang = $(this).attr("kd_barang");
            var nama_barang = $(this).attr("nama_barang");
            var hargajual_barang = $(this).attr("hargajual_barang");
            var ED = $(this).attr("ED");
            var jumlah_penjualan = $(this).attr("jumlah_penjualan");
            // var nama_pelanggan = $($this).attr("data-kodepel");
            //var kd_pelanggan = "xxx";

            $('#kd_detailpenjualantemp').val(kd_detailpenjualantemp);
            $('#kd_barang').val(kd_barang);
            $('#nama_barang').val(nama_barang);
            // $('#ijin_edar').val(ijin_edar);
            $('#hargajual_barang').val(hargajual_barang);
            $('#ED').val(ED);
            $('#jumlah_penjualan').val(jumlah_penjualan);
            // document.getElementById('tambahpaket1').id = 'editpaket1';
            var myElement = document.getElementById("tambahbarang1");
            myElement.textContent = "Edit";

            document.getElementById("kd_barang").readOnly = true;
            // window.alert(myElement.innerText);


        });
    });
</script>