var slide=1; 
function slider(n){
    document.querySelector('#slide'+slide).style.display='none';
    slide=slide+n;
    if(slide>2) slide=1;
    if(slide<1) slide=2;
    document.querySelector('#slide'+slide).style.display='block';
    return false;
}
