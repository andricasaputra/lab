<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','lab_db');  // this one in error
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM input_permohonan WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($run_sql)){
        $id        =$row['id'];
        $no_permohonan        =$row['no_permohonan'];

    $tanggal_permohonan     =$row['tanggal_permohonan'];

$tanggal_acu_permohonan   =$row['tanggal_acu_permohonan'];

$nama_sampel        =$row['nama_sampel'];

$nama_ilmiah        =$row['nama_ilmiah'];

$jumlah_sampel        =$row['jumlah_sampel'];

$satuan           =$row['satuan'];

$bagian_tumbuhan      =$row['bagian_tumbuhan'];

$media            =$row['media'];

$vektor           =$row['vektor'];

$daerah_asal        =$row['daerah_asal'];

$nama_patogen       =$row['nama_patogen'];

$nama_patogen2        =$row['nama_patogen2'];

$nama_patogen3        =$row['nama_patogen3'];

$target_optk        =$row['target_optk'];

$target_optk2       =$row['target_optk2'];

$target_optk3       =$row['target_optk3'];

$metode_pengujian     =$row['metode_pengujian'];

$metode_pengujian2      =$row['metode_pengujian2'];

$metode_pengujian3      =$row['metode_pengujian3'];

$nama_pemilik       =$row['nama_pemilik'];

$alamat_pemilik       =$row['alamat_pemilik'];

$dokumen_pendukung      =$row['dokumen_pendukung'];

$pemohon          =$row['pemohon'];

$nip            =$row['nip'];
    }//end while
   
    ?>
