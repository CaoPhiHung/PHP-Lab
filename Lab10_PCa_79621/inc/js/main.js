$( document ).ready( function() {
 $( "span.addToCart" ).on( "click", function() {
  var id = $(this).attr("data-id");
  $.ajax( {
   type: "GET",
   url: "inc/ajax.inc.php?id=" + id + "&action=add"
  })
  .done(function()
  {
   alert("Product have been added.");
  });
 });
});