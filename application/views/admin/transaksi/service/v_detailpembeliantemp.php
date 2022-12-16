<?php
$no = 0;
$total_pembelian = 0;
foreach ($pembeliantemp as $a) : $no++;
    $total_pembelian = $total_pembelian + $a->total_bayar;
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $a->kd_barang ?></td>
        <td><?php echo $a->nama_barang ?></td>
        <td><?php echo $a->ijin_edar ?></td>
        <td><?php echo date('d F Y', strtotime($a->ED)) ?></td>
        <td><?php echo $a->jumlah_pembelian ?></td>
        <td>Rp. <?php echo number_format($a->hna_std) ?></td>
        <td class="float-right">Rp.
            <?php echo number_format($a->total_bayar, '0', '.', '.') ?>

        </td>
        <td>
            <a href="#" class="btn btn-danger btn-sm mb-1 hapus" kd_detailpembeliantemp="<?php echo $a->kd_detailpembeliantemp ?>"> <i class="fa fa-trash mr-2"></i> Batal</a>
            <a href="#" class="btn btn-info btn-sm mb-1 edit" kd_detailpembeliantemp="<?php echo $a->kd_detailpembeliantemp ?>" kd_barang="<?php echo $a->kd_barang ?>" nama_barang="<?php echo $a->nama_barang ?>" hna_std="<?php echo $a->hna_std ?>" jumlah_pembelian="<?php echo $a->jumlah_pembelian ?>" ED="<?php echo $a->ED ?>" ijin_edar="<?php echo $a->ijin_edar ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>

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
    <td></td>
    <td class="float-right">
        <p id="grandtotal"> Rp. <?php echo number_format($total_pembelian, '0', '.', '.') ?></p>
        <input id="grandtotal2" name="total_pembelian" type="hidden" value="<?php echo $total_pembelian; ?>">

    </td>
    <td></td>
</tr>

<script>
    $(function() {
        function tampilkanbarang() {
            var kd_barang = $('#kd_barang').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/transaksi/pembelian/tampilkanpembeliantemp') ?>",
                data: {
                    kd_barang: kd_barang,
                },
                cache: false,
                success: function(respond) {
                    $('#tampilkanbarangx').html(respond);
                    $('#kd_barang').val('');
                    $('#nama_barang').val('');
                    $('#ijin_edar').val('');
                    $('#jumlah_pembelian').val('');
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
            $('#total_pembelian').text(grandtotal2);
            $('.uangmukaatas').val(grandtotal2);
            $('#uang_muka').val(grandtotal2);
            $('#total_pembelian').val(grandtotal2 * 2);

        }
        loadgrandtotal();
        // tampilkanpaket();


        $('.hapus').click(function() {
            var kd_detailpembeliantemp = $(this).attr("kd_detailpembeliantemp");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/transaksi/pembelian/hapusdetailpembeliantemp') ?>",
                data: {
                    kd_detailpembeliantemp: kd_detailpembeliantemp,
                },
                cache: false,
                success: function(respond) {
                    alert("berhasil dihapus");
                    tampilkanbarang();
                }
            })
        });
        $('.edit').click(function() {
            // $('#showpelanggan').modal('show');
            var kd_detailpembeliantemp = $(this).attr("kd_detailpembeliantemp");
            var kd_barang = $(this).attr("kd_barang");
            var nama_barang = $(this).attr("nama_barang");
            var ijin_edar = $(this).attr("ijin_edar");
            var hna_std = $(this).attr("hna_std");
            var ED = $(this).attr("ED");
            var jumlah_pembelian = $(this).attr("jumlah_pembelian");
            // var nama_pelanggan = $($this).attr("data-kodepel");
            //var kd_pelanggan = "xxx";

            $('#kd_detailpembeliantemp').val(kd_detailpembeliantemp);
            $('#kd_barang').val(kd_barang);
            $('#nama_barang').val(nama_barang);
            $('#ijin_edar').val(ijin_edar);
            $('#hna_std').val(hna_std);
            $('#ED').val(ED);
            $('#jumlah_pembelian').val(jumlah_pembelian);
            // document.getElementById('tambahpaket1').id = 'editpaket1';
            var myElement = document.getElementById("tambahbarang1");
            myElement.textContent = "Edit";

            document.getElementById("kd_barang").readOnly = true;
            // window.alert(myElement.innerText);


        });
    });
</script>