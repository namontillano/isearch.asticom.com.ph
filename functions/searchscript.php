<script type="text/javascript">

  $(document).ready(function(){
   $( "#findkeyword" ).keyup(function(){
    if ($("#findkeyword").val().length >= 2) {
     findkeyword();
 } else {
     document.getElementById("search_items" ).innerHTML = '';
 }
});
});

  function findkeyword(){
   var val = document.getElementById( "findkeyword" ).value;
   $.ajax({
    type: 'post',
    url: 'functions/search.php',
    data: {
     keyword:val
 },
 success: function (response) {
     document.getElementById( "search_items" ).innerHTML = response; 
 }
});
}
</script>