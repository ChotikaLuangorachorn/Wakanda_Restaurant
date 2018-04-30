$('#detail-empty-table').hide();
$('#show-detail').click(function(e){
	$('#detail-empty-table').toggle();
	var status = $('#show-detail').val();
	if(status=='close'){
		document.getElementById("show-detail").innerHTML = 'รายละเอียดโต๊ะ  <i class="fas fa-sort-up"></i>';
		$('#show-detail').val('open');
	}else{
		document.getElementById("show-detail").innerHTML = 'รายละเอียดโต๊ะ  <i class="fas fa-sort-down"></i>';
		$('#show-detail').val('close');
	}
});
