 function deleteUser(id) {
	swal({   title: "Menghapus Data",   
	text: "Data Tidak Dapat dikembalikan",
	type: "warning",
	showCancelButton: true,
	confirmButtonColor: "#DD6B55",
	confirmButtonText: "Hapus Data!",
	cancelButtonText: "Batalkan!",
	closeOnConfirm: false,
	closeOnCancel: false }, 
	function(isConfirm){ 
	  if (isConfirm) {
		window.location.href="/user/delete/" + id;
	  } else { 
		swal("Dibatalkan", "Data Anda Tidak Dihapus. ", "error");   
	  } });
}