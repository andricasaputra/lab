<!-- Tambahkan div id=nm_sampel jika dipakai (autocomplete) -->

<script>

$(document).ready(function(){

$('#nama_sampel').keyup(function(){

var query = $(this). val ();

if(query!='')

{

$.ajax({

url:"models/search.php",

method:"POST",

data:{query:query},

success:function(data)

{

$('#nm_smpl').fadeIn();

$('#nm_smpl').html(data);

}

});

}

});

$(document). on('click', 'li', function(){

$('#nama_sampel').val($(this).text());

$('#nm_smpl').fadeOut();

});

});

</script> 





<script >



$('.selectpicker').selectpicker({

style: 'color: white',

size: 4

});



</script>



<script type="text/javascript">

$(function() {

$('.multiselect-ui').multiselect({

includeSelectAllOption: true

});

});

</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css" rel="stylesheet">