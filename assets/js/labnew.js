 $(document).ready(function () {

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

	$("#hilangkan").on("click",(function(){

		$("#wrapper").remove();

	}));

	/*KARANTINA TUMBUHAN
	*
	*
	*
	*
	*LABORATORIUM*/

	$('#datapermohonan').DataTable({

		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataPermohonan.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_permohonan"},
			{"data" : "nama_sampel"},
			{"data" : "nama_ilmiah"},
			{"data" : "jumlah_sampel"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "media"},
			{"data" : "vektor"},
			{"data" : "daerah_asal"},
			{"data" : "nama_patogen"},
			{"data" : "target_optk"},
			{"data" : "metode_pengujian"},
			{"data" : "nama_pemilik"},
			{"data" : "alamat_pemilik"},
			{"data" : "dokumen_pendukung"},
			{"data" : "pemohon"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});	

	$('#datapenerimasampel').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataTandaTerimaSampel.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_diterima"},
			{"data" : "cara_pengiriman"},
			{"data" : "pengantar"},
			{"data" : "nama_pemilik"},
			{"data" : "alamat_pemilik"},
			{"data" : "nama_sampel"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "jumlah_sampel"},
			{"data" : "jumlah_kontainer"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "metode_pengujian"},
			{"data" : "lama_pengujian"},
			{"data" : "penerima_sampel"},
			{"data" : "nip_penerima_sampel"},

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});	

	$('#dataperminkesiapan').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataPerminKesiapanPengujian.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_diterima"},
			{"data" : "cara_pengiriman"},
			{"data" : "nama_sampel"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "jumlah_sampel"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "kode_sampel"},
			{"data" : "ma"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});	
	
	$('#datarespon').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataResponPengujian.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "tanggal_permohonan"},
			{"data" : "kode_sampel"},
			{"data" : "nama_sampel"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
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

	$('#datapenyerahan').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataPenyerahan.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_permohonan"},
			{"data" : "tanggal_permohonan"},
			{"data" : "tanggal_penyerahan"},
			{"data" : "kode_sampel"},
			{"data" : "nama_sampel"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "metode_pengujian"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "yang_menyerahkan"},
			{"data" : "yang_menerima"},

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datakesiapan').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataKesiapan.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "tanggal_permohonan"},	
			{"data" : "nama_sampel"},
			{"data" : "nama_ilmiah"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "jumlah_sampel"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "kondisi_sampel"},
			{"data" : "mt"},
			{"data" : "nip_mt"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datapenugasan').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataPenugasan.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_penunjukan"},	
			{"data" : "nama_sampel"},
			{"data" : "nama_ilmiah"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "jumlah_sampel"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "nama_penyelia"},
			{"data" : "nama_analis"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$("#view_data_surattugas").on("click",(function(){

		$.ajax({url: "views/data/Dataprintsurattugas.php"}).done(function( html ) {
	    $("#Showprintpenugasan").empty();
	    $("#Showprintpenugasan").append(html);

		});

	}));

	$('#datapengelola').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataDistribusiSampeel.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_penunjukan"},	
			{"data" : "nama_sampel"},
			{"data" : "nama_ilmiah"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "jumlah_sampel"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "yang_menyerahkanlab"},
			{"data" : "yang_menerimalab"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});



	$('#datateknis').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDataTeknis.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_pengujian"},	
			{"data" : "nama_sampel"},
			{"data" : "nama_ilmiah"},
			{"data" : "bagian_tumbuhan"},
			{"data" : "jumlah_sampel"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "nama_penyelia"},
			{"data" : "nama_analis"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datapengujian').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDatapengujian.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "no_sertifikat"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_pengujian"},	
			{"data" : "nama_sampel"},
			{"data" : "nama_ilmiah"},
			{"data" : "bagian_tumbuhan"},
			{ "render":function(data, type, isi){	
				let a = isi.target_optk;	
				let b = isi.target_optk2;
				let c = isi.target_optk3;		
	       		let an = a +', '+b;
	       		let bn = a;
	       		let cn = a +', '+b+', '+c;
		       		if (b == null && c == null) {
		       			return "<i>"+bn+"</i>";
		       		}else if (b !== null){
		       			return "<i>"+an+"</i>";
		       		}else{
		       			return "<i>"+cn+"</i>";
		       		}
	       		}
			},
			{"data" : "kepala_plh"},
			{"data" : "nip_kepala_plh"}

		],

		"columnDefs": [{
	    "defaultContent": "-",
	    "targets": "_all"
	  }]

	});

	$('#datalhu').DataTable({
		"dom": "<'row'<'col-sm-2'f><'col-sm-1'><'col-sm-9'p>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 30,
	    "pageLength": 20,
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

		"ajax" : "views/data/SourceDatalhu.php",

		"columns" : [

			{"data" : "0"},
			{"data" : "kode_sampel"},
			{"data" : "no_sampel"},
			{"data" : "tanggal_lhu"},	
			{"data" : "nama_sampel"},
			{"data" : "nama_ilmiah"},
			{"data" : "bagian_tumbuhan"},
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
	
});



/*END TABEL LIHAT SEMUA DATA*/
  

$(document).ready(function(){

	/*Laboratorium Karantina Tumbuhan*/

	 $('.input-daterange').datepicker({
		  todayBtn:'linked',
		  format: "yyyy-mm-dd",
		  autoclose: true
		 });

 	/*Tabel Data Permohonan*/

	 fetch_data_permohonan('no');

	 function fetch_data_permohonan(is_date_search, start_date='', end_date='', choice = '')
	 {
	  let dataTable_permohonan = $('#tb_permohonan').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_permohonan.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_permohonan', function(){

	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_permohonan').DataTable().destroy();

		   fetch_data_permohonan('yes', start_date, end_date, choice);

		   $('#search_permohonan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permohonan').DataTable().destroy();

		   		fetch_data_permohonan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permohonan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_permohonan').DataTable().destroy();

		   fetch_data_permohonan('nodate', start_date, end_date, choice);

		   $('#search_permohonan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permohonan').DataTable().destroy();

		   		fetch_data_permohonan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permohonan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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

     $('#top').one('click','#tombol_input_permohonan' ,function(e){

        e.preventDefault();

        $.post("views/input/inputdata_permohonan.php", function(data) {

        	$("#content-data_input_permohonan").html(data);

        	$("#modal_input_permohonan").modal('show');

        });
    });

     /*Eit Permohonan*/

    $('#tb_permohonan').on('click','#tombol_edit_permohonan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_permohonan').html('');
        $.ajax({
            url:'views/edit/editdata_permohonan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_permohonan').html('');
            $('#content-data_permohonan').html(data);
        }).fail(function(){
            $('#content-data_permohonan').html('<p>Error</p>');
        });
    });

    $(document).on("click", "#hapus", function(){

    	return confirm("Yakin Ingin Hapus Data Ini?");


    });


   
    /*Tabel Data Penerima Sampel*/

    fetch_data_penerima_sampel('no');

    function fetch_data_penerima_sampel(is_date_search, start_date='', end_date='', choice = '')
	 {
	  let dataTable_penerima_sampel = $('#tb_penerima_sampel').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_penerima_sampel.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }


	  $('#clear').on('click', '#search_penerima_sampel', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_penerima_sampel').DataTable().destroy();

		   fetch_data_penerima_sampel('yes', start_date, end_date, choice);

		   $('#search_penerima_sampel').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penerima_sampel').DataTable().destroy();

		   		fetch_data_penerima_sampel('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penerima_sampel" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_penerima_sampel').DataTable().destroy();

		   fetch_data_penerima_sampel('nodate', start_date, end_date, choice);

		   $('#search_penerima_sampel').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penerima_sampel').DataTable().destroy();

		   		fetch_data_penerima_sampel('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penerima_sampel" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_penerima_sampel').on('click','#tombol_input_penerima_sampel',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_penerima_sampel').html('');
        $.ajax({
            url:'views/input/inputdata_penerima_sampel.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_penerima_sampel').html('');
            $('#content-data_input_penerima_sampel').html(data);
        }).fail(function(){
            $('#content-data_input_penerima_sampel').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_penerimaan_sampel').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_penerima_sampel.php", function(data) {

        	$("#content-data_input_multi_penerima_sampel").html(data);

        	$("#modal_input_multi_penerima_sampel").modal('show');

        });
    });

    /*Edit*/

    $('#tb_penerima_sampel').on('click','#tombol_edit_penerima_sampel',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_penerima_sampel').html('');
        $.ajax({
            url:'views/edit/editdata_penerima_sampel.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_penerima_sampel').html('');
            $('#content-data_edit_penerima_sampel').html(data);
        }).fail(function(){
            $('#content-data_edit_penerima_sampel').html('<p>Error</p>');
        });
    });

    /*End Table Penerima Sampel*/

    /*Tabel Permintaan kesiapan Pengujian*/

    fetch_data_permintaan_kesiapan('no');

    function fetch_data_permintaan_kesiapan(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_permintaan_kesiapan = $('#tb_permintaan_kesiapan').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_permintaan_kesiapan.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }


	  $('#clear').on('click', '#search_permintaan_kesiapan', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_permintaan_kesiapan').DataTable().destroy();

		   fetch_data_permintaan_kesiapan('yes', start_date, end_date, choice);

		   $('#search_permintaan_kesiapan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permintaan_kesiapan').DataTable().destroy();

		   		fetch_data_permintaan_kesiapan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permintaan_kesiapan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_permintaan_kesiapan').DataTable().destroy();

		   fetch_data_permintaan_kesiapan('nodate', start_date, end_date, choice);

		   $('#search_permintaan_kesiapan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_permintaan_kesiapan').DataTable().destroy();

		   		fetch_data_permintaan_kesiapan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_permintaan_kesiapan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_permintaan_kesiapan').on('click','#tombol_input_permintaan_kesiapan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_permintaan_kesiapan').html('');
        $.ajax({
            url:'views/input/inputdata_permintaan_kesiapan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_permintaan_kesiapan').html('');
            $('#content-data_input_permintaan_kesiapan').html(data);
        }).fail(function(){
            $('#content-data_input_permintaan_kesiapan').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_permintaan_kesiapan_pengujian').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_permintaan_kesiapan.php", function(data) {

        	$("#content-data_input_multi_permintaan_kesiapan_pengujian").html(data);

        	$("#modal_input_multi_permintaan_kesiapan_pengujian").modal('show');

        });
    });

    /*Edit*/

    $('#tb_permintaan_kesiapan').on('click','#tombol_edit_permintaan_kesiapan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_permintaan_kesiapan').html('');
        $.ajax({
            url:'views/edit/editdata_permintaan_kesiapan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_permintaan_kesiapan').html('');
            $('#content-data_edit_permintaan_kesiapan').html(data);
        }).fail(function(){
            $('#content-data_edit_permintaan_kesiapan').html('<p>Error</p>');
        });
    });

    /*End Tabel Permintaan Kesiapan*/

    /*Tabel Respon Permohonan*/


    fetch_data_respon_permohonan('no');

    function fetch_data_respon_permohonan(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_respon_permohonan = $('#tb_respon_permohonan').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_respon_permohonan.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_respon_permohonan', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_respon_permohonan').DataTable().destroy();

		   fetch_data_respon_permohonan('yes', start_date, end_date, choice);

		   $('#search_respon_permohonan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_respon_permohonan').DataTable().destroy();

		   		fetch_data_respon_permohonan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_respon_permohonan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_respon_permohonan').DataTable().destroy();

		   fetch_data_respon_permohonan('nodate', start_date, end_date, choice);

		   $('#search_respon_permohonan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_respon_permohonan').DataTable().destroy();

		   		fetch_data_respon_permohonan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_respon_permohonan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_respon_permohonan').on('click','#tombol_input_respon_permohonan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_respon_permohonan').html('');
        $.ajax({
            url:'views/input/inputdata_respon_permohonan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_respon_permohonan').html('');
            $('#content-data_input_respon_permohonan').html(data);
        }).fail(function(){
            $('#content-data_input_respon_permohonan').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_respon_permohonan').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_respon_permohonan.php", function(data) {

        	$("#content-data_input_multi_respon_permohonan").html(data);

        	$("#modal_input_multi_respon_permohonan").modal('show');

        });
    });

    /*Edit*/

    $('#tb_respon_permohonan').on('click','#tombol_edit_respon_permohonan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_respon_permohonan').html('');
        $.ajax({
            url:'views/edit/editdata_respon_permohonan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_respon_permohonan').html('');
            $('#content-data_edit_respon_permohonan').html(data);
        }).fail(function(){
            $('#content-data_edit_respon_permohonan').html('<p>Error</p>');
        });
    });

    /*End Tabel Respon*/

    /*Tabel Penyerahan Sampel*/

    fetch_data_penyerahan_sampel('no');

    function fetch_data_penyerahan_sampel(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_penyerahan_sampel = $('#tb_penyerahan_sampel').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_penyerahan_sampel.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_penyerahan_sampel', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !=''&& choice !='')
		  {
		   $('#tb_penyerahan_sampel').DataTable().destroy();

		   fetch_data_penyerahan_sampel('yes', start_date, end_date, choice);

		   $('#search_penyerahan_sampel').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penyerahan_sampel').DataTable().destroy();

		   		fetch_data_penyerahan_sampel('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penyerahan_sampel" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date ==''&& choice !='')
		  {
		   $('#tb_penyerahan_sampel').DataTable().destroy();

		   fetch_data_penyerahan_sampel('nodate', start_date, end_date, choice);

		   $('#search_penyerahan_sampel').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_penyerahan_sampel').DataTable().destroy();

		   		fetch_data_penyerahan_sampel('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_penyerahan_sampel" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_penyerahan_sampel').on('click','#tombol_input_penyerahan_sampel',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_penyerahan_sampel').html('');
        $.ajax({
            url:'views/input/inputdata_penyerahan_sampel.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_penyerahan_sampel').html('');
            $('#content-data_input_penyerahan_sampel').html(data);
        }).fail(function(){
            $('#content-data_input_penyerahan_sampel').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_penyerahan_sampel').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_penyerahan_sampel.php", function(data) {

        	$("#content-data_input_multi_penyerahan_sampel").html(data);

        	$("#modal_input_multi_penyerahan_sampel").modal('show');

        });
    });

    /*Edit*/

    $('#tb_penyerahan_sampel').on('click','#tombol_edit_penyerahan_sampel',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_penyerahan_sampel').html('');
        $.ajax({
            url:'views/edit/editdata_penyerahan_sampel.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_penyerahan_sampel').html('');
            $('#content-data_edit_penyerahan_sampel').html(data);
        }).fail(function(){
            $('#content-data_edit_penyerahan_sampel').html('<p>Error</p>');
        });
    });

    /*End Tabel Permintaan Kesiapan*/

    /*Bagian Manajer Teknis*/

    /*Tabel Kesiapan Pengujian*/


    fetch_data_kesiapan_pengujian('no');

    function fetch_data_kesiapan_pengujian(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_kesiapan_pengujian = $('#tb_kesiapan_pengujian').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_kesiapan_pengujian.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_kesiapan_pengujian', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_kesiapan_pengujian').DataTable().destroy();

		   fetch_data_kesiapan_pengujian('yes', start_date, end_date, choice);

		   $('#search_kesiapan_pengujian').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_kesiapan_pengujian').DataTable().destroy();

		   		fetch_data_kesiapan_pengujian('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_kesiapan_pengujian" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_kesiapan_pengujian').DataTable().destroy();

		   fetch_data_kesiapan_pengujian('nodate', start_date, end_date, choice);

		   $('#search_kesiapan_pengujian').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_kesiapan_pengujian').DataTable().destroy();

		   		fetch_data_kesiapan_pengujian('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_kesiapan_pengujian" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_kesiapan_pengujian').on('click','#tombol_input_kesiapan_pengujian',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_kesiapan_pengujian').html('');
        $.ajax({
            url:'views/input/inputdata_kesiapan_pengujian.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_kesiapan_pengujian').html('');
            $('#content-data_input_kesiapan_pengujian').html(data);
        }).fail(function(){
            $('#content-data_input_kesiapan_pengujian').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_kesiapan_pengujian').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_kesiapan_pengujian.php", function(data) {

        	$("#content-data_input_multi_kesiapan_pengujian").html(data);

        	$("#modal_input_multi_kesiapan_pengujian").modal('show');

        });
    });

    /*Edit*/

    $('#tb_kesiapan_pengujian').on('click','#tombol_edit_kesiapan_pengujian',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_kesiapan_pengujian').html('');
        $.ajax({
            url:'views/edit/editdata_kesiapan_pengujian.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_kesiapan_pengujian').html('');
            $('#content-data_edit_kesiapan_pengujian').html(data);
        }).fail(function(){
            $('#content-data_edit_kesiapan_pengujian').html('<p>Error</p>');
        });
    });

    /*End Tabel Permintaan Kesiapan*/

    /*Tabel Usulan Penunjukan Penyelia/Analis & Surat Tugas*/

    fetch_data_usulan_penunjukan('no');

    function fetch_data_usulan_penunjukan(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_usulan_penunjukan = $('#tb_usulan_penunjukan').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_usulan_penunjukan.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_usulan_penunjukan', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_usulan_penunjukan').DataTable().destroy();

		   fetch_data_usulan_penunjukan('yes', start_date, end_date, choice);

		   $('#search_usulan_penunjukan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_usulan_penunjukan').DataTable().destroy();

		   		fetch_data_usulan_penunjukan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_usulan_penunjukan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_usulan_penunjukan').DataTable().destroy();

		   fetch_data_usulan_penunjukan('nodate', start_date, end_date, choice);

		   $('#search_usulan_penunjukan').remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_usulan_penunjukan').DataTable().destroy();

		   		fetch_data_usulan_penunjukan('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_usulan_penunjukan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_usulan_penunjukan').on('click','#tombol_input_usulan_penunjukan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_usulan_penunjukan').html('');
        $.ajax({
            url:'views/input/inputdata_usulan_penunjukan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_usulan_penunjukan').html('');
            $('#content-data_input_usulan_penunjukan').html(data);
        }).fail(function(){
            $('#content-data_input_usulan_penunjukan').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_usulan_penunjukan').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_usulan_penunjukan.php", function(data) {

        	$("#content-data_input_multi_usulan_penunjukan").html(data);

        	$("#modal_input_multi_usulan_penunjukan").modal('show');

        });
    });

    /*Edit*/

    $('#tb_usulan_penunjukan').on('click','#tombol_edit_usulan_penunjukan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_usulan_penunjukan').html('');
        $.ajax({
            url:'views/edit/editdata_usulan_penunjukan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_usulan_penunjukan').html('');
            $('#content-data_edit_usulan_penunjukan').html(data);
        }).fail(function(){
            $('#content-data_edit_usulan_penunjukan').html('<p>Error</p>');
        });
    });

    /* End Tabel Usulan Penunjukan Penyelia/Analis & Surat Tugas*/

    /*Tabel Pengelola Sampel or Distribusi Sampel*/

    fetch_data_pengelola_sampel('no');

    function fetch_data_pengelola_sampel(is_date_search, start_date='', end_date='', choice = '')
	 {
	   let dataTable_pengelola_sampel = $('#tb_pengelola_sampel').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_pengelola_sampel.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_pengelola_sampel', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_pengelola_sampel').DataTable().destroy();

		   fetch_data_pengelola_sampel('yes', start_date, end_date,choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_pengelola_sampel').DataTable().destroy();

		   		fetch_data_pengelola_sampel('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_pengelola_sampel" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_pengelola_sampel').DataTable().destroy();

		   fetch_data_pengelola_sampel('nodate', start_date, end_date,choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_pengelola_sampel').DataTable().destroy();

		   		fetch_data_pengelola_sampel('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_pengelola_sampel" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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

	 /*Tabel Fungsional Pengelola Sampel or Distribusi Sampel*/ 
	fetch_data_fungsional_penyemaian_benih('no');
	   function fetch_data_fungsional_penyemaian_benih(is_date_search, start_date='', end_date='', choice='')
	   {
	     $('#tb_fungsional_penyemaian_benih').DataTable({
	      "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
	       "<'row'<'col-sm-12'>>" +
	         "<'row'<'col-sm-12'tr>>" +
	         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	      "iDisplayLength": 25,
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
	      url:"views/data/sumber_data_fungsional_penyemaian_benih.php",
	      type:"POST",
	      data:{
	       is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	      }
	     }
	    });
	   }

	   $(document).on('click', '#search_fungsional_penyemaian_benih', function() {

	   		let start_date = $('#start_date').val();

		    let end_date = $('#end_date').val();

		    let choice = $('#choice').val();

		      if(start_date == '' && end_date == '' && choice !='')
		      {
		       $('#tb_fungsional_penyemaian_benih').DataTable().destroy();

		      fetch_data_fungsional_penyemaian_benih('onlyselected', start_date, end_date, choice);

		       $(this).remove();

		       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		       $('#cleardate').click(function () {

		          $('#tb_fungsional_penyemaian_benih').DataTable().destroy();

		          fetch_data_fungsional_penyemaian_benih('no');

		          $('#start_date').val('').datepicker('update');

		          $('#end_date').val('').datepicker('update');

		          
		          $('#clear').one("click", "#cleardate", function() {
		            $(this).remove();

		          $('#clear').append('<button name="search" id="search_fungsional_penyemaian_benih" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
		        });

		       });


		      }else if(start_date != '' && end_date != '' && choice !='') {



		      	$('#tb_fungsional_penyemaian_benih').DataTable().destroy();

			       fetch_data_fungsional_penyemaian_benih('yes', start_date, end_date, choice);

			       $(this).remove();

			       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

			       $('#cleardate').click(function () {

			          $('#tb_fungsional_penyemaian_benih').DataTable().destroy();

			          fetch_data_fungsional_penyemaian_benih('no');

			          $('#start_date').val('').datepicker('update');

			          $('#end_date').val('').datepicker('update');

			          
			          $('#clear').one("click", "#cleardate", function() {
			            $(this).remove();

			          $('#clear').append('<button name="search" id="search_fungsional_penyemaian_benih" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
			        });

			       });


		      }else{

		      	swal({

	              title: "",

	              text: "Pilih Tanggal Atau Kategori Sortir",

	              type: "info"

	          	});


		      }

	   });

	    /*Tabel Fungsional Pengelola Sampel or Distribusi Sampel*/ 
	fetch_data_fungsional_persiapan_alat('no');
	   function fetch_data_fungsional_persiapan_alat(is_date_search, start_date='', end_date='', choice='')
	   {
	     $('#tb_fungsional_persiapan_alat').DataTable({
	      "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
	       "<'row'<'col-sm-12'>>" +
	         "<'row'<'col-sm-12'tr>>" +
	         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	      "iDisplayLength": 25,
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
	      url:"views/data/sumber_data_fungsional_persiapan_alat.php",
	      type:"POST",
	      data:{
	       is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	      }
	     }
	    });
	   }

	   $(document).on('click', '#search_fungsional_persiapan_alat', function() {

	   		let start_date = $('#start_date').val();

		    let end_date = $('#end_date').val();

		    let choice = $('#choice').val();

		      if(start_date == '' && end_date == '' && choice !='')
		      {
		       $('#tb_fungsional_persiapan_alat').DataTable().destroy();

		      fetch_data_fungsional_persiapan_alat('onlyselected', start_date, end_date, choice);

		       $(this).remove();

		       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		       $('#cleardate').click(function () {

		          $('#tb_fungsional_persiapan_alat').DataTable().destroy();

		          fetch_data_fungsional_persiapan_alat('no');

		          $('#start_date').val('').datepicker('update');

		          $('#end_date').val('').datepicker('update');

		          
		          $('#clear').one("click", "#cleardate", function() {
		            $(this).remove();

		          $('#clear').append('<button name="search" id="search_fungsional_persiapan_alat" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
		        });

		       });


		      }else if(start_date != '' && end_date != '' && choice !='') {



		      	$('#tb_fungsional_persiapan_alat').DataTable().destroy();

			       fetch_data_fungsional_persiapan_alat('yes', start_date, end_date, choice);

			       $(this).remove();

			       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

			       $('#cleardate').click(function () {

			          $('#tb_fungsional_persiapan_alat').DataTable().destroy();

			          fetch_data_fungsional_persiapan_alat('no');

			          $('#start_date').val('').datepicker('update');

			          $('#end_date').val('').datepicker('update');

			          
			          $('#clear').one("click", "#cleardate", function() {
			            $(this).remove();

			          $('#clear').append('<button name="search" id="search_fungsional_persiapan_alat" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
			        });

			       });


		      }else{

		      	swal({

	              title: "",

	              text: "Pilih Tanggal Atau Kategori Sortir",

	              type: "info"

	          	});


		      }

	   });


	       /*Tabel Fungsional Pengelola Sampel or Distribusi Sampel*/ 
	fetch_data_fungsional_penanganan_spesimen('no');
	   function fetch_data_fungsional_penanganan_spesimen(is_date_search, start_date='', end_date='', choice='')
	   {
	     $('#tb_fungsional_penanganan_spesimen').DataTable({
	      "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
	       "<'row'<'col-sm-12'>>" +
	         "<'row'<'col-sm-12'tr>>" +
	         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	      "iDisplayLength": 25,
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
	      url:"views/data/sumber_data_fungsional_penanganan_spesimen.php",
	      type:"POST",
	      data:{
	       is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	      }
	     }
	    });
	   }

	   $(document).on('click', '#search_fungsional_penanganan_spesimen', function() {

	   		let start_date = $('#start_date').val();

		    let end_date = $('#end_date').val();

		    let choice = $('#choice').val();

		      if(start_date == '' && end_date == '' && choice !='')
		      {
		       $('#tb_fungsional_penanganan_spesimen').DataTable().destroy();

		      fetch_data_fungsional_penanganan_spesimen('onlyselected', start_date, end_date, choice);

		       $(this).remove();

		       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		       $('#cleardate').click(function () {

		          $('#tb_fungsional_penanganan_spesimen').DataTable().destroy();

		          fetch_data_fungsional_penanganan_spesimen('no');

		          $('#start_date').val('').datepicker('update');

		          $('#end_date').val('').datepicker('update');

		          
		          $('#clear').one("click", "#cleardate", function() {
		            $(this).remove();

		          $('#clear').append('<button name="search" id="search_fungsional_penanganan_spesimen" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
		        });

		       });


		      }else if(start_date != '' && end_date != '' && choice !='') {



		      	$('#tb_fungsional_penanganan_spesimen').DataTable().destroy();

			       fetch_data_fungsional_penanganan_spesimen('yes', start_date, end_date, choice);

			       $(this).remove();

			       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

			       $('#cleardate').click(function () {

			          $('#tb_fungsional_penanganan_spesimen').DataTable().destroy();

			          fetch_data_fungsional_penanganan_spesimen('no');

			          $('#start_date').val('').datepicker('update');

			          $('#end_date').val('').datepicker('update');

			          
			          $('#clear').one("click", "#cleardate", function() {
			            $(this).remove();

			          $('#clear').append('<button name="search" id="search_fungsional_penanganan_spesimen" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
			        });

			       });


		      }else{

		      	swal({

	              title: "",

	              text: "Pilih Tanggal Atau Kategori Sortir",

	              type: "info"

	          	});


		      }

	   });

	         /*Tabel Fungsional Pengelola Sampel or Distribusi Sampel*/ 
	fetch_data_fungsional_pembuatan_preparat('no');
	   function fetch_data_fungsional_pembuatan_preparat(is_date_search, start_date='', end_date='', choice='')
	   {
	     $('#tb_fungsional_pembuatan_preparat').DataTable({
	      "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
	       "<'row'<'col-sm-12'>>" +
	         "<'row'<'col-sm-12'tr>>" +
	         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	      "iDisplayLength": 25,
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
	      url:"views/data/sumber_data_fungsional_pembuatan_preparat.php",
	      type:"POST",
	      data:{
	       is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	      }
	     }
	    });
	   }

	   $(document).on('click', '#search_fungsional_pembuatan_preparat', function() {

	   		let start_date = $('#start_date').val();

		    let end_date = $('#end_date').val();

		    let choice = $('#choice').val();

		      if(start_date == '' && end_date == '' && choice !='')
		      {
		       $('#tb_fungsional_pembuatan_preparat').DataTable().destroy();

		      fetch_data_fungsional_pembuatan_preparat('onlyselected', start_date, end_date, choice);

		       $(this).remove();

		       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		       $('#cleardate').click(function () {

		          $('#tb_fungsional_pembuatan_preparat').DataTable().destroy();

		          fetch_data_fungsional_pembuatan_preparat('no');

		          $('#start_date').val('').datepicker('update');

		          $('#end_date').val('').datepicker('update');

		          
		          $('#clear').one("click", "#cleardate", function() {
		            $(this).remove();

		          $('#clear').append('<button name="search" id="search_fungsional_pembuatan_preparat" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
		        });

		       });


		      }else if(start_date != '' && end_date != '' && choice !='') {



		      	$('#tb_fungsional_pembuatan_preparat').DataTable().destroy();

			       fetch_data_fungsional_pembuatan_preparat('yes', start_date, end_date, choice);

			       $(this).remove();

			       $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

			       $('#cleardate').click(function () {

			          $('#tb_fungsional_pembuatan_preparat').DataTable().destroy();

			          fetch_data_fungsional_pembuatan_preparat('no');

			          $('#start_date').val('').datepicker('update');

			          $('#end_date').val('').datepicker('update');

			          
			          $('#clear').one("click", "#cleardate", function() {
			            $(this).remove();

			          $('#clear').append('<button name="search" id="search_fungsional_pembuatan_preparat" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
			        });

			       });


		      }else{

		      	swal({

	              title: "",

	              text: "Pilih Tanggal Atau Kategori Sortir",

	              type: "info"

	          	});


		      }

	   });

    /*input*/
    
    $('#tb_pengelola_sampel').on('click','#tombol_input_pengelola_sampel',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_pengelola_sampel').html('');
        $.ajax({
            url:'views/input/inputdata_pengelola_sampel.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_pengelola_sampel').html('');
            $('#content-data_input_pengelola_sampel').html(data);
        }).fail(function(){
            $('#content-data_input_pengelola_sampel').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_pengelola_sampel').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_pengelola_sampel.php", function(data) {

        	$("#content-data_input_multi_pengelola_sampel").html(data);

        	$("#modal_input_multi_pengelola_sampel").modal('show');

        });
    });

    /*Edit*/

    $('#tb_pengelola_sampel').on('click','#tombol_edit_pengelola_sampel',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_pengelola_sampel').html('');
        $.ajax({
            url:'views/edit/editdata_pengelola_sampel.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_pengelola_sampel').html('');
            $('#content-data_edit_pengelola_sampel').html(data);
        }).fail(function(){
            $('#content-data_edit_pengelola_sampel').html('<p>Error</p>');
        });
    });

    /* End Tabel Pengelola Sampel or Distribusi Sampel*/

    /*Tabel Data Teknis*/

    fetch_data_data_teknis('no');

    function fetch_data_data_teknis(is_date_search, start_date='', end_date='', choice='')
	 {
	   let dataTable_data_teknis = $('#tb_data_teknis').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_data_teknis.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_data_teknis', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_data_teknis').DataTable().destroy();

		   fetch_data_data_teknis('yes', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_data_teknis').DataTable().destroy();

		   		fetch_data_data_teknis('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_data_teknis" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_data_teknis').DataTable().destroy();

		   fetch_data_data_teknis('nodate', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_data_teknis').DataTable().destroy();

		   		fetch_data_data_teknis('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_data_teknis" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_data_teknis').on('click','#tombol_input_data_teknis',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_data_teknis').html('');
        $.ajax({
            url:'views/input/inputdata_data_teknis.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_data_teknis').html('');
            $('#content-data_input_data_teknis').html(data);
        }).fail(function(){
            $('#content-data_input_data_teknis').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_data_teknis').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_data_teknis.php", function(data) {

        	$("#content-data_input_multi_data_teknis").html(data);

        	$("#modal_input_multi_data_teknis").modal('show');

        });
    });

    /*Edit*/

    $('#tb_data_teknis').on('click','#tombol_edit_data_teknis',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_data_teknis').html('');
        $.ajax({
            url:'views/edit/editdata_data_teknis.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_data_teknis').html('');
            $('#content-data_edit_data_teknis').html(data);
        }).fail(function(){
            $('#content-data_edit_data_teknis').html('<p>Error</p>');
        });
    });

    /* End Tabel Data Teknis*/

    /*Tabel Hasil Pengujian*/

    fetch_data_hasil_pengujian('no');

    function fetch_data_hasil_pengujian(is_date_search, start_date='', end_date='', choice='')
	 {
	   let dataTable_hasil_pengujian = $('#tb_hasil_pengujian').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_hasil_pengujian.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_hasil_pengujian', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_hasil_pengujian').DataTable().destroy();

		   fetch_data_hasil_pengujian('yes', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_hasil_pengujian').DataTable().destroy();

		   		fetch_data_hasil_pengujian('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		
		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_hasil_pengujian" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date == '' && choice !='')
		  {
		   $('#tb_hasil_pengujian').DataTable().destroy();

		   fetch_data_hasil_pengujian('nodate', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_hasil_pengujian').DataTable().destroy();

		   		fetch_data_hasil_pengujian('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_hasil_pengujian" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_hasil_pengujian').on('click','#tombol_input_hasil_pengujian',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_hasil_pengujian').html('');
        $.ajax({
            url:'views/input/input_multi/inputmultidata_hasil_pengujian.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_hasil_pengujian').html('');
            $('#content-data_input_hasil_pengujian').html(data);
        }).fail(function(){
            $('#content-data_input_hasil_pengujian').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

    //  $('#tombol_input_multi_hasil_pengujian').click(function(e){

    //     e.preventDefault();

    //     $.post("views/input/input_multi/inputmultidata_hasil_pengujian.php", function(data) {

    //     	$("#content-data_input_multi_hasil_pengujian").html(data);

    //     	$("#modal_input_multi_hasil_pengujian").modal('show');

    //     });
    // });

    /*Edit*/

    $('#tb_hasil_pengujian').on('click','#tombol_edit_hasil_pengujian',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_hasil_pengujian').html('');
        $.ajax({
            url:'views/edit/editdata_hasil_pengujian.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_hasil_pengujian').html('');
            $('#content-data_edit_hasil_pengujian').html(data);
        }).fail(function(){
            $('#content-data_edit_hasil_pengujian').html('<p>Error</p>');
        });
    });

    /* End Tabel Hasil Pengujian*/

    /*Tabel LHU*/

    fetch_data_lhu('no');

    function fetch_data_lhu(is_date_search, start_date='', end_date='', choice='')
	 {
	   let dataTable_lhu = $('#tb_lhu').DataTable({
		  "dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
	    url:"views/data/sumber_data_lhu.php",
	    type:"POST",
	    data:{
	     is_date_search:is_date_search, start_date:start_date, end_date:end_date, choice:choice
	    }
	   }
	  });
	 }

	 $('#clear').on('click', '#search_lhu', function(){
	 	
	  let start_date = $('#start_date').val();

	  let end_date = $('#end_date').val();

	  let choice = $('#choice').val();

		  if(start_date != '' && end_date !='' && choice !='')
		  {
		   $('#tb_lhu').DataTable().destroy();

		   fetch_data_lhu('yes', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_lhu').DataTable().destroy();

		   		fetch_data_lhu('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_lhu" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
				});

		   });
		  }
		  else if(start_date == '' && end_date =='' && choice !='')
		  {
		   $('#tb_lhu').DataTable().destroy();

		   fetch_data_lhu('nodate', start_date, end_date, choice);

		   $(this).remove();

		   $('#clear').append('<button id="cleardate" class="btn btn-kuprimary"><i class="fa fa-refresh"></i> Clear</button>');

		   $('#cleardate').click(function () {

		   		$('#tb_lhu').DataTable().destroy();

		   		fetch_data_lhu('no');

		   		$('#start_date').val('').datepicker('update');

		   		$('#end_date').val('').datepicker('update');

		   		$('#clear').one("click", "#cleardate", function() {
		   			$(this).remove();

					$('#clear').append('<button name="search" id="search_lhu" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>');
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
    
    $('#tb_lhu').on('click','#tombol_input_lhu',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_input_lhu').html('');
        $.ajax({
            url:'views/input/inputdata_lhu.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_input_lhu').html('');
            $('#content-data_input_lhu').html(data);
        }).fail(function(){
            $('#content-data_input_lhu').html('<p>Error</p>');
        });
    });

    /*Input Multi Data*/

     $('#tombol_input_multi_lhu').click(function(e){

        e.preventDefault();

        $.post("views/input/input_multi/inputmultidata_lhu.php", function(data) {

        	$("#content-data_input_multi_lhu").html(data);

        	$("#modal_input_multi_lhu").modal('show');

        });
    });

    /*Edit*/

    $('#tb_lhu').on('click','#tombol_edit_lhu',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_lhu').html('');
        $.ajax({
            url:'views/edit/editdata_lhu.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_lhu').html('');
            $('#content-data_edit_lhu').html(data);
        }).fail(function(){
            $('#content-data_edit_lhu').html('<p>Error</p>');
        });
    });

    /* End Tabel LHU*/

    /*Tabel database_tumbuhan*/

    let dataTable_database_tumbuhan = $('#tb_database_tumbuhan').DataTable({
    	"dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 25,
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
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"database/views/data/sumber_data_database_tumbuhan.php",
            type:"POST"
        }
    });


    /*Edit*/

    $(document).on('click','#tombol_edit_database_tumbuhan',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_database_tumbuhan').html('');
        $.ajax({
            url:'database/views/edit/editdata_database_tumbuhan.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_database_tumbuhan').html('');
            $('#content-data_edit_database_tumbuhan').html(data);
        }).fail(function(){
            $('#content-data_edit_database_tumbuhan').html('<p>Error</p>');
        });
    });

    $(document).on("click", "#hapus_database_tumbuhan", function(){

    	return confirm("Yakin Ingin Hapus Data Ini?");


    });

    /* End Tabel database_tumbuhan*/

    /*Tabel database_patogen*/

    let dataTable_database_patogen = $('#tb_database_patogen').DataTable({
    	"dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 15,
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
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"database/views/data/sumber_data_database_patogen.php",
            type:"POST"
        }
    });


    /*Edit*/

    $(document).on('click','#tombol_edit_database_patogen',function(e){
        e.preventDefault();
        let per_id = $(this).data('id');
        $('#content-data_edit_database_patogen').html('');
        $.ajax({
            url:'database/views/edit/editdata_database_patogen.php',
            type:'POST',
            data:'id=' + per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data_edit_database_patogen').html('');
            $('#content-data_edit_database_patogen').html(data);
        }).fail(function(){
            $('#content-data_edit_database_patogen').html('<p>Error</p>');
        });
    });

    $(document).on("click", "#hapus_database_patogen", function(){

    	return confirm("Yakin Ingin Hapus Data Ini?");


    });

    /* End Tabel database_patogen*/

    /*Tabel lihat data permohonan*/

    let dataTable_lihat_data_permohonan = $('#tb_lihat_data_permohonan').DataTable({
    	"dom": "<'row'<'col-sm-2'l><'col-sm-1'><'col-sm-9'f>>" +
   		 "<'row'<'col-sm-12'>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	    "iDisplayLength": 15,
	    "pageLength": 15,
	     "lengthMenu": [ [15, 50, 100, -1], [15, 50, 100, "All"] ],
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
            url:"views/data/sumber_data_lihat_data_permohonan.php",
            type:"POST"
        }
    });


    /* End Tabel lihat_data_permohonan*/

    
    


}); /*End Ready Functions*/















