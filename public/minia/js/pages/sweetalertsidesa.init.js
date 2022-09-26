/*
Template Name: Minia - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Sweatalert Js File
*/


//Parameter
document.querySelector('#sa-params').addEventListener('submit', function (e) {
    var form = this;

    e.preventDefault();

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Anda akan mengubah akses data sesuai id kemendagri wilayah yang anda pilih",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Yes, yakin!',
        cancelButtonText: 'No, batalkan!',
        confirmButtonClass: 'btn btn-success mt-2',
        cancelButtonClass: 'btn btn-danger ms-2 mt-2',
        buttonsStyling: false,
        dangerMode: false,
    }).then(function (result) {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Akses berhasil diubah',
                icon: 'success',
                confirmButtonColor: '#5156be',
            }).then(function () {
                form.submit();
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) 
        {
            Swal.fire({
                title: 'Cancelled',
                text: 'Akses tidak jadi diubah :)',
                icon: 'error',
                confirmButtonColor: '#5156be',
            })
        }
    });
});