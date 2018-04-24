
//form submit button
$("#form1").submit(function(event){

//store variables
var name = $('form').find('input[name="name"]').val();
var url = $('form').find('input[name="URL"]').val();
var description = $('form').find('input[name="description"]').val();


//create array to store them
var array = [{'name':name,'URL':url,'description':description}];

//convert to json
var json = JSON.stringify(array);
alert(json);

//send post request with data to the services PHP
$.ajax({
	type: "POST",
	dataType:"json",
	data:json,
	url:'Services/new.php',
	success: function(data){
		alert(data);
	}
});

 

});



//on the update button
$("#formUpdate").submit(function(event){

//get elements using jquery
var name = $('#formUpdate').find('input[name="nameUpdate"]').val();
var url = $('#formUpdate').find('input[name="URLUpdate"]').val();
var description = $('#formUpdate').find('input[name="descriptionUpdate"]').val();
var id = $('#formUpdate').find('input[name="idUpdate"]').val();


//put into array
var array = [{'name':name,'URL':url,'description':description,'id':id}];

//convert to json
var json = JSON.stringify(array);
alert(json);

//send json through AJAX PUT = update
$.ajax({
	type: "PUT",
	dataType:"json",
	data:json,
	url:'Services/new.php',
	success: function(data){
		alert(data);
	}
});

 

});

//on delete button

$("#formDelete").submit(function(event){


// get id
var id = $('#formDelete').find('input[name="idDelete"]').val();


//put into a name-value pair array
var array = [{'id':id}];

//convert to json
var json = JSON.stringify(array);
alert(json);

//send through AJAX delete
$.ajax({
	type: "DELETE",
	dataType:"json",
	data:json,
	url:'Services/new.php',
	success: function(data){
		alert(data);
	}
});

 

});

//on view button

$("#formView").submit(function(event){


//get ID you want to view
var id = $('#formView').find('input[name="IDView"]').val();


//store in array
var array = [{'id':id}];

//convert to json
var json = JSON.stringify(array);
alert(json);

// send through ajax uniquely created request
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

//jquery on click, load a particular json file
$("#dataBack").click(function(event){


$.getJSON( "../Data/database.json", function( data ) {
  
$('#table').append("<tr><td>"+data[0]+"</td><td>"+data[1]+"</td><td>"+data[2]+"</td><td>"+data[3]+"</td>");
});

});



 





