// var urls="<? php echo base_url().'orphan/fetch' ?>";
//var tid=document.getElementById('t_id');

    function load_data(query)
    {
     $.ajax({
      url:'../User/one_team_task',
      method:"POST",
      data:{query:query},
      success:function(data){
       $('#result').html(data);
      }
     })
    }


function get_id(id)
{
   var search = id;
     if(search != '')
     {
      load_data(search);
     }
     else
     {
      load_data();
     }
  //alert(id);
}
