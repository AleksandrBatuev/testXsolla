$(document).ready( function(){
	$("#InItID").click ( function() {
		let NumberCard = $("#numberID").val();
		let Datacard = $("#data").val();
		let CVC = $("#cvc").val();
		if (NumberCard === "" || Datacard === "" || CVC === "") {
			return false;
		}
		$.ajax ({
			url: "../api/v1.0/cardInfo/card.php",
			type: "POST",
			cache: false,
			data: {'NumberCard': NumberCard, 'Datacard': Datacard, 'CVC': CVC},
			dataType: 'html',
			success: function(data) {
				let dataJS = JSON.parse(data);
				if (dataJS.stat == true) {
					$("#res").html ("Программа отработала успешно");
				} else {
					$("#res").html ("Номер карты введен неверно");
				}
			}
		});
	});
});