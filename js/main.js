$(document).ready( function(){
	$("#PayID").click ( function() {
		let Sum = $("#SumID").val();
		let PurOfPay = $("#PurOfPayID").val();
		if (Sum === "" || PurOfPay === "") {
			return false;
		}
		$.ajax ({
			url: "../api/v1.0/session/session.php",
			type: "POST",
			cache: false,
			data: {'Sum': Sum, 'PurOfPay': PurOfPay},
			dataType: 'html',
			success: function(data) {
				let dataJSON = JSON.parse(data);
				if (dataJSON.stat == 200) {
					$("#response").html ("ID сессии:" + " " + dataJSON.id);
				}
			}
		});
	});
});