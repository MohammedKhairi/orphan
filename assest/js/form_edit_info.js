var form=document.getElementById('form_u');

function name_u() 
{ 
    form.innerHTML+='<form action ="Update/name" method="post"><div class="form-group"><label for="email">الاسم الجديد </label><input style="direction: rtl;" type="text" name="name" class="form-control" id="name" placeholder=" الرجاء قم بأدخال الاسم الجديد"></div><div class="form-group"><button type="submit" style="float: right;"  id="button" class="btn btn-success col-md-2">  تحديث</button></div></form>';
    
 }
 function pass_u() 
{ 
    form.innerHTML+='<form action ="Update/password" method="post"><div class="form-group"><label for="email">الرمز الجديد </label><input style="direction: rtl;" type="password" name="pass" class="form-control" id="name" placeholder=" الرجاء قم بأدخال الرمز الجديد"></div><div class="form-group"><button type="submit" style="float: right;"  id="button" class="btn btn-success col-md-2">  تحديث</button></div></form>';
    
 }
 function email_u() 
 { 
     form.innerHTML+='<form action ="Update/email" method="post"><div class="form-group"><label for="email">الايميل الجديد </label><input style="direction: rtl;" type="email" name="email" class="form-control" id="name" placeholder=" الرجاء قم بأدخال الايميل"></div><div class="form-group"><button type="submit" style="float: right;"  id="button" class="btn btn-success col-md-2">  تحديث</button></div></form>';
     
  }
 
 function address_u() 
{ 
    form.innerHTML+='<form action ="Update/address" method="post"><div class="form-group"><label for="email">العنوان الجديد </label><input style="direction: rtl;" type="text" name="address" class="form-control" id="name" placeholder=" الرجاء قم بأدخال عنوانك"></div><div class="form-group"><button type="submit" style="float: right;"  id="button" class="btn btn-success col-md-2">  تحديث</button></div></form>';
    
 }
 function phone_u() 
{ 
    form.innerHTML+='<form action ="Update/phone" method="post"><div class="form-group"><label for="email">رقم الهاتف الجديد </label><input style="direction: rtl;" type="number" name="phone" class="form-control" id="name" placeholder=" الرجاء قم بأدخال رقم هاتفك الجديد"></div><div class="form-group"><button type="submit" style="float: right;"  id="button" class="btn btn-success col-md-2">  تحديث</button></div></form>';
 }

 function img_u() 
 { 
     form.innerHTML+='<form enctype="multipart/form-data" action ="Update/img" method="post"><div class="form-group"><label for="email">  الصورة الشخصية الجديدة </label><input style="direction: rtl;" type="file" name="userfile" class="form-control" id="formGroupExampleInput"></div><div class="form-group"><button type="submit" style="float: right;"  id="button" class="btn btn-success col-md-2">  تحديث</button></div></form>';
  }