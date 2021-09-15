// Ketika documentnya sudah siap, maka jalankan fungsi di dalamnya
$(function() {

    // Meminta jQuery untuk mencarikan elemen yang nama classnya tombolTambahData, lalu ketika di klik
    $('.tombolTambahData').on('click', function() {
        /*
         * Meminta jQuery untuk mencarikan elemen yang id nya formModalLabel jika sudah ketemu maka ubah isinya
         * menjadi Tambah Data Mahasiswa
         */
        $('#formModalLabel').html('Tambah Data Mahasiswa');

       /*
        * Meminta jQuery untuk mencarikan elemen yang id nya modal-footer lalu ambil button di dalamnya tapi yang 
        * tipe button nya submit saja, lalu ganti isinya dengan Tambah Data
        */
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });


    // Meminta jQuery untuk mencarikan elemen yang nama classnya tampilModalUbah, lalu ketika di klik
    $('.tampilModalUbah').on('click', function() {
        /*
         * Meminta jQuery untuk mencarikan elemen yang id nya formModalLabel jika sudah ketemu maka ubah isinya
         * menjadi Ubah Data Mahasiswa
         */
        $('#formModalLabel').html('Ubah Data Mahasiswa');

        /*
         * Meminta jQuery untuk mencarikan elemen yang id nya modal-footer lalu ambil button di dalamnya tapi yang 
         * tipe button nya submit saja, lalu ganti isinya dengan Ubah Data
         */
        $('.modal-footer button[type=submit]').html('Ubah Data');

       /*
        * Meminta jQuery untuk mencarikan elemen yang id nya modal-body lalu cari form di dalamnya lalu ubah atribut acctionnya
        */
        $('.modal-body form').attr('action', 'http://localhost/Belajar%20PHP%20MVC/latihan11/public/mahasiswa/ubah');


        const id = $(this).data('id');
        
        $.ajax({
            // Meminta data url dari method getubah
            url: 'http://localhost/Belajar%20PHP%20MVC/latihan11/public/mahasiswa/getubah',
            // Id sebelah kiri adalah nama data yang dikirimkan, id sebelah kanan adalah isi datanya
            data: {id : id},
            // Menggunakan method post
            method: 'post',
            // Ajax akan mengembalikan data berupa json
            dataType: 'json',
            // Jika permintaan ajax dari url berhasil, dan jika ada data yang ingin dikembalikan maka ditangkap variabel data
            success: function(data) {
                // Meminta jQuery untuk mencarikan elemen yang id nya nama lalu ubah value nya ganti dengan data nama
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });

});