//JQuery busqueda de datos 
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
      var value = $(this).val().toUpperCase();
      $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toUpperCase().indexOf(value) > -1)
      });
  });
  });
