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



leftrightslide[0]='<a href="" target="_blank"><img src="slideshow/slides/craftsman.jpg" alt="Imagem 0" /></a>'

leftrightslide[1]='<a href="" target="_blank"><img src="slideshow/slides/bannercacia.jpg" alt="Imagem 1" /></a>'

leftrightslide[2]='<a href="" target="_blank"><img src="slideshow/slides/Chirodrop.jpg" alt="Imagem 2" /></a>'

leftrightslide[3]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 3" /></a>'

leftrightslide[4]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 4" /></a>'

leftrightslide[5]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 5" /></a>'

leftrightslide[6]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 6" /></a>'

leftrightslide[7]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 7" /></a>'

leftrightslide[8]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 8" /></a>'

leftrightslide[9]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 9" /></a>'

leftrightslide[10]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 10" /></a>'

leftrightslide[11]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 11" /></a>'

leftrightslide[12]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 12" /></a>'

leftrightslide[13]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 13" /></a>'

leftrightslide[14]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 14" /></a>'

leftrightslide[15]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 15" /></a>'

leftrightslide[16]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.JPG" alt="Imagem 16" /></a>'

leftrightslide[17]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 17" /></a>'

leftrightslide[18]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 18" /></a>'

leftrightslide[19]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 19" /></a>'

leftrightslide[20]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 20" /></a>'

leftrightslide[21]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 21" /></a>'

leftrightslide[22]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 22" /></a>'

leftrightslide[23]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 23" /></a>'

leftrightslide[24]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 24" /></a>'

leftrightslide[25]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 25" /></a>'

leftrightslide[26]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 26" /></a>'

leftrightslide[27]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 27" /></a>'

leftrightslide[28]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 28" /></a>'

leftrightslide[29]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 29" /></a>'

leftrightslide[30]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 30" /></a>'

leftrightslide[31]='<a href="" target="_blank"><img src="slideshow/slides/imagem_1.jpg" alt="Imagem 31" /></a>'





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