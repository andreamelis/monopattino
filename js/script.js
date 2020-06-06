$(document).ready(function() {
  $(".menu").click(function(){ 			
    $(".container").load("http://localhost/monopattino/php/menu.php?menu="+this.id);
  });
});	