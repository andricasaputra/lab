window.onload = setInterval(clock,0);

function clock(){

    let d = new Date();

    let tanggal = d.getDate();

    let bulan = d.getMonth();

    let bulanarray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    bulan = bulanarray[bulan];

    tanggal = formatwaktu(tanggal);

    let tahun = d.getFullYear();

    let hari = d.getDay();

    let hariarray = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];

    hari = hariarray[hari];

    let jam = d.getHours();

    let menit = d.getMinutes();

    let detik = d.getSeconds(); 

    jam=formatwaktu(jam);

    menit=formatwaktu(menit);

    detik=formatwaktu(detik)

    document.getElementById("hariini").innerHTML=hari+" "+tanggal+" "+bulan+" "+tahun;

    document.getElementById("jam").innerHTML=jam+":"+menit+":"+detik;       

}

function formatwaktu(i){

    if(i<10){

        i="0"+i;

    }

    return i;

}


function waktu (){

    let jam = new Date();

    setTimeout("waktu()", 1000);

    document.getElementById("jam").innerHTML = jam.getHours()+":"+jam.getMinutes()+":"+jam.getSeconds();

}















