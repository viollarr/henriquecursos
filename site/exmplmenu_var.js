/***********************************************************************************



*	(c) Ger Versluis 2000 version 5.411 24 December 2001 (updated Jan 31st, 2003 by Dynamic Drive for Opera7)



*	For info write to menus@burmees.nl		          *



*	You may remove all comments for faster loading	          *		



***********************************************************************************/







	var NoOffFirstLineMenus=8;			// Number of first level items



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



Menu2=new Array("CURSOS","","",24,20,160);

		Menu2_1=new Array("ACUPUNTURA FACIAL","","",2,20,160);

				Menu2_1_1=new Array("CALENDÁRIO","cal_geral.php?id=13","",0,20,120);
				Menu2_1_2=new Array("PROGRAMA DO CURSO","acupuntura.php","",0,20,120);


		Menu2_2=new Array("ANATOMIA PALPATÓRIA &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);

				Menu2_2_1=new Array("CALENDÁRIO","cal_geral.php?id=7","",0,20,120);
				Menu2_2_2=new Array("PROGRAMA DO CURSO","anatomia_palpatoria.php","",0,20,120);


		Menu2_3=new Array("AURICULOTERAPIA &nbsp; <span style='color:red;'>abertas</span>","","",2,20,160);	
		
				Menu2_3_1=new Array("CALENDÁRIO","cal_geral.php?id=10","",0,20,120);	
				Menu2_3_2=new Array("PROGRAMA DO CURSO","auriculoterapia.php","",0,20,120);	


		Menu2_4=new Array("BANDAGEM FUNCIONAL &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);

				Menu2_4_1=new Array("CALENDÁRIO","cal_geral.php?id=5","",0,20,120);
				Menu2_4_2=new Array("PROGRAMA DO CURSO","bandagem_funcional.php","",0,20,120);


		Menu2_5=new Array("CARBOXITERAPIA &nbsp; <span style='color:red;'>abertas</span>","","",2,20,160);

				Menu2_5_1=new Array("CALENDÁRIO","cal_geral.php?id=23","",0,20,120);
				Menu2_5_2=new Array("PROGRAMA DO CURSO","carboxiterapia.php","",0,20,120);


		Menu2_6=new Array("CROCHETAGEM &nbsp; <span style='color:red;'>abertas</span>","","",2,20,160);

				Menu2_6_1=new Array("CALENDÁRIO","cal_geral.php?id=1","",0,20,120);
				Menu2_6_2=new Array("PROGRAMA DO CURSO","crochetagem.php","",0,20,120);


		Menu2_7=new Array("DERMATO FUNCIONAL &nbsp; <span style='color:red;'>abertas</span>","","",2,20,160);

				Menu2_7_1=new Array("CALENDÁRIO","cal_geral.php?id=2","",0,20,120);
				Menu2_7_2=new Array("PROGRAMA DO CURSO","dermato_funcional.php","",0,20,120);
	

		Menu2_8=new Array("DRENAGEM LINFÁTICA MANUAL &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);

				Menu2_8_1=new Array("CALENDÁRIO","cal_geral.php?id=6","",0,20,120);
				Menu2_8_2=new Array("PROGRAMA DO CURSO","drenagem_linfatica.php","",0,20,120);
				

		Menu2_9=new Array("ELETROTERAPIA FACIAL E CORPORAL &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);

				Menu2_9_1=new Array("CALENDÁRIO","cal_geral.php?id=11","",0,20,120);
				Menu2_9_2=new Array("PROGRAMA DO CURSO","eletrolipolise.php","",0,20,120);


		Menu2_10=new Array("ERGONOMIA EMPRESARIAL &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);
	
				Menu2_10_1=new Array("CALENDÁRIO","cal_geral.php?id=19","",0,20,120);
				Menu2_10_2=new Array("PROGRAMA DO CURSO","ergo_empres.php","",0,20,120);


		Menu2_11=new Array("FISIOTERAPIA POSTURAL","","",2,20,160);
	
				Menu2_11_1=new Array("CALENDÁRIO","cal_geral.php?id=16","",0,20,120);
				Menu2_11_2=new Array("PROGRAMA DO CURSO","postural.php","",0,20,120);


		Menu2_12=new Array("FISIOTERAPIA NA GESTAÇÃO PRÉ E PÓS","","",2,30,160);

				Menu2_12_1=new Array("CALENDÁRIO","cal_geral.php?id=21","",0,20,120);
				Menu2_12_2=new Array("PROGRAMA DO CURSO","parto.php","",0,20,120);


		Menu2_13=new Array("MANIPULAÇÃO ARTICULAR","","",2,20,160);

				Menu2_13_1=new Array("CALENDÁRIO","cal_geral.php?id=4","",0,20,120);
				Menu2_13_2=new Array("PROGRAMA DO CURSO","manipulacao_articular.php","",0,20,120);
			
		Menu2_14=new Array("MIOTERAPIA &nbsp; <span style='color:red;'>abertas</span>","","",2,20,160);

				Menu2_14_1=new Array("CALENDÁRIO","cal_geral.php?id=8","",0,20,120);
				Menu2_14_2=new Array("PROGRAMA DO CURSO","mioterapia.php","",0,20,120);
			
			
		Menu2_15=new Array("CURSO DE MASSAGEM BAMBUS &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);
					
					Menu2_15_1=new Array("CALENDÁRIO","cal_geral.php?id=33","",0,20,120);
					Menu2_15_2=new Array("PROGRAMA DO CURSO","massagem_bambu.php","",0,20,120);


		Menu2_16=new Array("CURSO DE MASSAGEM PEDRAS QUENTES","","",2,30,160);
					
					Menu2_16_1=new Array("CALENDÁRIO","cal_geral.php?id=39","",0,20,120);
					Menu2_16_2=new Array("PROGRAMA DO CURSO","pedras_quentes.php","",0,20,120);


		Menu2_17=new Array("CURSO DE MASSAGEM TURBINADA MODELADORA","","",2,30,160);

					Menu2_17_1=new Array("CALENDÁRIO","cal_geral.php?id=38","",0,20,120);
					Menu2_17_2=new Array("PROGRAMA DO CURSO","massagem_turbinada.php","",0,20,120);


		Menu2_18=new Array("CURSO DE SHIATSU EXPRESS","","",1,20,160);
					
					Menu2_18_1=new Array("CALENDÁRIO","cal_geral.php?id=26","",0,20,120);


		Menu2_19=new Array("SHIATSU FACIAL E CORPORAL &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);

				Menu2_19_1=new Array("CALENDÁRIO","cal_geral.php?id=18","",0,20,120);
				Menu2_19_2=new Array("PROGRAMA DO CURSO","shiatsu.php","",0,20,120);


		Menu2_20=new Array("MOBILIZAÇÃO NEURAL &nbsp; <span style='color:red;'>abertas</span>","","",2,30,160);

				Menu2_20_1=new Array("CALENDÁRIO","cal_geral.php?id=3","",0,20,120);
				Menu2_20_2=new Array("PROGRAMA DO CURSO","mobilizacao_neural.php","",0,20,120);
	
	
		Menu2_21=new Array("PILATES, SOLO, BOLA, GESTANTE","","",2,30,170);

				Menu2_21_1=new Array("CALENDÁRIO","cal_geral.php?id=12","",0,20,120);
				Menu2_21_2=new Array("PROGRAMA DO CURSO","pilates.php","",0,20,120);


		Menu2_22=new Array("PEELING  &nbsp; <span style='color:red;'>abertas</span>","","",2,20,170);

				Menu2_22_1=new Array("CALENDÁRIO","cal_geral.php?id=14","",0,20,120);
				Menu2_22_2=new Array("PROGRAMA DO CURSO","peeling.php","",0,20,120);


		Menu2_23=new Array("TÉCNICAS DE SPA &nbsp; <span style='color:red;'>Aberto</span>","","",2,20,160);

				Menu2_23_1=new Array("CALENDÁRIO","cal_geral.php?id=20","",0,20,120);
				Menu2_23_2=new Array("PROGRAMA DO CURSO","tecnicas_spa.php","",0,20,140);
	
		Menu2_24=new Array("MASSOTERAPIA","","",2,20,160);	

				Menu2_24_1=new Array("CALENDÁRIO","cal_geral.php?id=9","",0,20,120);
				Menu2_24_2=new Array("PROGRAMA DO CURSO","massoterapia.php","",0,20,120);


Menu3=new Array("FICHA DE INSCRIÇÃO","inscricao.php","",0,20,160);


Menu4=new Array("GALERIA","galeria.php","",0,20,160);



Menu5=new Array("EQUIPE...","equipe.php","",0,20,160);



Menu6=new Array("LOCALIZAÇÃO","localizacao.php","",0,20,160);



Menu7=new Array("CONTACT CENTER","contact_center.php","",0,20,160);



Menu8=new Array("VIDEOS","videos.php","",0,20,160);



//Menu10=new Array("PESQUISA ON LINE","","",1,20,160);

	//	Menu10_1=new Array("ARTIGOS","","",4,20,70);
		
		//		Menu10_1_1=new Array("Linfedema - cuidados e exercícios","pesquisa/linfedema_cuidados.pdf","",0,30,160);
		//		Menu10_1_2=new Array("Eletrolifiting nas Estrias","pesquisa/eletrolifiting_do_portal.pdf","",0,20,160);
		//		Menu10_1_3=new Array("Crochetagem & Ajuste Ortodôntico","pesquisa/amanda_e_andre.pdf","",0,30,160);
		//		Menu10_1_4=new Array("Corrente Russa no Tratamento da Flacidez","pesquisa/corrente_russa.pdf","",0,30,160);
		
//		Menu10_2=new Array("BEM-ESTAR","","",1,20,120);
		
	//			Menu10_2_1=new Array("Cristaloterapia","pesquisa/Cristaloterapia.doc","",0,20,120);
		
		
		
		//Menu10_3=new Array("ESPAÇO DA MULHER","","",3,20,120);

			//	Menu10_3_1=new Array("História da Maquiagem","pesquisa/Historia_da_Maquiagem.doc","",0,20,120);
			//	Menu10_3_2=new Array("Salto Alto","pesquisa/Salto_Alto.doc","",0,20,120);
			//	Menu10_3_3=new Array("Lendas da ACNE","pesquisa/LENDAS_da_ACNE.doc","",0,20,120);
