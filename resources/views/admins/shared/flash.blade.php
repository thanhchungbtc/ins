
@if(session()->has('flash_message_overlay'))
	<script>

		swal({
	      title: "{{ session('flash_message_overlay.title') }}",
	      text: "{{ session('flash_message_overlay.message') }}",
	      type: "{{ session('flash_message_overlay.level') }}",
	      showCancelButton: true,
	      cancelButtonText: 'No, cancel plx'
	      confirmButtonText: 'Yeap, i got it',
	      showConfirmButton: true
	   });
	</script>
@endif