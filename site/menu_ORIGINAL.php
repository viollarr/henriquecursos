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
        <select name="curso" class="menu" style=""  size="4" id="webmaster" title="&nbsp;CURSOS" onchange='if(options[selectedIndex].value) top.location.href= (options[selectedIndex].value)'>
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
			if(($x['nome']) == 'ERGONOMIA'){
				echo "<div>";
				echo "<option value='cal_ergonomia.php?id=".$x[id]."' style='color:$color;'>$x[nome]</option>'";
				echo "</div>\n";
				$a = ($a) + 1;
			}
			elseif(($x['nome'] != 'ERGONOMIA - MÓDULO BÁSICO') and ($x['nome'] != 'ERGONOMIA - MÓDULO AVANÇADO')){
				echo "<div>";
				if($x['nome'] == 'MIX MASSAGEM TERAPIA'){
					echo "<option value='cal_geral.php?id=".$x[id]."' style='color:#FFFFFF !important;'>$x[nome]</option>'";
				}
				else{
					echo "<option value='cal_geral.php?id=".$x[id]."' style='color:$color;'>$x[nome]</option>'";
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
        <div class="subItem"><a href="publicacoes.php">&nbsp;&nbsp;PUBLICAÇÕES</a></div>
    </div>
  
    
<!-- *********************************End Menu****************************** -->
