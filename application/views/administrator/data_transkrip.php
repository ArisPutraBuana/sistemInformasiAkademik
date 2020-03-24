<div class="container-fluid">
    <center>
        <legend><strong>TRANSKRIP NILAI</strong></legend>
        <table>
            <tr>
                <td>NIM</td>
                <td> : <?= $nim; ?></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td> : <?= $nama; ?></td>
            </tr>
            <tr>
                <td>PROGRAM STUDI</td>
                <td> : <?= $prodi; ?></td>
            </tr>
        </table>
    </center>

    <table class="table table-bordered table-striped table-hover mt-3">
        <tr>
            <th class="text-center">NO</th>
            <th>KODE MATAK KULIAH</th>
            <th>NAMA MATA KULIAH</th>
            <th class="text-center">SKS</th>
            <th class="text-center">NILAI</th>
            <th class="text-center">SKOR</th>
        </tr>
            <?php 
                $no = 1;
                $jSks = 0;
                $jSkor = 0;

                foreach ($transkrip as $tr) : ?>
                    <tr>
                        <td class="text-center"><?= $no; ?></td>
                        <td><?= $tr->kode_matakuliah; ?></td>
                        <td><?= $tr->nama_matakuliah; ?></td>
                        <td class="text-center"><?= $tr->sks; ?></td>
                        <td class="text-center"><?= $tr->nilai; ?></td>
                        <td class="text-center"><?= skorNilai($tr->nilai, $tr->sks); ?></td>
                        <?php 
                            $jSks+=$tr->sks;
                            $jSkor+=skorNilai($tr->nilai, $tr->sks);
                        ?>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="text-center">JUMLAH</td>
                    <td class="text-center"><?= $jSks; ?></td>
                    <td></td>
                    <td class="text-center"><?= $jSkor; ?></td>
                </tr>

    </table>

    <p class="text-center ml-2">Indeks Presentasi Kumulatif : <?= number_format($jSkor/$jSks,2); ?></p>

</div>