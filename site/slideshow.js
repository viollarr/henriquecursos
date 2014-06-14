//Specify the slider's width (in pixels)

var sliderwidth="545px"

//Specify the slider's height

var sliderheight="150px"

//Specify the slider's slide speed (larger is faster 1-10)

var slidespeed=2

//configure background color:

slidebgcolor="#FFFF00"



//Specify the slider's images

var leftrightslide=new Array()

var finalslide=''



//leftrightslide[0]='<img src="slideshow/slideshow77.jpg" alt="Imagem 0" />'

leftrightslide[1]='<img src="slideshow/slideshow76.jpg" alt="Imagem 1" />'

leftrightslide[2]='<img src="slideshow/slideshow75.jpg" alt="Imagem 2" />'

leftrightslide[3]='<img src="slideshow/slideshow74.jpg" alt="Imagem 3" />'

leftrightslide[4]='<img src="slideshow/slideshow73.jpg" alt="Imagem 4" />'

//leftrightslide[5]='<img src="slideshow/slideshow72.jpg" alt="Imagem 5" />'

leftrightslide[6]='<img src="slideshow/slideshow71.jpg" alt="Imagem 6" />'

leftrightslide[7]='<img src="slideshow/slideshow70.jpg" alt="Imagem 7" />'

//leftrightslide[8]='<img src="slideshow/slideshow69.jpg" alt="Imagem 8" />'

leftrightslide[9]='<img src="slideshow/slideshow68.jpg" alt="Imagem 9" />'

//leftrightslide[10]='<img src="slideshow/slideshow63.jpg" alt="Imagem 10" />'



//leftrightslide[11]='<img src="slideshow/slideshow62.jpg" alt="Imagem 11" />'

leftrightslide[12]='<img src="slideshow/slideshow60.jpg" alt="Imagem 12" />'

//leftrightslide[13]='<img src="slideshow/slideshow58.jpg" alt="Imagem 13" />'

//leftrightslide[14]='<img src="slideshow/slideshow54.jpg" alt="Imagem 14" />'

leftrightslide[15]='<img src="slideshow/slideshow78.jpg" alt="Imagem 15" />'

leftrightslide[16]='<img src="slideshow/slideshow43.JPG" alt="Imagem 16" />'

//leftrightslide[17]='<img src="slideshow/slideshow39.jpg" alt="Imagem 17" />'

leftrightslide[18]='<img src="slideshow/slideshow40.jpg" alt="Imagem 18" />'

leftrightslide[19]='<img src="slideshow/slideshow32.jpg" alt="Imagem 19" />'

leftrightslide[20]='<img src="slideshow/slideshow28.jpg" alt="Imagem 20" />'



//leftrightslide[21]='<img src="slideshow/slideshow21.jpg" alt="Imagem 21" />'

leftrightslide[22]='<img src="slideshow/slideshow24.jpg" alt="Imagem 22" />'

//leftrightslide[23]='<img src="slideshow/slideshow5.jpg" alt="Imagem 23" />'

//leftrightslide[24]='<img src="slideshow/slideshow6.jpg" alt="Imagem 24" />'

//leftrightslide[25]='<img src="slideshow/slideshow7.jpg" alt="Imagem 25" />'

leftrightslide[26]='<img src="slideshow/slideshow9.jpg" alt="Imagem 26" />'

//leftrightslide[27]='<img src="slideshow/slideshow10.jpg" alt="Imagem 27" />'

leftrightslide[28]='<img src="slideshow/slideshow37.jpg" alt="Imagem 28" />'

leftrightslide[29]='<img src="slideshow/slideshow38.jpg" alt="Imagem 29" />'

leftrightslide[30]='<img src="slideshow/slideshow79.jpg" alt="Imagem 30" />'

leftrightslide[31]='<img src="slideshow/slideshow80.jpg" alt="Imagem 31" />'





//Specify gap between each image (use HTML):

var imagegap=""



//Specify pixels gap between each slideshow rotation (use integer):

var slideshowgap=5





////NO NEED TO EDIT BELOW THIS LINE////////////



var copyspeed=slidespeed

leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>'

var iedom=document.all||document.getElementById

if (iedom)

document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+leftrightslide+'</span>')

var actualwidth=''

var cross_slide, ns_slide



function fillup(){

if (iedom){

cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2

cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3

cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide

actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth

cross_slide2.style.left=actualwidth+slideshowgap+"px"

}

else if (document.layers){

ns_slide=document.ns_slidemenu.document.ns_slidemenu2

ns_slide2=document.ns_slidemenu.document.ns_slidemenu3

ns_slide.document.write(leftrightslide)

ns_slide.document.close()

actualwidth=ns_slide.document.width

ns_slide2.left=actualwidth+slideshowgap

ns_slide2.document.write(leftrightslide)

ns_slide2.document.close()

}

lefttime=setInterval("slideleft()",10)

}

window.onload=fillup



function slideleft(){

if (iedom){

if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8))

cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed+"px"

else

cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"



if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8))

cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed+"px"

else

cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"



}

else if (document.layers){

if (ns_slide.left>(actualwidth*(-1)+8))

ns_slide.left-=copyspeed

else

ns_slide.left=ns_slide2.left+actualwidth+slideshowgap



if (ns_slide2.left>(actualwidth*(-1)+8))

ns_slide2.left-=copyspeed

else

ns_slide2.left=ns_slide.left+actualwidth+slideshowgap

}

}





if (iedom||document.layers){

with (document){

document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')

if (iedom){

write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">')

write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed">')

write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')

write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')

write('</div></div>')

}

else if (document.layers){

write('<ilayer width='+ sliderwidth +' height='+ sliderheight +' name="ns_slidemenu" bgColor='+ slidebgcolor +'>')

write('<layer name="ns_slidemenu2" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')

write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')

write('</ilayer>')

}

document.write('</td></table>')

}

}