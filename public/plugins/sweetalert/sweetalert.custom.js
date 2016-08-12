function swalConfirm(msg, action) {
	swal({
	  title: "Apakah anda yakin?",
	  text: msg,
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#dd4b39",
	  confirmButtonText: "OK"	  
	}, action);
}