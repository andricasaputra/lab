<?php

use Lab\config\Database;

require_once ('../vendor/autoload.php');

$connection = Database::getInstance();
$connect = $connection->getConnection();
$get_all_table_query = "SHOW TABLES";
$statement = $connect->query($get_all_table_query);
while($result = $statement->fetch_row()){
  $tables[] = $result;
}



if(isset($_POST['table']))
{

  $tablename = $_POST['table'];
  $judul = $connect->real_escape_string($_POST['judul']);
  @$data = $_POST['structure_data'];
  @$struc = $_POST['structure_only'];

  if ($data === null) {
      
      $values =  $_POST['structure_only'];

  }else{

    $values =  $_POST['structure_data'];
  }

  Database::setExportTables($_POST['table'], $judul, $values);
}

?>
<div class="col-md-6 col-md-offset-3" style="margin-top: 50px">
    <h2 align="center">Backup Database</h2>
    <br />
    <form method="post" id="export_form">
     <h3>Pilih Table Untuk Di Export</h3>
     <label for="judul">Nama File Backup</label>
     <input type="text" name="judul" class="form-control">
     <div class="checkbox">
      <input type="checkbox" name="all" id="checkall"><b>Check All</b>
     </div>
    <?php
    foreach($tables as $table)
    {
      if ($table[0] == 'user' || $table[0] == 'user_kh') {
        $table = '';
      }else{
        $table = $table[0];
      }
    ?>
    <div class="checkbox">
      <label ><input type="checkbox" class="cb-element checkbox_table" name="table[]" value="<?php echo $table; ?>"/> <?php echo $table; ?></label>
    </div>
    <?php
    }
    ?>
     
     <div class="checkbox">
      <input type="checkbox" name="structure_data" id="data" checked value="structure_data"><b>structure & data</b>
     </div>
     <div class="checkbox">
      <input type="checkbox" name="structure_only" id="struc" disabled value="structure_only"><b>Structure only</b>
     </div>
     <br/>
     <div class="form-group">
      <input type="submit" name="submit" id="submit" class="btn btn-info" value="Export" />
     </div>
    </form>
  </div>

<script>
$(document).ready(function(){
   $('#submit').click(function(){
    var count = 0;
    $('.checkbox_table').each(function(){
     if($(this).is(':checked'))
     {
      count = count + 1;
     }
    });
    if(count > 0)
    {
     $('#export_form').submit();
    }
    else
    {
     alert("Pilih Setidaknya 1 Tabel Untuk Di Ekspor");
     return false;
    }
    
   });

   $('#checkall').change(function () {
      $('.cb-element').prop('checked',this.checked);
   });

   $('.cb-element').change(function () {
     if ($('.cb-element:checked').length == $('.cb-element').length){
      $('#checkall').prop('checked',true);
     }
     else {
      $('#checkall').prop('checked',false);
     }
   });

   $('#data').change(function () {
    if (this.checked) {
      $('#struc').prop('disabled',true);
    }else{
       $('#struc').prop('disabled',false);
    } 
   });

   $('#struc').change(function () {
    if (this.checked) {
      $('#data').prop('disabled',true);
    }else{
       $('#data').prop('disabled',false);
    } 
   });

});/*End Ready*/
</script>

