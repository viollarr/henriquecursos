<!-- *********************************Start Menu****************************** -->
	<div class="subMenu" style="display:inline;">
        <div class="subItem"><a href="index_3.php">APRESENTA��O</a></div>
        <div class="subItem">
        <select name="curso" class="menu"  size="4"
          onchange='if(options[selectedIndex].value) top.location.href= (options[selectedIndex].value)'>
          <option selected="selected" value="#" >Selecione um Curso</option>
          <?php
		 
		include('includes/bd.php');
		$y = mysql_query("SELECT `id`,`nome` FROM `cursos`");
		while($x = mysql_fetch_array($y))
		{
		echo "<div>";
		echo "<option value='cal_geral.php?id=".$x[id]."'>$x[nome]</option>'";
		echo "</div>\n";
		}
		
		?>
        
        </select> </div>
	    <div class="subItem"><a href="inscricao.php">FICHA DE INSCRI��O</a></div>
		<div class="subItem"><a href="galeria.php">GALERIA</a></div>
		<div class="subItem"><a href="equipe.php"> EQUIPE...</a></div>
		<div class="subItem"><a href="localizacao.php">LOCALIZA��O</a></div>
		<div class="subItem"><a href="contact_center.php">CONTACT CENTER</a></div>
		<div class="subItem"><a href="videos.php">VIDEOS</a></div>
    </div>
<!-- *********************************End Menu****************************** -->
