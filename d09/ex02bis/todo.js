var index = 0;

$( document ).ready(function() {
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++) {
    cookies[i] = cookies[i].trim();
    var el = cookies[i].split("=");
    if (el.length == 2) {
      document.cookie = el[0] + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      create(el[0], el[1]);
    }
  }
});

function create(id, text){
  $("#ft_list").prepend('<div id="'+id+'" class="to_do">'+text+'</div>');
  document.cookie = "to_do_"+index+"="+text+"; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
  index++;
}

$(document).on('click', '.to_do', function(event){
   var val = event.target.id;
  if (confirm("Voulez-vous supprimer cette to do ?")) {
      document.cookie = ""+val+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      $("#"+val).remove();
    }
});

$("#new").click(function(){
  var text = prompt("Please enter your to do", "");

  if (text != null) {
    $("#ft_list").prepend('<div id="'+index+'" class="to_do">'+text+'</div>');
    document.cookie = "to_do_"+index+"="+text+"; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
    index++;
  }
});
