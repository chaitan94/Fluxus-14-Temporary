$("#regSubmit").click(function(){
	$.post("ajax/register.php", {name: $("#regName").val(), college: $("#regColl").val(), city: $("#regCity").val(), mail: $("#regEmail").val()}, function(data){
		if(data)
			alert(data);
	});
});