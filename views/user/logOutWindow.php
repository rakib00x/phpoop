<script>
$("#logout").click(function(event){
	event.preventDefault();
  	Swal.fire({
		title: "<?php echo $this->langpack["reg_and_sign"]["log_out"]["sure"]?>",
		text: "<?php echo $this->langpack["reg_and_sign"]["log_out"]["autrz"]?>",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#FE980F',
		cancelButtonColor: '#FE980F',
		confirmButtonText: "<?php echo $this->langpack["reg_and_sign"]["log_out"]["confirm"]?>",
		cancelButtonText: "<?php echo $this->langpack["reg_and_sign"]["log_out"]["decline"]?>"
	}).then((result) => {
		if (result.isConfirmed) {
		  	$.get('/user/logout', ()=>{
		  		console.log("logout was successful");
		  	}).done(()=>window.location = `/<?php echo "{$this->lang}/user/login"?>`);
		}
	});
})
</script>