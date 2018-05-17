

$("#form1").submit(function(event){


var name = $('form').find('input[name="name"]').val();
var url = $('form').find('input[name="URL"]').val();
var description = $('form').find('input[name="description"]').val();



var array = [{'name':name,'URL':url,'description':description}];


var json = JSON.stringify(array);
alert(json);


$.ajax({
	type: "POST",
	dataType:"json",
	data:json,
	url:'/Assignment5/Services/new.php',
	success: function(data){
		alert(data);
	}
});

 

});




$("#formUpdate").submit(function(event){


var name = $('#formUpdate').find('input[name="nameUpdate"]').val();
var url = $('#formUpdate').find('input[name="URLUpdate"]').val();
var description = $('#formUpdate').find('input[name="descriptionUpdate"]').val();
var id = $('#formUpdate').find('input[name="idUpdate"]').val();



var array = [{'name':name,'URL':url,'description':description,'id':id}];


var json = JSON.stringify(array);
alert(json);


$.ajax({
	type: "PUT",
	dataType:"json",
	data:json,
	url:'/Assignment5/Services/new.php',
	success: function(data){
		alert(data);
	}
});

 

});
// $("#formUpdate").submit(function(event){


// var name = $('#formUpdate').find('input[name="name"]').val();
// var url = $('#formUpdate').find('input[name="URL"]').val();
// var description = $('#formUpdate').find('input[name="description"]').val();
// var id = $('#formUpdate').find('input[name="id"]').val();



// var array = [{'name':name,'URL':url,'description':description,'id':id}];


// var json = JSON.stringify(array);
// alert(json);


// $.ajax({
// 	type: "PUT",
// 	dataType:"json",
// 	data:json,
// 	url:'/Assignment5/new.php',
// 	success: function(data){
// 		alert(data);
// 	}
// });


// });


