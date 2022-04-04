Error Note:

Pada waktu input data "permohonan", jika error pada form lakukan hal berikut:

1. Masuk Phpmyadmin -> variables -> cari sql_mode -> edit dan hapus FULL GROUP BY;

ATAU

2. copy script berikut ke console phpmyadmin -> 
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));


--ERROR 1118 (42000) at line 1852:    
Row size too large (> 8126). Changing some columns to TEXT or 
     BLOB may help. In current row format, BLOB prefix of 0 bytes is stored inline.

SOLUTION 

SET GLOBAL innodb_strict_mode = 0;

-- PERUBAHAN NAMA JABATAN --

1. MANAJER TEKNIS -> KORFUNG KH/KT
2. MAMAJER ADMINISTRASI -> KOSONG ?
3. KEPALA URUSAN TATA USAHA -> KEPALA KESEKRETARIATAN
4. KASUBSIE YANOPS -> KEPALA URUSAN TEKNIS
5. KEPALA/PLH/MT -> KETUA POKJA KH & KT

MYSQL IMPORT BULK DATABASE

1. mysql -uusername -p db_name < path_to_sql_file
2. mysql --login-path=your-user db_name < path_to_sql_file


