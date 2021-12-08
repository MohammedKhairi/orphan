

    $("button").click(function(){
        var   name= $("input[name='name']").val();
        var   pass= $("input[name='pass']").val();
        var   email= $("input[name='email']").val();

        $.ajax({
            url: 'http://localhost/chlidren/User/create_user',
            type: 'POST',
            data: {name: name, pass: pass, email: email},
            error: function() {
              alert('Something is wrong');
            },
            success: function(data) {
                alert(data);  
            }
        });
      });