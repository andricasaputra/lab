<?php

$con=mysqli_connect('localhost','root','','lab_db')

    or die("connection failed".mysqli_errno());

$request=$_REQUEST;

$col =array(

    0   =>  'id',

    1   =>  'no_permohonan',

    2   =>  'tanggal_permohonan',

    3   =>  'tanggal_acu_permohonan',

    4   =>  'nama_sampel',

    5   =>  'nama_ilmiah',

    6   =>  'jumlah_sampel',

    7   =>  'jumlah_sampel2',

    8   =>  'satuan',

    9   =>  'bagian_tumbuhan',

    10   =>  'media',

    11   =>  'vektor',

    12   =>  'daerah_asal',

    13   =>  'nama_patogen',

    14   =>  'nama_patogen2',

    15   =>  'nama_patogen3',

    16   =>  'target_optk',

    17   =>  'target_optk2',

    18   =>  'target_optk3',

    19   =>  'metode_pengujian',

    20   =>  'metode_pengujian2',

    21   =>  'metode_pengujian3',

    22   =>  'nama_pemilik',

    23   =>  'alamat_pemilik',

    24   =>  'dokumen_pendukung',

    25   =>  'pemohon',

    26   =>  'nip',

    27   =>  'tanggal_diterima',

    28   =>  'cara_pengiriman',

    29   =>  'pengantar',

    30   =>  'jumlah_kontainer',

    31   =>  'lama_pengujian',

    32   =>  'lama_pengujian2',

    33   =>  'lama_pengujian3',

    34   =>  'jabatan',

    35   =>  'nip_penerima_sampel',

    36   =>  'kode_sampel',

    37   =>  'ma',

    38   =>  'nip_ma',

    39   =>  'kondisi_sampel',

    40   =>  'mt',

    41   =>  'nip_mt',

    41   =>  'penyelia',

    43   =>  'penyelia2',

    44   =>  'analis',

    45   =>  'analis2',

    46   =>  'bahan',

    47   =>  'bahan2',

    48   =>  'alat',

    49   =>  'alat2',

    50   =>  'saran',

    51   =>  'tanggal_selesai',

    52   =>  'tanggal_penunjukan',

    53   =>  'no_sampel',

    54   =>  'yang_menyerahkanlab',

    55   =>  'yang_menerimalab',

    56   =>  'nip_yangmenyerahkanlab',

    57   =>  'nip_yangmenerima_lab',

    58   =>  'lab_penguji',

    59   =>  'nama_penyelia',

    60   =>  'nama_analis',

    61   =>  'jab_penyelia',

    62   =>  'jab_analis',

    63   =>  'hari',

    64   =>  'bulan',

    65   =>  'tahun',

    66   =>  'no_surat_tugas',

    67   =>  'tanggal_penyerahan',

    68   =>  'yang_menerima',

    69   =>  'yang_menyerahkan',

    70   =>  'nip_ygmenyerahkan',

    71   =>  'nip_ygmenerima',

    72   =>  'tanggal_penyerahan_lab',

    73   =>  'tanggal_pengujian',

    74   =>  'hasil_pengujian',

    75   =>  'hasil_pengujian2',

    76   =>  'hasil_pengujian3',

    77   =>  'nip_penyelia',

    78   =>  'nip_analis',

    79   =>  'ket_kesimpulan',

    80   =>  'no_sertifikat',

    81   =>  'rekomendasi',

    82   =>  'kepala_plh',

    83   =>  'nip_kepala_plh',

    84   =>  'tanggal_sertifikat',

    85   =>  'no_agenda',

    86   =>  'no_lhu',

    87   =>  'tanggal_lhu',

    88   =>  'kepala_plh2',

    89   =>  'nip_kepala_plh2'

    

);  //create column like table in database

$sql ="SELECT * FROM input_permohonan";

$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search

$sql ="SELECT * FROM input_permohonan WHERE 1 = 1";

if(!empty($request['search']['value'])){

    $sql.=" AND (id Like '".$request['search']['value']."%' ";

    $sql.=" OR tanggal_permohonan Like '".$request['search']['value']."%' ";

    $sql.=" OR no_permohonan Like '".$request['search']['value']."%' ";

    $sql.=" OR nama_sampel Like '".$request['search']['value']."%' )";

    $sql.=" OR jumlah_sampel Like '".$request['search']['value']."%' )";

    $sql.=" OR target_optk Like '".$request['search']['value']."%' )";

    $sql.=" OR target_optk2 Like '".$request['search']['value']."%' )";

    $sql.=" OR target_optk3 Like '".$request['search']['value']."%' )";

}

