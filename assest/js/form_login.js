function getOption() { 
     selectElement =  
             document.querySelector('#select1'); 
               
     output = selectElement.value; 
     if(output==2)
     {
          document.querySelector('#team_type').style.display='block' ;
                    
     }
     if(output==1)
     {
          document.querySelector('#team_type').style.display='none' ;
                    
     }
    
 }