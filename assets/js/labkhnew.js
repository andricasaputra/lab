$(document).ready(function (){

	$('#menu-toggle').on("click", function (){
		$("#side").animate({left: -250}, 400), 
		$('#page-wrapper').animate({left: -250}, 400), 
		$("#menu-toggle").animate({left: -300}, 200), 
		$('#menu-toggle2').animate({left: -122}, 430),
		$(this).css("display", "none"),
		$("#menu-toggle2").css("display", "block")
	});

	$('#menu-toggle2').on('click', function (){
		$("#side").animate({left: 0}, 400), 
		$('#page-wrapper').animate({left: 0}, 400), 
		$("#menu-toggle").animate({left: 0}, 450), 
		$('#menu-toggle2').animate({left: 0}, 700)
		$(this).css("display", "none"),
		$("#menu-toggle").css("display", "block")
	});

	$('.input-daterange').datepicker({
		  todayBtn:'linked',
		  format: "yyyy-mm-dd",
		  autoclose: true
	});

	$('#datatables').DataTable();

	/*Untuk Tabel Input Hasil Pengujian*/

 	$('#datatables2').DataTable({

 		"bLengthChange" : false,
	    "paging": false,
	    "searching": false,
	    "ordering": false,
	    "lengthChange": false,
	    "oLanguage": {
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": " _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    }

 	});

	/*TABEL LIHAT SEMUA DATA*/

	$('#datapermohonan_kh').DataTable({

		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataPermohonan_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_permohonan"},
			{"data" : "nama_sampel"},
			{"data" : "jumlah_sampel"},
			{"data" : "no_sampel_awal"},
			{"data" : "nama_sampel"},
			{"data" : "produk_hewan"},
			{"data" : "metode_pengujian"},
			{"data" : "biaya_pengujian"},
			{"data" : "waktu_pengambilan_sampel"},
			{"data" : "area_asal"},
			{"data" : "cara_pengambilan_sampel"},
			{"data" : "target_pengujian2"},
			{"data" : "lama_pengujian"},
			{"data" : "nama_pemilik"},
			{"data" : "alamat_pemilik"},
			{"data" : "pemohon"},
			{"data" : "nip_pemohon"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});	

	 $('#datapenerimasampel_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataTandaTerimaSampel_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_diterima"},
			{"data" : "cara_pengiriman"},
			{"data" : "pengantar"},
			{"data" : "nama_pemilik"},
			{"data" : "alamat_pemilik"},
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "jumlah_sampel"},
			{"data" : "jumlah_kontainer"},
			{"data" : "target_pengujian2"},
			{"data" : "metode_pengujian"},
			{"data" : "lama_pengujian"},
			{"data" : "penerima_sampel"},
			{"data" : "nip_penerima_sampel"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});	

	$('#dataperminkesiapan_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataPerminKesiapanPengujian_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_diterima"},
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "jumlah_sampel"},
			{"data" : "target_pengujian2"},
			{"data" : "kode_sampel"},
			{"data" : "ma"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});	


	$('#datarespon_kh').DataTable({

		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataResponPengujian_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "tanggal_permohonan"},
			{"data" : "kode_sampel"},
			{"data" : "nama_sampel"},
			{"data" : "target_pengujian2" },
			{"data" : "metode_pengujian"},
			{"data" : "penyelia"},
			{"data" : "analis"},
			{"data" : "bahan"},
			{"data" : "alat"},
			{"data" : "mt"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datakesiapan_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataKesiapan_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "tanggal_permohonan"},	
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "jumlah_sampel"},
			{"data" : "target_pengujian2"},
			{"data" : "kondisi_sampel"},
			{"data" : "mt"},
			{"data" : "nip_mt"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datapenyerahan_sampel_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataPenyerahan_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_permohonan"},	
			{"data" : "tanggal_penyerahan"},
			{"data" : "kode_sampel"},
			{"data" : "nama_sampel"},
			{"data" : "target_pengujian2"},
			{"data" : "metode_pengujian"},
			{"data" : "jenis_sampel"},
			{"data" : "yang_menyerahkan"},
			{"data" : "yang_menerima"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datapenugasan_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataPenugasan_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_penunjukan"},	
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "jumlah_sampel"},
			{"data" : "target_pengujian2"},
			{"data" : "nama_penyelia"},
			{"data" : "nama_analis"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$("#view_data_surattugas_kh").on("click",(function(){

		$.ajax({url: "lab_bakteri/views/data_kh/Dataprintsurattugas_kh.php"}).done(function( html ) {
		$("#Showprintpenugasan_kh").empty();
	    $("#Showprintpenugasan_kh").append(html);

		});

	}));

	$('#datapengelola_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataDistribusiSampeel_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_penunjukan"},	
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "jumlah_sampel"},
			{"data"	: "target_pengujian2"},
			{"data" : "yang_menyerahkanlab"},
			{"data" : "yang_menerimalab"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datateknis_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDataTeknis_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_pengujian"},	
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "jumlah_sampel"},
			{"data" : "target_pengujian2"},
			{"data" : "nama_penyelia"},
			{"data" : "nama_analis"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datapengujian_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDatapengujian_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_sertifikat"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_pengujian"},	
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "target_pengujian2"},
			{"data" : "kepala_plh"},
			{"data" : "nip_kepala_plh"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datalhu_kh').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },

		"ajax" : "lab_bakteri/views/data_kh/SourceDatalhu_kh.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_lhu"},	
			{"data" : "nama_sampel"},
			{"data" : "bagian_hewan"},
			{"data" : "no_lhu"},
			{"data" : "no_agenda"},
			{"data" : "kepala_plh2"},
			{"data" : "nip_kepala_plh2"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	/*END TABEL LIHAT SEMUA DATA*/

	/*Laboratorium Karantina Hewan*/

 	/*Tabel Data Permohonan*/

 	fetch_data_permohonan_kh('no');

	 function fetch_data_permohonan_kh(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_permohonan_kh = $('#tb_permohonan_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_permohonan_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_permohonan_kh', function(){

	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_permohonan_kh').DataTable().destroy();

		   fetch_data_permohonan_kh('yes', start_date, end_date, choice);

		   $('#search_permohonan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permohonan_kh').DataTable().destroy();

		   		fetch_data_permohonan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permohonan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_permohonan_kh').DataTable().destroy();

		   fetch_data_permohonan_kh('nodate', start_date, end_date, choice);

		   $('#search_permohonan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permohonan_kh').DataTable().destroy();

		   		fetch_data_permohonan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permohonan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 }); 


    /*Input Data*/

     $('#tombol_input_permohonan_kh').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/inputdata_permohonan_kh.php", function(data) {

        	$("#content-data_input_permohonan_kh").html(data);

        	$("#modal_input_permohonan_kh").modal('show');

        });
    });

     /*Edit Permohonan*/

    $('#tb_permohonan_kh').on('click','#tombol_edit_permohonan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_permohonan_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_permohonan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_permohonan_kh').html('');
            $('#content-data_permohonan_kh').html(data);
        }).fail(function(){
            $('#content-data_permohonan_kh').html('<p>Error</p>');
        });
    });

    $('#tb_permohonan_kh').on("click", "#hapus_kh", function(){

    	return confirm("Yakin Ingin Hapus Data Ini?");


    });

    /*Tabel Data Penerima Sampel*/

    fetch_data_penerima_sampel_kh('no');

	 function fetch_data_penerima_sampel_kh(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_penerima_sampel_kh = $('#tb_penerima_sampel_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_penerima_sampel_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_penerima_sampel_kh', function(){

	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_penerima_sampel_kh').DataTable().destroy();

		   fetch_data_penerima_sampel_kh('yes', start_date, end_date, choice);

		   $('#search_penerima_sampel_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penerima_sampel_kh').DataTable().destroy();

		   		fetch_data_penerima_sampel_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penerima_sampel_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_penerima_sampel_kh').DataTable().destroy();

		   fetch_data_penerima_sampel_kh('nodate', start_date, end_date, choice);

		   $('#search_penerima_sampel_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penerima_sampel_kh').DataTable().destroy();

		   		fetch_data_penerima_sampel_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penerima_sampel_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 }); 

    /*input*/
    
    $('#tb_penerima_sampel_kh').on('click','#tombol_input_penerima_sampel_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_penerima_sampel_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_penerima_sampel_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_penerima_sampel_kh').html('');
            $('#content-data_input_penerima_sampel_kh').html(data);
        }).fail(function(){
            $('#content-data_input_penerima_sampel_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_penerimaan_sampel').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_penerima_sampel_kh.php", function(data) {

        	$("#content-data_input_multi_penerima_sampel_kh").html(data);

        	$("#modal_input_multi_penerima_sampel_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_penerima_sampel_kh').on('click','#tombol_edit_penerima_sampel_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_penerima_sampel_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_penerima_sampel_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_penerima_sampel_kh').html('');
            $('#content-data_edit_penerima_sampel_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_penerima_sampel_kh').html('<p>Error</p>');
        });
    });

    /*End Table Penerima Sampel*/

    /*Tabel Permintaan kesiapan Pengujian*/

    fetch_data_permintaan_kesiapan_kh('no');

	 function fetch_data_permintaan_kesiapan_kh(is_date_search, start_date='', end_date='', choice='')
	 {
	    let dataTable_permintaan_kesiapan_kh = $('#tb_permintaan_kesiapan_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_permintaan_kesiapan_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_permintaan_kesiapan_kh', function(){

	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_permintaan_kesiapan_kh').DataTable().destroy();

		   fetch_data_permintaan_kesiapan_kh('yes', start_date, end_date, choice);

		   $('#search_permintaan_kesiapan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permintaan_kesiapan_kh').DataTable().destroy();

		   		fetch_data_permintaan_kesiapan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permintaan_kesiapan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_permintaan_kesiapan_kh').DataTable().destroy();

		   fetch_data_permintaan_kesiapan_kh('nodate', start_date, end_date, choice);

		   $('#search_permintaan_kesiapan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permintaan_kesiapan_kh').DataTable().destroy();

		   		fetch_data_permintaan_kesiapan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permintaan_kesiapan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 }); 


    /*input*/
    
    $('#tb_permintaan_kesiapan_kh').on('click','#tombol_input_permintaan_kesiapan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_permintaan_kesiapan_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_permintaan_kesiapan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_permintaan_kesiapan_kh').html('');
            $('#content-data_input_permintaan_kesiapan_kh').html(data);
        }).fail(function(){
            $('#content-data_input_permintaan_kesiapan_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_permintaan_kesiapan_pengujian').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_permintaan_kesiapan_kh.php", function(data) {

        	$("#content-data_input_multi_permintaan_kesiapan_pengujian_kh").html(data);

        	$("#modal_input_multi_permintaan_kesiapan_pengujian_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_permintaan_kesiapan_kh').on('click','#tombol_edit_permintaan_kesiapan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_permintaan_kesiapan_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_permintaan_kesiapan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_permintaan_kesiapan_kh').html('');
            $('#content-data_edit_permintaan_kesiapan_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_permintaan_kesiapan_kh').html('<p>Error</p>');
        });
    });

    /*End Tabel Permintaan Kesiapan*/

    /*Tabel Respon Permohonan*/

    fetch_data_respon_permohonan_kh('no');

	 function fetch_data_respon_permohonan_kh(is_date_search, start_date='', end_date='', choice= '')
	 {
	   let dataTable_respon_permohonan_kh = $('#tb_respon_permohonan_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_respon_permohonan_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_respon_permohonan_kh', function(){

	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_respon_permohonan_kh').DataTable().destroy();

		   fetch_data_respon_permohonan_kh('yes', start_date, end_date, choice);

		   $('#search_respon_permohonan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_respon_permohonan_kh').DataTable().destroy();

		   		fetch_data_respon_permohonan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_respon_permohonan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_respon_permohonan_kh').DataTable().destroy();

		   fetch_data_respon_permohonan_kh('nodate', start_date, end_date, choice);

		   $('#search_respon_permohonan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_respon_permohonan_kh').DataTable().destroy();

		   		fetch_data_respon_permohonan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_respon_permohonan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 }); 

    /*input*/
    
    $('#tb_respon_permohonan_kh').on('click','#tombol_input_respon_permohonan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_respon_permohonan_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_respon_permohonan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_respon_permohonan_kh').html('');
            $('#content-data_input_respon_permohonan_kh').html(data);
        }).fail(function(){
            $('#content-data_input_respon_permohonan_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_respon_permohonan').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_respon_permohonan_kh.php", function(data) {

        	$("#content-data_input_multi_respon_permohonan_kh").html(data);

        	$("#modal_input_multi_respon_permohonan_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_respon_permohonan_kh').on('click','#tombol_edit_respon_permohonan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_respon_permohonan_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_respon_permohonan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_respon_permohonan_kh').html('');
            $('#content-data_edit_respon_permohonan_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_respon_permohonan_kh').html('<p>Error</p>');
        });
    });

    /*End Tabel Respon*/

    /*Tabel Penyerahan Sampel*/

    fetch_data_penyerahan_sampel_kh('no');

	 function fetch_data_penyerahan_sampel_kh(is_date_search, start_date='', end_date='', choice ='')
	 {
	   let dataTable_penyerahan_sampel_kh = $('#tb_penyerahan_sampel_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_penyerahan_sampel_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_penyerahan_sampel_kh', function(){

	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_penyerahan_sampel_kh').DataTable().destroy();

		   fetch_data_penyerahan_sampel_kh('yes', start_date, end_date, choice);

		   $('#search_penyerahan_sampel_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penyerahan_sampel_kh').DataTable().destroy();

		   		fetch_data_penyerahan_sampel_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penyerahan_sampel_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});
		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_penyerahan_sampel_kh').DataTable().destroy();

		   fetch_data_penyerahan_sampel_kh('nodate', start_date, end_date, choice);

		   $('#search_penyerahan_sampel_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penyerahan_sampel_kh').DataTable().destroy();

		   		fetch_data_penyerahan_sampel_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penyerahan_sampel_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});
		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 }); 

    /*input*/
    
    $('#tb_penyerahan_sampel_kh').on('click','#tombol_input_penyerahan_sampel_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_penyerahan_sampel_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_penyerahan_sampel_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_penyerahan_sampel_kh').html('');
            $('#content-data_input_penyerahan_sampel_kh').html(data);
        }).fail(function(){
            $('#content-data_input_penyerahan_sampel_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_penyerahan_sampel').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_penyerahan_sampel_kh.php", function(data) {

        	$("#content-data_input_multi_penyerahan_sampel_kh").html(data);

        	$("#modal_input_multi_penyerahan_sampel_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_penyerahan_sampel_kh').on('click','#tombol_edit_penyerahan_sampel_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_penyerahan_sampel_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_penyerahan_sampel_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_penyerahan_sampel_kh').html('');
            $('#content-data_edit_penyerahan_sampel_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_penyerahan_sampel_kh').html('<p>Error</p>');
        });
    });

    /*End Tabel Permintaan Kesiapan*/

    /*Bagian Manajer Teknis*/

    /*Tabel Kesiapan Pengujian*/


    fetch_data_kesiapan_pengujian_kh('no');

    function fetch_data_kesiapan_pengujian_kh(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_kesiapan_pengujian_kh = $('#tb_kesiapan_pengujian_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_kesiapan_pengujian_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_kesiapan_pengujian_kh', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_kesiapan_pengujian_kh').DataTable().destroy();

		   fetch_data_kesiapan_pengujian_kh('yes', start_date, end_date, choice);

		   $('#search_kesiapan_pengujian_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_kesiapan_pengujian_kh').DataTable().destroy();

		   		fetch_data_kesiapan_pengujian_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_kesiapan_pengujian_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_kesiapan_pengujian_kh').DataTable().destroy();

		   fetch_data_kesiapan_pengujian_kh('nodate', start_date, end_date, choice);

		   $('#search_kesiapan_pengujian_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_kesiapan_pengujian_kh').DataTable().destroy();

		   		fetch_data_kesiapan_pengujian_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_kesiapan_pengujian_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 });

    /*input*/
    
    $('#tb_kesiapan_pengujian_kh').on('click','#tombol_input_kesiapan_pengujian_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_kesiapan_pengujian_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_kesiapan_pengujian_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_kesiapan_pengujian_kh').html('');
            $('#content-data_input_kesiapan_pengujian_kh').html(data);
        }).fail(function(){
            $('#content-data_input_kesiapan_pengujian_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_kesiapan_pengujian').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_kesiapan_pengujian_kh.php", function(data) {

        	$("#content-data_input_multi_kesiapan_pengujian_kh").html(data);

        	$("#modal_input_multi_kesiapan_pengujian_kh").modal('show');

        });
    });


    /*Edit*/

    $('#tb_kesiapan_pengujian_kh').on('click','#tombol_edit_kesiapan_pengujian_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_kesiapan_pengujian_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_kesiapan_pengujian_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_kesiapan_pengujian_kh').html('');
            $('#content-data_edit_kesiapan_pengujian_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_kesiapan_pengujian_kh').html('<p>Error</p>');
        });
    });

    /*End Tabel Permintaan Kesiapan*/

     /*Tabel Usulan Penunjukan Penyelia/Analis & Surat Tugas*/

    fetch_data_usulan_penunjukan_kh('no');

    function fetch_data_usulan_penunjukan_kh(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_usulan_penunjukan_kh = $('#tb_usulan_penunjukan_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_usulan_penunjukan_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_usulan_penunjukan_kh', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_usulan_penunjukan_kh').DataTable().destroy();

		   fetch_data_usulan_penunjukan_kh('yes', start_date, end_date, choice);

		   $('#search_usulan_penunjukan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_usulan_penunjukan_kh').DataTable().destroy();

		   		fetch_data_usulan_penunjukan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_usulan_penunjukan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_usulan_penunjukan_kh').DataTable().destroy();

		   fetch_data_usulan_penunjukan_kh('nodate', start_date, end_date, choice);

		   $('#search_usulan_penunjukan_kh').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_usulan_penunjukan_kh').DataTable().destroy();

		   		fetch_data_usulan_penunjukan_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_usulan_penunjukan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 });

    /*input*/
    
    $('#tb_usulan_penunjukan_kh').on('click','#tombol_input_usulan_penunjukan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_usulan_penunjukan_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_usulan_penunjukan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_usulan_penunjukan_kh').html('');
            $('#content-data_input_usulan_penunjukan_kh').html(data);
            /*console.log(data)*/
        }).fail(function(){
            $('#content-data_input_usulan_penunjukan_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_usulan_penunjukan').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_usulan_penunjukan_kh.php", function(data) {

        	$("#content-data_input_multi_usulan_penunjukan_kh").html(data);

        	$("#modal_input_multi_usulan_penunjukan_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_usulan_penunjukan_kh').on('click','#tombol_edit_usulan_penunjukan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_usulan_penunjukan_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_usulan_penunjukan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_usulan_penunjukan_kh').html('');
            $('#content-data_edit_usulan_penunjukan_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_usulan_penunjukan_kh').html('<p>Error</p>');
        });
    });

    /* End Tabel Usulan Penunjukan Penyelia/Analis & Surat Tugas*/

    /*Tabel Pengelola Sampel or Distribusi Sampel*/

    fetch_data_pengelola_sampel_kh('no');

    function fetch_data_pengelola_sampel_kh(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_pengelola_sampel_kh = $('#tb_pengelola_sampel_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_pengelola_sampel_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_pengelola_sampel_kh', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_pengelola_sampel_kh').DataTable().destroy();

		   fetch_data_pengelola_sampel_kh('yes', start_date, end_date,choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_pengelola_sampel_kh').DataTable().destroy();

		   		fetch_data_pengelola_sampel_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_pengelola_sampel_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_pengelola_sampel_kh').DataTable().destroy();

		   fetch_data_pengelola_sampel_kh('nodate', start_date, end_date,choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_pengelola_sampel_kh').DataTable().destroy();

		   		fetch_data_pengelola_sampel_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_pengelola_sampel_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 });

	 /*input*/
    
    $('#tb_pengelola_sampel_kh').on('click','#tombol_input_pengelola_sampel_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_pengelola_sampel_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_pengelola_sampel_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_pengelola_sampel_kh').html('');
            $('#content-data_input_pengelola_sampel_kh').html(data);
        }).fail(function(){
            $('#content-data_input_pengelola_sampel_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_pengelola_sampel').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_pengelola_sampel_kh.php", function(data) {

        	$("#content-data_input_multi_pengelola_sampel_kh").html(data);

        	$("#modal_input_multi_pengelola_sampel_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_pengelola_sampel_kh').on('click','#tombol_edit_pengelola_sampel_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_pengelola_sampel_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_pengelola_sampel_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_pengelola_sampel_kh').html('');
            $('#content-data_edit_pengelola_sampel_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_pengelola_sampel_kh').html('<p>Error</p>');
        });
    });

    /*Tabel Data Teknis*/

    fetch_data_data_teknis_kh('no');

    function fetch_data_data_teknis_kh(is_date_search, start_date='', end_date='', choice='')
	 {
	   let dataTable_data_teknis_kh = $('#tb_data_teknis_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": "",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_data_teknis_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_data_teknis_kh', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_data_teknis_kh').DataTable().destroy();

		   fetch_data_data_teknis_kh('yes', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_data_teknis_kh').DataTable().destroy();

		   		fetch_data_data_teknis_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_data_teknis_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_data_teknis_kh').DataTable().destroy();

		   fetch_data_data_teknis_kh('nodate', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_data_teknis_kh').DataTable().destroy();

		   		fetch_data_data_teknis_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_data_teknis_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 });


    /*input*/
    
    $('#tb_data_teknis_kh').on('click','#tombol_input_data_teknis_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_data_teknis_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_data_teknis_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_data_teknis_kh').html('');
            $('#content-data_input_data_teknis_kh').html(data);
        }).fail(function(){
            $('#content-data_input_data_teknis_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_data_teknis').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_data_teknis_kh.php", function(data) {

        	$("#content-data_input_multi_data_teknis_kh").html(data);

        	$("#modal_input_multi_data_teknis_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_data_teknis_kh').on('click','#tombol_edit_data_teknis_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_data_teknis_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_data_teknis_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_data_teknis_kh').html('');
            $('#content-data_edit_data_teknis_kh').html(data); 
        }).fail(function(){
            $('#content-data_edit_data_teknis_kh').html('<p>Error</p>');
        });
    });

    /* End Tabel Data Teknis*/

    /*Tabel Hasil Pengujian*/

    fetch_data_hasil_pengujian_kh('no');

    function fetch_data_hasil_pengujian_kh(is_date_search, start_date='', end_date='', choice='')
	 {
	   let dataTable_hasil_pengujian_kh = $('#tb_hasil_pengujian_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": "",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_hasil_pengujian_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_hasil_pengujian_kh', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_hasil_pengujian_kh').DataTable().destroy();

		   fetch_data_hasil_pengujian_kh('yes', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_hasil_pengujian_kh').DataTable().destroy();

		   		fetch_data_hasil_pengujian_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_hasil_pengujian_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date == '' && choice !='')
		  {
		   $('#tb_hasil_pengujian_kh').DataTable().destroy();

		   fetch_data_hasil_pengujian_kh('nodate', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_hasil_pengujian_kh').DataTable().destroy();

		   		fetch_data_hasil_pengujian_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_hasil_pengujian_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 });


    /*input*/
    
    $('#tb_hasil_pengujian_kh').on('click','#tombol_input_hasil_pengujian_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_hasil_pengujian_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_hasil_pengujian_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_hasil_pengujian_kh').html('');
            $('#content-data_input_hasil_pengujian_kh').html(data);
        }).fail(function(){
            $('#content-data_input_hasil_pengujian_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_hasil_pengujian').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_hasil_pengujian_kh.php", function(data) {

        	$("#content-data_input_multi_hasil_pengujian_kh").html(data);

        	$("#modal_input_multi_hasil_pengujian_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_hasil_pengujian_kh').on('click','#tombol_edit_hasil_pengujian_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_hasil_pengujian_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_hasil_pengujian_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_hasil_pengujian_kh').html('');
            $('#content-data_edit_hasil_pengujian_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_hasil_pengujian_kh').html('<p>Error</p>');
        });
    });

    /* End Tabel Hasil Pengujian*/

    /*Tabel LHU*/

    fetch_data_lhu_kh('no');

    function fetch_data_lhu_kh(is_date_search, start_date='', end_date='', choice='')
	 {
	   let dataTable_lhu_kh = $('#tb_lhu_kh').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sInfoFiltered": "",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
	   "processing" : true,
	   "serverSide" : true,
	   "order" : [],
	   "ajax" : {
	    url:"lab_bakteri/views/data_kh/sumber_data_lhu_kh.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_lhu_kh', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_lhu_kh').DataTable().destroy();

		   fetch_data_lhu_kh('yes', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_lhu_kh').DataTable().destroy();

		   		fetch_data_lhu_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_lhu_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_lhu_kh').DataTable().destroy();

		   fetch_data_lhu_kh('nodate', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_lhu_kh').DataTable().destroy();

		   		fetch_data_lhu_kh('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_lhu_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else
		  {
		   swal({

	            title: "",

	            text: "Pilih Tanggal Atau Kategori Sortir",

	            type: "info"

	        });
		  }
	 });

    /*input*/
    
    $('#tb_lhu_kh').on('click','#tombol_input_lhu_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_lhu_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/input_kh/inputdata_lhu_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_lhu_kh').html('');
            $('#content-data_input_lhu_kh').html(data);
        }).fail(function(){
            $('#content-data_input_lhu_kh').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_lhu').click(function(e){

        e.preventDefault();

        $.post("lab_bakteri/views/input_kh/input_multi_kh/inputmultidata_lhu_kh.php", function(data) {

        	$("#content-data_input_multi_lhu_kh").html(data);

        	$("#modal_input_multi_lhu_kh").modal('show');

        });
    });

    /*Edit*/

    $('#tb_lhu_kh').on('click','#tombol_edit_lhu_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_lhu_kh').html('');
        $.ajax({
            url:'lab_bakteri/views/edit_kh/editdata_lhu_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_lhu_kh').html('');
            $('#content-data_edit_lhu_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_lhu_kh').html('<p>Error</p>');
        });
    });

    /* End Tabel LHU*/

    /*Tabel database_hewan*/

    let dataTable_database_hewan = $('#tb_database_hewan').DataTable({
    	"dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 10,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"database/views/data_kh/sumber_data_database_hewan.php",
            type:"POST"
        }
    });


    /*Edit*/

    $(document).on('click','#tombol_edit_database_hewan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_database_hewan').html('');
        $.ajax({
            url:'database/views/edit_kh/editdata_database_hewan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_database_hewan').html('');
            $('#content-data_edit_database_hewan').html(data);
        }).fail(function(){
            $('#content-data_edit_database_hewan').html('<p>Error</p>');
        });
    });

    $(document).on("click", "#hapus_database_hewan", function(){

    	return confirm("Yakin Ingin Hapus Data Ini?");


    });

    /* End Tabel database_tumbuhan*/

    /*Tabel database_patogen_kh*/

    let dataTable_database_patogen_kh = $('#tb_database_patogen_kh').DataTable({
    	"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 15,
	    "bLengthChange": false,
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"database/views/data_kh/sumber_data_database_patogen_kh.php",
            type:"POST"
        }
    });


    /*Edit*/

    $(document).on('click','#tombol_edit_database_patogen_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_database_patogen_kh').html('');
        $.ajax({
            url:'database/views/edit_kh/editdata_database_patogen_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_database_patogen_kh').html('');
            $('#content-data_edit_database_patogen_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_database_patogen_kh').html('<p>Error</p>');
        });
    });

    $(document).on("click", "#hapus_database_patogen_kh", function(){

    	return confirm("Yakin Ingin Hapus Data Ini?");


    });

    /* End Tabel database_patogen*/

    /*Tabel nama_pelanggan_kh*/

    let dataTable_pelanggan_kh = $('#tb_database_pelanggan_kh').DataTable({
    	"dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 15,
	    "pageLength": 10,
	    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"database/views/data_kh/sumber_data_database_pelanggan_kh.php",
            type:"POST"
        }
    });


    /*Edit*/

    $(document).on('click','#tombol_edit_database_pelanggan_kh',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_database_pelanggan_kh').html('');
        $.ajax({
            url:'database/views/edit_kh/editdata_database_pelanggan_kh.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_database_pelanggan_kh').html('');
            $('#content-data_edit_database_pelanggan_kh').html(data);
        }).fail(function(){
            $('#content-data_edit_database_pelanggan_kh').html('<p>Error</p>');
        });
    });

    $(document).on("click", "#hapus_database_pelanggan_kh", function(){

    	return confirm("Yakin Ingin Hapus Data Ini?");


    });

    /* End Tabel database_patogen*/

    /*Tabel lihat data permohonan*/

    let dataTable_lihat_data_permohonan_kh = $('#tb_lihat_data_permohonan_kh').DataTable({
    	"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 15,
	    "pageLength": 15,
	    "lengthMenu": [ [15, 25, 50, -1], [15, 25, 50, "All"] ],
	    "pagingType": "numbers_no_ellipses",	
	    "oLanguage": {
	    	"sProcessing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br/>Loading....',
	    	"sInfoFiltered": " - difilter dari _MAX_ data",
	    	"sSearch": "Cari:",
	    	"sLengthMenu": "Lihat _MENU_ Data",
	    	"sInfo": "_START_ s/d _END_ dari _TOTAL_ data",
	    	"sEmptyTable": "Data Masih Kosong",
	    	"sZeroRecords": "Data Tidak Ditemukan",
		      "oPaginate": {
		        "sNext": "Next",
		        "sPrevious": "Back"    
	      }
	    },
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"lab_bakteri/views/data_kh/sumber_data_lihat_data_permohonan_kh.php",
            type:"POST"
        }
    });


})/*End Ready Function*/