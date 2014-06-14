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
        <div class="subItem" style="font-family:Arial, Verdana, Helvetica, sans-serif;">&nbsp;<a href="index_3.php">APRESENTAÇÃO</a></div>
        <select name="curso" class="t_titulo_p1" size="4" id="webmaster" title="CURSOS" onchange='if(options[selectedIndex].value) top.location.href= (options[selectedIndex].value)'>
          <?php
		 
		include('../includes/bd.php');
		$y = mysql_query("SELECT `id`,`nome` FROM `cursos`");
		while($x = mysql_fetch_array($y))
		{
		echo "<div>";
		echo "<option value='cal_geral.php?id=".$x[id]."'>$x[nome]</option>'";
		echo "</div>\n";
		}
		
		?>
        
      </select>
<script type="text/javascript">
 //dhtmlselect("id_of_select_menu", "optional_width_of_select_box_px", "optional_width_of_drop_down_menu_px")
 dhtmlselect("webmaster")
    
</script>
      <div class="subItem" style="font-family:Arial, Verdana, Helvetica, sans-serif;">&nbsp;<a href="inscricao.php">FICHA DE INSCRIÇÃO</a></div>
		<div class="subItem" style="font-family:Arial, Verdana, Helvetica, sans-serif;">&nbsp;<a href="galeria.php">GALERIA</a></div>
		<div class="subItem" style="font-family:Arial, Verdana, Helvetica, sans-serif;">&nbsp;<a href="equipe.php"> EQUIPE...</a></div>
		<div class="subItem" style="font-family:Arial, Verdana, Helvetica, sans-serif;">&nbsp;<a href="localizacao.php">LOCALIZAÇÃO</a></div>
		<div class="subItem" style="font-family:Arial, Verdana, Helvetica, sans-serif;">&nbsp;<a href="contact_center.php">CONTACT CENTER</a></div>
		<div class="subItem" style="font-family:Arial, Verdana, Helvetica, sans-serif;">&nbsp;<a href="videos.php">VIDEOS</a></div>
    </div>
  
    
<!-- *********************************End Menu****************************** -->
