// search for orphan than not  spons البحث عن الايتام غير المكفولين

$(document).ready(function(){
    var query =document.getElementById('sel1').value;
   /// alert(query);
    load_data();
    function load_data(query)
    {
    var query =document.getElementById('sel1').value;
     $.ajax({
      url:'orphan/get_one',
      method:"POST",
      data:{query:query},
      success:function(data){
       $('#result22').html(data);
      }
     })
    }
   
    $('#sel1').change(function(){
     var search = document.getElementById('sel1').value;
     if(search != '')
     {
      load_data(search);
     }
     else
     {
      load_data();
     }
    });
   });
