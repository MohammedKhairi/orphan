
// const parell=document.getElementById('parax');

// window.addEventListener('scroll', function(){
//     let offset=Window.pageYOffset;
//    console.log('ofset'+offset);

//    console.log('ofset'+offset*1.5);


//     parell.style.backgroundPositionY=offset*1.5+"px";

// });
// alert("work");
const logo=document.querySelectorAll("#logo_t path");

for(let i=0;i<logo.length;i++)
{
    console.log('Letter '+i+' is '+logo[i].getTotalLength());
    
}