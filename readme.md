Error Note:

Pada waktu input data "permohonan", jika error pada form lakukan hal berikut:

1. Masuk Phpmyadmin -> variables -> cari sql_mode -> edit dan hapus FULL GROUP BY;

ATAU

2. copy script berikut ke console phpmyadmin -> SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

