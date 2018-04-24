$(document).ready(function(){
  $(".menu").click(function(){
    $(this).toggleClass("is-active");
  });
  $("#outsidediv").click(function(){
    $(".menu").toggleClass("is-active");
  });
});