$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

//Order

$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".

    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){

    $subdata=array();

    $subdata[]=$row[0]; //id

    $subdata[]=$row[1]; //age  

    $subdata[]=$row[2]; //name

    $subdata[]=$row[3]; //salary

    $subdata[]=$row[4]; //age

    $subdata[]=$row[5]; //age

    $subdata[]=$row[6]; //age 

    $subdata[]=$row[7]; //age 

    $subdata[]=$row[8]; //age 

    $subdata[]=$row[9]; //age 

    $subdata[]=$row[10]; //age 

    $subdata[]=$row[11]; //age 

    $subdata[]=$row[12]; //age 

    $subdata[]=$row[13]; //age 

    $subdata[]=$row[14]; //age 

    $subdata[]=$row[15]; //age 

    $subdata[]=$row[16]; //age 

    $subdata[]=$row[17]; //age 

    $subdata[]=$row[18]; //age 

    $subdata[]=$row[19]; //age 

    $subdata[]=$row[20]; //age 

    $subdata[]=$row[21]; //age 

    $subdata[]=$row[22]; //age 

    $subdata[]=$row[23]; //age 

    $subdata[]=$row[24]; //age 

    $subdata[]=$row[25]; //age 

    $subdata[]=$row[26]; //age 

    $subdata[]=$row[27]; //age 

    $subdata[]=$row[28]; //age 

    $subdata[]=$row[29]; //age 

    $subdata[]=$row[30]; //age 

    $subdata[]=$row[31]; //age 

    $subdata[]=$row[32]; //age 

    $subdata[]=$row[33]; //age 

    $subdata[]=$row[34]; //age 

    $subdata[]=$row[35]; //age 

    $subdata[]=$row[36]; //age 

    $subdata[]=$row[37]; //age 

    $subdata[]=$row[38]; //age 

    $subdata[]=$row[39]; //age 

    $subdata[]=$row[40]; //age 

    $subdata[]=$row[41]; //age 

    $subdata[]=$row[42]; //age 

    $subdata[]=$row[43]; //age 

    $subdata[]=$row[44]; //age 

    $subdata[]=$row[45]; //age 

    $subdata[]=$row[46]; //age 

    $subdata[]=$row[47]; //age 

    $subdata[]=$row[48]; //age 

    $subdata[]=$row[49]; //age 

    $subdata[]=$row[50]; //age 

    $subdata[]=$row[51]; //age 

    $subdata[]=$row[52]; //age 

    $subdata[]=$row[53]; //age 

    $subdata[]=$row[54]; //age             

    $subdata[]=$row[55]; //age 

    $subdata[]=$row[56]; //age 

    $subdata[]=$row[57]; //age 

    $subdata[]=$row[58]; //age 

    $subdata[]=$row[59]; //age 

    $subdata[]=$row[60]; //age 

    $subdata[]=$row[61]; //age 

    $subdata[]=$row[62]; //age 

    $subdata[]=$row[63]; //age 

    $subdata[]=$row[64]; //age 

    $subdata[]=$row[65]; //age 

    $subdata[]=$row[66]; //age 

    $subdata[]=$row[67]; //age 

    $subdata[]=$row[68]; //age 

    $subdata[]=$row[69]; //age 

    $subdata[]=$row[70]; //age 

    $subdata[]=$row[71]; //age 

    $subdata[]=$row[72]; //age 

    $subdata[]=$row[73]; //age 

    $subdata[]=$row[74]; //age 

    $subdata[]=$row[75]; //age 

    $subdata[]=$row[76]; //age 

    $subdata[]=$row[77]; //age 

    $subdata[]=$row[78]; //age 

    $subdata[]=$row[79]; //age 

    $subdata[]=$row[80]; //age 

    $subdata[]=$row[81]; //age 

    $subdata[]=$row[82]; //age 

    $subdata[]=$row[83]; //age 

    $subdata[]=$row[84]; //age 

    $subdata[]=$row[85]; //age 

    $subdata[]=$row[86]; //age 

    $subdata[]=$row[87]; //age 

    $subdata[]=$row[88]; //age 

    $subdata[]=$row[89]; //age 



    //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table o

    // $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button>

    //             <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Delete</button>';

    $data[]=$subdata;

}

$json_data=array(

    "draw"              =>  intval($request['draw']),

    "recordsTotal"      =>  intval($totalData),

    "recordsFiltered"   =>  intval($totalFilter),

    "data"              =>  $data

);

echo json_encode($json_data);

?>