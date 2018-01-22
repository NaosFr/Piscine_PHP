var index = 0;

function load(){
	var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++) {
    cookies[i] = cookies[i].trim();
    var el = cookies[i].split("=");
    if (el.length == 2) {
      document.cookie = el[0] + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      create(el[0], el[1]);
    }
  }
}

function create(id, text){
  const divActuel = document.getElementById("ft_list");
  divActuel.insertAdjacentHTML('afterbegin', '<div id="'+id+'" onclick="del_todo()">'+text+'</div>');
  document.cookie = "to_do_"+index+"="+text+"; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
  index++;
}

function del_todo(){
	var val = event.srcElement.id;
  var element = document.getElementById(val);
	if (confirm("Voulez-vous supprimer cette to do ?")) { 
		document.cookie = ""+val+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    element.parentNode.removeChild(element);
   	}
}

function new_todo(){
	var text = prompt("Please enter your to do", "");
	const divActuel = document.getElementById("ft_list");

  if (text != null) {
  	divActuel.insertAdjacentHTML('afterbegin', '<div id="'+index+'" onclick="del_todo()">'+text+'</div>');
  	document.cookie = "to_do_"+index+"="+text+"; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
  	index++;
  }
}