<!--Edit Data--> 

            

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Permohonan <?php  var_dump($no_permohonan); ?></h4>

            </div>



        <div class="modal-body" id="modal-edit">

            <div id="responsive-form" class="clearfix">

        

            <form id="form_permohonan">

                

                    <div class="column-half">

                        <label class="control-label" for="no_permohonan">Nomor Permohonan</label>

                        <input type="hidden" name="id" id="id"  value="<?php echo $id;?>" >

                        <input type="text" name="no_permohonan" class="form-control" id="no_permohonan" value="<?php echo $no_permohonan;?>">

                    </div>

                            

                    <div class="column-half">

                        <label class="control-label" for="tanggal_permohonan">Tanggal</label>

                        <input type="text" name="tanggal_permohonan" class="form-control" id="tanggal_permohonan" required value="<?php echo $tanggal_permohonan;?>>

                        <input type="hidden" name="tanggal_acu_permohonan" id="tanggal_acu_permohonan" value="<?php echo $tanggal_acu_permohonan;?>> 

                    </div>

                            

                    <div class="column-half">

                        <label class="control-label" for="nama_sampel">Nama Sampel</label>

                        <select class="form-control" name="nama_sampel" id="nama_sampel" required>

                                <option></option>


                                    <option><?= $nama_sampel; ?></option>
                        </select>

                        

                    </div>

                        

                    <div class="column-half">

                        <label class="control-label" for="nama_ilmiah">Nama Ilmiah</label>

                    <em><select class="form-control" name="nama_ilmiah" id="nama_ilmiah">

                                <option></option>

                                <?php 

                                    $i = $objectData->tampil_ilmiah_tumbuhan();

                                    while ($t=$i->fetch_object()) : ?>?>

                                    <option><?=$t->nama_ilmiah_tumbuhan?></option>

                                <?php endwhile;?>

                        </select></em>

                    </div>

                        

                    <div class="column-seperempat">

                        <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                        <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel" required=>

                    </div>



                    <div class="column-seperempat">

                        <label class="control-label" for="satuan">Satuan</label>

                        <select class="form-control" name="satuan" id="satuan" required>

                              <option>Kantong Sampel</option>

                              <option>Spesimen</option>

                              <option>Batang</option>

                              <option>Lembar</option>

                              <option>Buah</option>

                        </select>

                    </div>  
                            

                    <div class="column-half">

                        <label class="control-label" for="bagian_tumbuhan">Bagian Tumbuhan</label>

                        <select class="form-control" name="bagian_tumbuhan" id="bagian_tumbuhan">

                                  <option></option>

                                  <option>Akar</option>

                                  <option>Batang</option>

                                  <option>Biji/Benih</option>

                                  <option>Buah</option>

                                  <option>Daun</option>

                                  <option>Umbi</option>

                                  <option>Preparat</option> 

                                  <option>Seluruh Bagian Tanaman</option>

                                  <option>Bagian Lain</option>

                        </select>

                    </div>          

            

                    <div class="column-half">

                        <label class="control-label" for="media">Media</label>

                        <input type="text" name="media" class="form-control" id="media" value="">

                    </div>

                    

                    <div class="column-half">

                        <label class="control-label" for="vektor">Vektor/Inang/Spesimen</label>

                        <select class="form-control" name="vektor" id="vektor">

                                  <option></option>

                                  <option>Serangga</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Preparat</option>

                        </select>

                    </div>

            

                    <div class="column-seperempat">

                        <label class="control-label" for="nama_patogen">Target OPTK </label>

                        <select class=" form-control "  name="nama_patogen" id="nama_patogen" required>

                                  <option ></option>

                                  <option>Bakteri</option>

                                  <option>Cendawan</option>

                                  <option>Fitoplasma</option>

                                  <option>Gulma</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Serangga</option>

                                  <option>Viroid</option>

                                  <option>Virus</option>

                        </select><br>

                        <select class=" form-control "  name="nama_patogen2" id="nama_patogen2">

                                  <option ></option>

                                  <option>Bakteri</option>

                                  <option>Cendawan</option>

                                  <option>Fitoplasma</option>

                                  <option>Gulma</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Serangga</option>

                                  <option>Viroid</option>

                                  <option>Virus</option>

                        </select><br>

                        <select class=" form-control "  name="nama_patogen3" id="nama_patogen3">

                                  <option ></option>

                                  <option>Bakteri</option>

                                  <option>Cendawan</option>

                                  <option>Fitoplasma</option>

                                  <option>Gulma</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Serangga</option>

                                  <option>Viroid</option>

                                  <option>Virus</option>

                        </select>

                    </div>



                    <div class="column-seperempat">

                        <label class="control-label" for="target_optk">Nama Latin</label>

                        <em><select class=" form-control"  name="target_optk" id="target_optk" required>

                                <option></option>

                                    <?php 

                                        $i = $objectData->tampil_patogen();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?>

                            </select></em><br>

                            <em><select class=" form-control"  name="target_optk2" id="target_optk2" >

                                <option></option>

                                    <?php 

                                        $i = $objectData->tampil_patogen();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?>   

                        </select></em><br>

                            <em><select class=" form-control"  name="target_optk3" id="target_optk3" >

                                <option></option>

                                    <?php 

                                        $i = $objectData->tampil_patogen();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?>               

                        </select></em>

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="metode_pengujian">Metode Pengujian </label>

                        <select class="form-control" name="metode_pengujian" id="metode_pengujian" required>

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                        </select><br>

                            <select class="form-control" name="metode_pengujian2" id="metode_pengujian2">

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                        </select><br>

                        <select class="form-control" name="metode_pengujian3" id="metode_pengujian3">

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                        </select>

                    </div>



                

                    <div class="column-half">

                        <label class="control-label" for="daerah_asal">Negara/ Daerah Asal</label>

                        <input type="text" name="daerah_asal" class="form-control" id="daerah_asal"  required="required">

                    </div>

                

        

                    <div class="column-half">

                        <label class="control-label" for="nama_pemilik">Nama Pemilik</label>

                        <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik"  required="required">

                    </div>

        

                    <div class="column-half">

                        <label class="control-label" for="alamat_pemilik">Alamat Pemilik</label>

                        <input type="text" name="alamat_pemilik" class="form-control" id="alamat_pemilik"  required="required">

                    </div>

        

                    <div class="column-half">

                        <label class="control-label" for="dokumen_pendukung">Dokumen Pendukung</label>

                        <input type="text" name="dokumen_pendukung" class="form-control" id="dokumen_pendukung" >

                    </div>

        

                    <div class="column-half">

                        <label class="control-label" for="pemohon">Pemohon</label>

                        <input type="text" name="pemohon" class="form-control" id="pemohon"  required="required">

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="nip">NIP</label>

                        <select class="form-control" name="nip" id="nip">

                            <option>-</option>

                            <optgroup label="Abdul Salam, SP "> 

                            <option>19690905 199903 1 001</option>

                            </optgroup>

                            <optgroup label="I Ketut Sindia "> 

                            <option>19740929 200112 1 002</option>

                            </optgroup>

                            <optgroup label="drh. Priono " selected> 

                            <option selected="selected">19811024 201101 1 008</option>

                            </optgroup>

                            <optgroup label="Andik Akrimil Fata "> 

                            <option>19820710 200901 1 007</option>

                            </optgroup>

                            <optgroup label="drh. Ardyanto Chandra Wijaya"> 

                            <option>19870724 201403 1 002</option>

                            </optgroup>

                            <optgroup label="Drs. Nur Rochim "> 

                            <option>19620916 198303 1 001</option>

                            </optgroup>

                            <optgroup label="Nyak Ben, SH "> 

                            <option>19600505 198303 1 004</option>

                            </optgroup>

                            <optgroup label="Hariyono, A.Md "> 

                            <option>19731231 200501 1 001</option>

                            </optgroup>

                        </select>

                    </div>

                </div>

                

                <div class="modal-footer" >

                    <div class="column-full button-bawah">

                        <?php

                            if(isset($_SESSION['loginsuperkt'])){ 

                        ?>

                        <button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Reset Data Akan menghilangkan Seluruh Data!!  Anda Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>Reset</button>

                        <?php } ?>

                        <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>Simpan</button> 

                    </div>      

                </div>

            </form>

          </div> 




<?php
}//end if ?>