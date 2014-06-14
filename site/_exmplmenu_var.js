/***********************************************************************************

*	(c) Ger Versluis 2000 version 5.411 24 December 2001 (updated Jan 31st, 2003 by Dynamic Drive for Opera7)

*	For info write to menus@burmees.nl		          *

*	You may remove all comments for faster loading	          *		

***********************************************************************************/



	var NoOffFirstLineMenus=9;			// Number of first level items

	var LowBgColor='yellow';			// Background color when mouse is not over

	var LowSubBgColor='yellow';			// Background color when mouse is not over on subs

	var HighBgColor='#FFFF8A';			// Background color when mouse is over

	var HighSubBgColor='#FFFF8A';			// Background color when mouse is over on subs

	var FontLowColor='blue';			// Font color when mouse is not over

	var FontSubLowColor='blue';			// Font color subs when mouse is not over

	var FontHighColor='blue';			// Font color when mouse is over

	var FontSubHighColor='blue';			// Font color subs when mouse is over

	var BorderColor='blue';			// Border color

	var BorderSubColor='blue';			// Border color for subs

	var BorderWidth=2;				// Border width

	var BorderBtwnElmnts=1;			// Border between elements 1 or 0

	var FontFamily="verdana";	// Font family menu items

	var FontSize=7;				// Font size menu items

	var FontBold=1;				// Bold menu items 1 or 0

	var FontItalic=0;				// Italic menu items 1 or 0

	var MenuTextCentered='left';			// Item text position 'left', 'center' or 'right'

	var MenuCentered='left';			// Menu horizontal position 'left', 'center' or 'right'

	var MenuVerticalCentered='top';		// Menu vertical position 'top', 'middle','bottom' or static

	var ChildOverlap=.2;				// horizontal overlap child/ parent

	var ChildVerticalOverlap=.2;			// vertical overlap child/ parent

	var StartTop=0;					// Menu offset x coordinate

	var StartLeft=0;				// Menu offset y coordinate

	var VerCorrect=0;				// Multiple frames y correction

	var HorCorrect=0;				// Multiple frames x correction

	var LeftPaddng=3;				// Left padding

	var TopPaddng=2;				// Top padding

	var FirstLineHorizontal=0;			// SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL

	var MenuFramesVertical=1;			// Frames in cols or rows 1 or 0

	var DissapearDelay=1000;			// delay before menu folds in

	var TakeOverBgColor=1;			// Menu frame takes over background color subitem frame

	var FirstLineFrame='navig';			// Frame where first level appears

	var SecLineFrame='space';			// Frame where sub levels appear

	var DocTargetFrame='space';			// Frame where target documents appear

	var TargetLoc='posicao_menu';				// span id for relative positioning

	var HideTop=0;				// Hide first level when loading new document 1 or 0

	var MenuWrap=1;				// enables/ disables menu wrap 1 or 0

	var RightToLeft=0;				// enables/ disables right to left unfold 1 or 0

	var UnfoldsOnClick=0;			// Level 1 unfolds onclick/ onmouseover

	var WebMasterCheck=0;			// menu tree checking on or off 1 or 0

	var ShowArrow=0;				// Uses arrow gifs when 1

	var KeepHilite=1;				// Keep selected path highligthed

	//var Arrws=['tri.gif',5,10,'tridown.gif',10,5,'trileft.gif',5,10];	// Arrow source, width and height



function BeforeStart(){return}

function AfterBuild(){return}

function BeforeFirstOpen(){return}

function AfterCloseAll(){return}





// Menu tree

//	MenuX=new Array(Text to show, Link, background image (optional), number of sub elements, height, width);

//	For rollover images set "Text to show" to:  "rollover:Image1.jpg:Image2.jpg"



Menu1=new Array("APRESENTAÇÃO","home.php","",0,20,160);

	


Menu2=new Array("CURSOS","","",13,20,160);

	Menu2_1=new Array("AURICULOTERAPIA","auriculoterapia.php","",0,20,200);	

	Menu2_2=new Array("BANDAGEM FUNCIONAL","bandagem_funcional.php","",0);

	Menu2_3=new Array("<span style='color:green;'>&nbsp;DERMATO FUNCIONAL</span><span style='color:red; text-decoration:blink;'>(novo curso)</span>","dermato_funcional.php","",0);

	Menu2_4=new Array("CROCHETAGEM","crochetagem.php","",0);

	Menu2_5=new Array("DRENAGEM LINFÁTICA MANUAL","drenagem_linfatica.php","",0);

	Menu2_6=new Array(" ELETROTERAPIA NA ESTÉTICA","eletrolipolise.php","",0);

	Menu2_7=new Array("INELASTOTERAPIA","inelastoretapia.php","",0);

	Menu2_8=new Array("MANIPULAÇÃO ARTICULAR","manipulacao_articular.php","",0);

	Menu2_9=new Array("MASSOTERAPIA","massoterapia.php","",0);

	Menu2_10=new Array("MOBILIZAÇÃO NEURAL","mobilizacao_neural.php","",0);

	Menu2_11=new Array("ANATOMIA PALPATÓRIA","anatomia_palpatoria.php","",0);

	Menu2_12=new Array("FRICÇÃO TRANSVERSA","friccao_transversa.php","",0);

	Menu2_13=new Array("PILATES","pilates.php","",0);



Menu3=new Array("INDICAÇÕES","indicacao.php","",0,20,160);


Menu4=new Array("CALENDÁRIO","","",12,20,160);

	Menu4_1=new Array("CROCHETAGEM","cal_crochetagem.php","",0,20,200);

	Menu4_2=new Array("<span style='color:green;'>&nbsp;DERMATO FUNCIONAL</span><span style='color:red; text-decoration:blink;'>(novo curso)</span>","cal_dermato.php","",0);

	Menu4_3=new Array("MOBILIZAÇÃO NEURAL","cal_mobilizacao.php","",0);

	Menu4_4=new Array("MANIPULAÇÃO ARTICULAR","cal_manipulacao.php","",0);

	Menu4_5=new Array("BANDAGEM FUNCIONAL","cal_bandagem.php","",0);

	Menu4_6=new Array("DRENAGEM LINFÁTICA MANUAL","cal_drenagem.php","",0);

	Menu4_7=new Array("ANATOMIA PALPATÓRIA","cal_anatomia.php","",0);

	Menu4_8=new Array("FRICÇÃO TRANSVERSA","cal_friccao_transversa.php","",0);

	Menu4_9=new Array("MASSOTERAPIA","cal_massoterapia.php","",0);

	Menu4_10=new Array("AURICULOTERAPIA","cal_auriculoterapia.php","",0,20,200);

	Menu4_11=new Array("ELETROTERAPIA NA ESTÉTICA","cal_eletrolipolise.php","",0);

	Menu4_12=new Array("PILATES","cal_pilates.php","",0);



Menu5=new Array("GALERIA","galeria.php","",0,20,160);



Menu6=new Array("HISTÓRIA...","estoria.php","",0,20,160);



Menu7=new Array("FICHA TÉCNICA","ficha_tecnica.php","",0,20,160);



Menu8=new Array("LOCALIZAÇÃO","localizacao.php","",0,20,160);



Menu9=new Array("CONTACT CENTER","contact_center.php","",0,20,160);