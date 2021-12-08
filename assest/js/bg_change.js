var i = 0; // Start point
var images = [];
var time = 3000;

// Image List
images[0] = 'url(assest/css/image/bg1.jpg)';
images[1] = 'url(assest/css/image/bg2.png)';
images[2] = 'url(assest/css/image/bg3.jpg)';

// Change Image
function changeImg(){
    document.getElementById('bg__image').style.backgroundImage =images[i];
    //document.getElementById('bg__image').style.transition =' 500ms';
    //document.slide.src = images[i];
    if(i < images.length - 1){
        i++;
    } else {
        i = 0;
    }

    setTimeout("changeImg()", time);
}

window.onload = changeImg;