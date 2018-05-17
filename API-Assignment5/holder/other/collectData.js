function getData(){


	var form = document.getElementById('form');

	var name = form[0].value;
	var url = form[1].value;
	var description = form[2].value;

	
	var obj = '{"name:"'+name+",URL:"+url+" ,Description:"+description+"}";

	var fin = JSON.stringify(obj);

	window.location="collector.php";


	
}