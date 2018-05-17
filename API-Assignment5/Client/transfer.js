

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


$("#formDelete").submit(function(event){



var id = $('#formDelete').find('input[name="idDelete"]').val();



var array = [{'id':id}];


var json = JSON.stringify(array);
alert(json);


$.ajax({
	type: "DELETE",
	dataType:"json",
	data:json,
	url:'/Assignment5/Services/new.php',
	success: function(data){
		alert(data);
	}
});

 

});

$("#formView").submit(function(event){



var id = $('#formView').find('input[name="IDView"]').val();



var array = [{'id':id}];


var json = JSON.stringify(array);
alert(json);

 // $.getJSON("demo_ajax_json.js", function(result){
 //            $.each(result, function(i, field){
 //                $("demo").append(field + " ");
 //            });
 //        });



 //    });

		$.ajax({
			type: "GET_POST",
			dataType:"json",
			data:json,
			url:'/Assignment5/Services/new.php',
			success: function(data){
				alert(data);
			}
		});



 
   


});


$("#dataBack").click(function(event){


$.getJSON( "../Data/database.json", function( data ) {
  
$('#table').append("<tr><td>"+data[0]+"</td><td>"+data[1]+"</td><td>"+data[2]+"</td><td>"+data[3]+"</td>");
});

});



 





