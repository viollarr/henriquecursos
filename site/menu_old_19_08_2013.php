<!-- *********************************Start Menu****************************** -->

<link rel="stylesheet" type="text/css" href="dhtmlcombo.css" >

<script type="text/javascript" src="dhtmlcombo.js">

/***********************************************



* DHTML Select Menu- by JavaScript Kit (www.javascriptkit.com)

* Menu interface credits: http://www.dynamicdrive.com/style/csslibrary/item/glossy-vertical-menu/ 

* This notice must stay intact for usage

* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more

***********************************************/

</script>



	<div class="subMenu" style="display:inline;">

        <div class="subItem"><a href="home.php">&nbsp;&nbsp;APRESENTAÇÃO</a></div>

        <select name="curso" class="menu" style=""  size="4" id="webmaster" title="&nbsp;CURSOS" onClick='if(options[selectedIndex].value) top.location.href= (options[selectedIndex].value)'>

          <?php

		 $a = 0;

		include('../includes/bd.php');

		$y = mysql_query("SELECT `id`,`nome` FROM `cursos` ORDER BY nome ASC" );

		while($x = mysql_fetch_array($y))

		{

		$b = 2;

		$c = $a % $b;

		if ($c == 0){

			$color = '#0000CC';

		}

		elseif ($c == 1){

			$color = '#FF0000';

		}

                if(($x['novo']) == '1'){

                    $novo = "Novo";

                }

			if(($x['nome']) == 'ERGONOMIA'){

				echo "<div>";

				echo "<option title='$novo' value='cal_ergonomia.php?id=".$x[id]."' style='color:$color;'>$x[nome]</option>'";

				echo "</div>\n";

				$a = ($a) + 1;

			}

			elseif($x['nome'] == 'TÉCNICAS DE SPA'){

				echo "<div>";

				echo "<option title='$novo' value='cal_spa.php?id=".$x[id]."' style='color:$color;'>$x[nome]</option>'";

				echo "</div>\n";

				$a = ($a) + 1;

			}

			elseif(($x['nome'] != 'ERGONOMIA - MÓDULO BÁSICO') and ($x['nome'] != 'ERGONOMIA - MÓDULO AVANÇADO') and ($x['nome'] != 'SPA FACIAL') and ($x['nome'] != 'SPA CORPORAL') and ($x['nome'] != 'SPA GESTANTE') and ($x['nome'] != 'SPA RELAXAMENTO') and ($x['nome'] != 'SPA DOS PÉS')){

				echo "<div>";

				if($x['nome'] == 'MIX MASSAGEM TERAPIA'){

					echo "<option title='$novo' value='cal_geral.php?id=".$x[id]."' style='color:#FFFFFF !important;'>$x[nome]</option>'";

				}

				else{

					echo "<option title='$novo' value='cal_geral.php?id=".$x[id]."' style='color:$color;'>$x[nome]</option>";

				}

				echo "</div>\n";

				$a = ($a) + 1;

			}	

		}

		

		?>

        </select>

<script type="text/javascript">

 //dhtmlselect("id_of_select_menu", "optional_width_of_select_box_px", "optional_width_of_drop_down_menu_px")

 dhtmlselect("webmaster")

    

</script>

	    <div class="subItem"><a href="inscricao.php">&nbsp;&nbsp;FICHA DE INSCRIÇÃO</a></div>

		<div class="subItem"><a href="galeria.php">&nbsp;&nbsp;GALERIA</a></div>

		<div class="subItem"><a href="equipe.php">&nbsp;&nbsp;EQUIPE...</a></div>

		<div class="subItem"><a href="localizacao.php">&nbsp;&nbsp;LOCALIZAÇÃO</a></div>

		<div class="subItem"><a href="contact_center.php">&nbsp;&nbsp;CONTACT CENTER</a></div>

		<div class="subItem"><a href="videos.php">&nbsp;&nbsp;VIDEOS</a></div>

		<div class="subItem" style=" padding: 2px 0 0 0"><a href="publicacoes.php">&nbsp;&nbsp;PUBLICAÇÕES</a></div>

        

		

		<select name="academico" class="menu" style="top: 180px" size="4" id="academico" title="&nbsp;ACADÊMICO" >

			<div><option value="academico/polidez[1].doc" title="#">&nbsp;&nbsp;&nbsp;A POLIDEZ</option></div>

			<div><option value="academico/QUESTIONARIO_ENADE_2013.pdf">&nbsp;&nbsp;QUESTIONARIO ENADE 2013</option></div>

			<div><option value="academico/FABULA_DA_GALINHA_AZUL.doc">&nbsp;&nbsp;FÁBULA DA GALINHA AZUL</option></div>

			<div><option value="academico/SONO.doc">&nbsp;&nbsp;SONO</option></div>

		</select>

	<!-- <div class="subItem" style=" padding: 2px 0 0 0"><a href="academico.php">&nbsp;&nbsp;ACADÊMICO</a></div> -->

		

		

	<script type="text/javascript">

		dhtmlselect("academico");

		

		window.setTimeout( function(){

			dropdOwn = document.querySelector('#dhtml_academico .dropdown');

			dropdOwn.style.top = "183px";

		}, 350 );

	</script>

	

<!-- --------------------------------------------------------------------------------------- --->



    </div>

  

    

<!-- *********************************End Menu****************************** -->

