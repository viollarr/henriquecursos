<?php
/*

El Panel MySQL de Matt - administre bases de datos MySQL a distancia
Copyright (C) 2001 Matt Wilson <matt@mattsscripts.co.uk>
Traducci�n al espa�ol por Germ�n Alonso <http://www.keltoi-web.com>

Este programa es gratuito; puede redistribuirlo y/o modificarlo
seg�n los t�rminos de la Licencia P�blica General GNU (GNU General
Public License) tal y como se redact� por la Free Software Foundation;
bien la versi�n 2 de la Licencia o (si lo prefiere) cualquier versi�n
posterior.

Este programa ha sido creado con la intenci�n de que sea �til, pero
SIN NINGUNA GARANT�A; ni siquiera la garant�a impl�cita de UTILIDAD
COMERCIAL o ADECUACI�N PARA UN PROP�SITO ESPEC�FICO. V�ase la Licencia 
P�blica General GNU para m�s informaci�n.

Junto con este programa debiera haber recibido una copia de la Licencia
P�blica General GNU; si no es as�, escriba a la Free Software Foundation, Inc.,
59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.

*/

// fichero de la versi�n en espa�ol
define(_WELCOME_, "Por favor, escriba su nombre de usuario y contrase�a. Escriba tambi�n el nombre de la base de datos a la que desea acceder; si no se proporciona el nombre de ninguna base de datos, se proporcionar� una lista con todas las bases de datos existentes en el servidor. Para conectarse a un servidor, escriba el nombre del servidor en la casilla \"Servidor\". Si se da alg�n error, lo m�s probable es que se trate de un error en el nombre de usuario y/o contrase�a.");
define(_USERNAME_, "Nombre de usuario");
define(_PASSWORD_, "Contrase�a");
define(_DBNAME_, "Nombre de la base de datos");
define(_DBHOST_, "Servidor");
define(_LOGIN_, "Conectar");
define(_USE_, "Abrir");

// P�gina de informaci�n
define(_ABOUT_, "Acerca de");
define(_ABOUTINFO_, "\"El Panel de Control MySQL de Matt\" (MPanel) ha sido implementado por Matt Wilson con el fin de permitir el acceso a bases de datos MySQL a trav�s de un navegador en vez de usar una cuenta de telnet, y tambi�n para los usuarios que quieran usar una base de datos MySQL sin tener que enfrentarse al problema de construir una base de datos en modo texto. Las siguientes funciones pueden ser ejecutadas mediante este panel de control:");

define(_CREATETABLEINFO_, "Crear tablas con las caracter�sticas MySQL ordinarias");
define(_DELETETABLEINFO_, "Borrar tablas de una base de datos");
define(_OPTIMIZETABLEINFO_, "Mejorar las tablas para que se trabaje m�s r�pido");
define(_RENAMETABLEINFO_, "Renombrar tablas");
define(_ADDFIELDSINFO_, "A�adir nuevos campos a tablas ya existentes");
define(_EDITFIELDINFO_, "Editar los atributos de los campos en tablas y/o campos ya existentes");
define(_DELETEDBINFO_, "Borrar bases de datos");
define(_IMPORTINFO_, "Importar bases de datos desde su servidor local MySQL");
define(_EXPORTDBINFO_, "Exportar bases de datos del servidor");
define(_EXPORTTABLEINFO_, "Exportar tablas individualmente del servidor");
define(_EXECUTESQLINFO_, "Ejecutar instrucciones SQL a medida de forma manual");
define(_CONTACT_, "Contactp");
define(_CONTACTINFO_, "Para cualquier pregunta, etc., puede dirigirse a la siguiente direcci�n de correo electr�nico: <a href=\"mailto: matt@mattsscripts.co.uk\">matt@mattsscripts.co.uk</a> y responder� lo antes posible.");
define(_BACKTOLOGINPAGE_, "Vuelta a la p�gina de identificaci�n");
define(_BACKTOMAINPAGE_, "Vuelta a la p�gina principal");
define(_BACK_, "Atr�s");

define(_CREATETABLEERROR_, "Se ha producido un error al intentar crear la tabla");
define(_CREATETABLEGOOD_, "La tabla ha sido creada satisfactoriamente");
define(_ADDNEWFIELD_, "A�adir un nuevo campo");
define(_ADDFIELDINFO_, "Para crear un nuevo campo en la tabla, debe escribir el nombre y el tipo SQL del campo");
define(_FIELDNAME_, "Nombre del campo");
define(_FIELDTYPE_, "Tipo SQL del campo");
define(_VALUE_, "Valor");
define(_FUNC_, "Func.");

define(_TINYINT_, "Entero enano (tiny integer)");
define(_SMALLINT_, "Entero peque�o (small integer)");
define(_MEDIUMINT_, "Entero mediano (medium integer)");
define(_INT_, "Entero (integer)");
define(_BIGINT_, "Entero grande (big integer)");
define(_FLOAT_, "Real en coma flotante (float)");
define(_DOUBLE_, "Real de doble precisi�n (double)");
define(_DECIMAL_, "Decimal (decimal)");
define(_CHAR_, "Cadena fija (char)");
define(_VARCHAR_, "Cadena variable (varchar)");
define(_TINYTEXT_, "Texto enano (tiny text)");
define(_TINYBLOB_, "BLOB enano (tiny blob)");
define(_ENUM_, "Enumerado (enum)");
define(_TEXT_, "Texto (text)");
define(_BLOB_, "BLOB (blob)");
define(_MEDIUMTEXT_, "Texto mediano (medium text)");
define(_MEDIUMBLOB_, "BLOB mediano (medium blob)");
define(_LONGTEXT_, "Texto largo (long text)");
define(_LONGBLOB_, "BLOB grande (long blob)");
define(_DATETIME_, "Fecha/hora");
define(_DATE_, "Fecha");
define(_TIME_, "Hora");
define(_YEAR_, "A�o");
define(_TIMESTAMP_, "Registro de fecha/hora (timestamp)");

define(_MODIFIERS_, "Modificadores");
define(_AUTO_INCREMENT_FM_, "Incrementado autom�ticamente (para todos los tipos enteros)");
define(_BINARY_FM_, "Binario (para los tipos de cadena: CHAR y VARCHAR)");
define(_NOT_NULL_FM_, "Requerido/no nulo (para todos los tipos)");
define(_UNSIGNED_FM_, "Sin signo (para todos los tipos num�ricos)");
define(_ZERO_FILL_FM_, "Rellenar con ceros (para todos los tipos num�ricos)");
define(_DEFAULT_FM_, "Valor por defecto (para todos, excepto BLOB y texto)");

define(_OK_, "Aceptar");

define(_CREATEKEYERROR_, "Se ha producido un error al crear la nueva clave");
define(_CREATEKEYGOOD_, "La clave ha sido creada satisfactoriamente");
define(_ADDKEY_, "A�adir una nueva clave");
define(_ADDKEYTOTABLE_, "A�adir una nueva clave a la tabla");
define(_ADDKEYINFO_, "Para crear una nueva clave, debe escribir estos datos: el nombre de la clave, el tipo de la clave y los campos que la componen.");
define(_ADDKEYWARNING_, "<u>NOTA:</u>�Recuerde que el nombre de una clave no puede superar los 255 caracteres de extensi�n!");
define(_KEYNAME_, "Nombre de la clave");
define(_KEYTYPE_, "Tipo de la clave");
define(_PRIMARYKEY_, "Clave primaria");
define(_UNIQUEKEY_, "Clave �nica");
define(_NORMALKEY_, "Clave");
define(_KEYFIELDS_, "Campos que componen la clave");
define(_FIELDS_, "Campos");

define(_ADDRECORDERROR_, "No se ha podido a�adir el registro");
define(_ADDRECORDGOOD_, "El registro ha sido incluido en la tabla");
define(_LISTFIELDSERROR_, "No se ha podido obtener una lista de los campos");
define(_ADDRECORD_, "A�adir un registro");

define(_EXPORTTABLE_, "Exportar tabla");
define(_EXECUTESQL_, "Ejecutar una instrucci�n SQL");

define(_CREATETABLE_, "Crear una nueva tabla");
define(_CREATETABLEINFO_, "Para crear una nueva tabla, basta con escribir el nombre de la tabla que desea crear. La tabla se crear� con un campo vac�o llamado \"borreme\" (\"delete_me\"); este campo es necesario ya que es obligatorio que todas las tablas tengan al menos un campo.");
define(_NEWTABLENAME_, "Nombre de la nueva tabla");
define(_DELETEDBERROR_, "No ha sido posible borrar la tabla");
define(_DROPFIELDERROR_, "No es posible eliminar el campo");
define(_DROPFIELDGOOD_, "El campo ha sido eliminado de la tabla satisfactoriamente");
define(_DROPKEYERROR_, "No es posible eliminar la clave");
define(_DROPKEYGOOD_, "La clave ha sido eliminada satisfactoriamente");
define(_DELETERECORDERROR_, "Se ha producido un error al borrar el registro");
define(_DELETERECORDGOOD_, "El registro se ha borrado satisfactoriamente");
define(_DROPTABLEERROR_, "No es posible eliminar la tabla");
define(_DROPTABLEGOOD_, "La tabla ha sido eliminada satisfactoriamente");
define(_CHOOSEEXPORT_, "Escoja lo que quiera exportar");
define(_EXPORTINGDATA_, "Exportando la informaci�n");
define(_CONSTRUCTION_, "Construcci�n");
define(_TABLEDATA_, "Datos de la tabla");
define(_TABLEKEYS_, "Claves de la tabla");
define(_EDITFIELDERROR_, "No es posible modificar el tipo del campo");
define(_EDITFIELDGOOD_, "El tipo del campo ha sido modificado satisfactoriamente");
define(_EDITFIELD_, "Modificar el tipo de campo");
define(_NEWFIELDTYPE_, "Nuevo tipo de campo");

define(_ERROR_, "Se ha producido un error");
define(_ERRORINFO_, "Lo sentimos, pero ha ocurrido un error cuando se intentaba llevar  a cabo la operaci�n; si no debiera haber ocurrido y cree que es un fallo de programaci�n (bug), por favor, env�eme un informe <a href=\"mailto: bugs@mattsscripts.co.uk\">pulsando aqu�</a> que incluya c�mo, cu�ndo y por qu� ha ocurrido e intentaremos solucionarlo. Si no, puede que su nombre de usuario y/o su contrase�a y/o el nombre de la base de datos sean err�neos, lo que significa que necesita <a href=\"index.php\">a la p�gina de autentificaci�n</a> e intentar identificarse de nuevo. Tambi�n puede <a href=\"javascript:window.back();\">pulsar aqu�</a> para volver a intentarlo.");
define(_ERRORMSG_, "Mensaje de error");

define(_FINDDB_, "Encontrar base de datos");
define(_ERRORDBCONNECT_, "No es posible conectar con el servidor de bases de datos; por favor, compruebe su nombre de usuario y contrase�a.");

define(_ERRORDBLIST_, "No es posible obtener una lista de todas las bases de datos existentes en el servidor; por favor, p�ngase en contacto con el administrador del servidor para obtener m�s ayuda.");
define(_SELECTDB_, "Por favor, escoja la base de datos que desea administrar.");
define(_DBLISTINFO_, "A continuaci�n se muestra una lista de las bases de datos 
residentes en el servidor de bases de datos MySQL especificado. Por favor, pulse sobre la base de datos que desea administrar.");

define(_HELPPAGE_, "P�gina de ayuda");
define(_HELPINTRO_, "\"El Panel de Control MySQL de Matt\" se ha dise�ado de forma que los usuarios pudieran acceder a sus bases de datos MySQL para construir tablas, etc., sin necesidad de una cuenta de telnet. Este panel permite hacer un buen n�mero de cosas, incluyendo:");
define(_HELPCREATEDELETETABLE_, "Creaci�n/eliminaci�n de tablas");
define(_HELPDELETEDB_, "Eliminaci�n de bases de datos");
define(_INTRO_, "Introducci�n");
define(_HELPADDDELETEFIELDS_, "Adici�n/eliminaci�n de campos");
define(_HELPALTERFIELDS_, "Modificaci�n de nombres/tipos de campos existentes");
define(_HELPINSERTRECORDS_, "Adici�n de registros a las tablas");
define(_HELPDELETERECORDS_, "Eliminaci�n de registros de las tablas");
define(_HELPMODIFYRECORDS_, "Modificaci�n de registros existentes en las tablas");
define(_HELPEXECUTESQL_, "Ejecuci�n de instrucciones SQL");
define(_ETC_, "etc");

define(_HELPTOC_, "�ndice de contenidos");
define(_HELPLOGIN_, "Conect�ndose al sistema");
define(_HELPCREATETABLE_, "Creando una tabla");
define(_HELPADDFIELD_, "A�adiendo un campo a la tabla");
define(_HELPEDITFIELD_, "Modificando el tipo de un campo");
define(_HELPINSERTRECORD_, "Agregando un registro a la tabla");
define(_HELPQUERYTABLE_, "Haciendo consultas a la base de datos");
define(_HELPDELETEMODIFYRECORD_, "Borrando/modificando un registro de la tabla");
define(_HELPDELETEFIELD_, "Eliminando un campo de la tabla");
define(_HELPDELETETABLE_, "Eliminando una tabla de la base de datos");
define(_HELPDELETEDB_, "Eliminando una base de datos");
define(_HELPEXECUTINGSQL_, "Ejecutando una instrucci�n SQL");
define(_HELPEXPORTING_, "Exportando una tabla o una base de datos");
define(_HELPIMPORTING_, "Importando su propia base de datos");

define(_HELPLOGININFO_, "Bien, esta es la primera y m�s importante parte de las que debe hacer correctamente; si no, �no ir� a ninguna parte! Su nombre de usuario es el nombre que usa para conectarse a la base de datos MySQL y su contrase�a es la que se le dio para acceder a la base de datos MySQL. Lo siguiente es el nombre de la base de datos a la quiere acceder; si lo deja en blanco, se le mostrar� una lista de todas las bases de datos para que elija una. Lo �ltimo es el nombre del servidor MySQL; esto es muy importante, ya que algunos servidores no permiten conexiones a otros equipos, y por tanto este script tendr� que alojarse en el servidor mismo para funcionar adecuadamente.");
define(_HELPCREATETABLEINFO_, "La creaci�n de una tabla es f�cil con este script. Una vez conectado pulse sobre el bot�n \"Crear tabla\" (\"Create table\") en la parte izquierda de la pantalla; esto deber�a abrir una nueva ventana con una casilla y el bot�n \"Crear\" (\"Create\"). Es tan simple como eso; basta con refrescar la p�gina principal y la nueva tabla habr� sido creada, suponiendo claro que el nombre de la tabla era v�lido. La tabla contendr� un solo campo llamado \"Borreme\" (\"Delete_me\"). El motivo es que cualquier tabla <b>debe</b> tener por lo menos un campo. Una vez que haya creado la tabla, puede simplemente borrar este campo (para obtener informaci�n sobre c�mo hacerlo, <a href=\"help.html#delfield\">pulse aqu�</a>).");
define(_HELPADDFIELDINFO_, "Cuando quiera a�adir un campo a la base de datos, deber� escoger la tabla requerida conect�ndose y pulsando sobre el nombre de la tabla en la lista; esto mostrar� una lista con todos los campos existentes en la tabla. Para a�adir un nuevo campo a la lista, pulse el bot�n \"A�adir campo\" (\"Add field\") en el margen de la pantalla. Esto har� que aparezca una ventana nueva pidi�ndole el nombre y tipo del nuevo campo. Por favor, tenga en cuenta que el tipo es muy importante y si no est� al corriente de los distintos tipos de campo en MySQL, le recomendar�amos informarse en <a target=_new href=\"http://www.mysql.com/documentation/index.html\">el manual de MySQL</a>
o en <a href=\"http://www.your-name-here.co.uk/mysql/fields.html\" target=_new>esta p�gina de Your-Name-Here</a> que contiene informaci�n sobre los tipos y tama�os de los tipos."); 
define(_HELPEDITFIELDINFO_, "La modificaci�n del tipo de un campo es otro proceso que requiere conocimientos sobre los tipos de los campos y sobre MySQL (v�ase \"3. A�adiendo campos a la tabla\" para encontrar sitios donde informarse) y debe hacerse desde el �rea de informaci�n de la tabla, que se muestra pulsando sobre la tabla que contiene el campo que queremos modificar. Al lado de cada campo hay un par de botones: uno de ellos se llama \"Editar tipo\" (\"Edit type\"). Si se pulsa, aparecer� una nueva ventana con una casilla en la que puede escribir el nuevo tipo del campo. Una vez que lo ha hecho, pulse el bot�n \"Aceptar\" (\"Go\") para actualizar la base de datos.");
define(_HELPINSERTRECORDINFO_, "Para a�adir un registro a una de sus tablas, primero debe seleccionarla en la p�gina principal. Esto le llevar� a otra p�gina que contendr� una lista con todos los campos de la tabla y algunos datos sobre cada uno de sus tipos. Si pulsa sobre el bot�n \"A�adir registro\" (\"Add record\") se le mostrar� otra p�gina que contendr� una casilla para cada campo en la que deber� escribir la informaci�n del registro que quiere incluir en la tabla. Una vez que haya terminado, pulse \"A�adir registro\" (\"Add record\") en la parte inferior de la p�gina para agregar el registro a la base de datos.");

define(_HELPQUERYTABLEINFO_, "Este proceso es bastante sencillo: una vez que haya seleccionado la tabla que contiene la informaci�n sobre la que quiere realizar la consulta, pulse el bot�n \"Consultar\" (\"Query table\") en la parte izquierda de la p�gina. Esto provocar� que aparezcan unas cuantas casillas - una por cada campo de la tabla. En ellas es donde escribir� los datos por los que quiere buscar. El script entonces buscar� en la base de datos y la tabla en uso los registros que concuerden con los datos que ha escrito y devolver� los resultados en forma tabular.");
define(_HELPDELETEMODIFYRECORDINFO_, "Esta funci�n es f�cil de usar, pero puede ser peligrosa dependiendo de si tiene m�s de un registro id�ntico. El problema es que si dos registros son id�nticos, entonces la eliminaci�n de uno de ellos implica autom�ticamente la eliminaci�n del otro - aqu� es donde los campos \"id\" y los campos �nicos (tambi�n conocidos como Claves Primarias) entran en juego. Estos campos pueden usarse para distinguir cada uno de los registros. Para borrar un registro, primero pulse sobre la tabla que contiene el registro en la p�gina principal y pulse el bot�n \"Borrar registro\" (\"Delete record\") en el margen de la p�gina; rellene entonces toda la informaci�n posible en la p�gina (no se tendr�n en cuenta may�sculas o min�sculas, y se buscar� de forma que el criterio de b�squeda coincida con parte del registro. Nota del traductor: las tildes tambi�n son ignoradas.) y pulse \"Buscar\" (\"Search\"); los resultados de la b�squeda se mostrar�n en la pantalla. Simplemente pulse el bot�n \"B�rreme\" (\"Delete me\") para eliminar el registro de la tabla. La modificaci�n de un campo se hace de la misma manera; la �nica diferencia es que cuando pulse el bot�n \"Modificar\" (\"Modify\") despu�s de una b�squeda deber� rellenar los nuevos datos que quiera incluir en la tabla.");
define(_HELPDELETEFIELDINFO_, "Borrar un campo de una de sus tablas es todav�a m�s sencillo que a�adirlo: simplemente escoja la tabla que contiene el campo que desea eliminar en la p�gina principal y pulse el bot�n \"Borrar\" (\"Delete\") que se encuentra al lado del campo. El script le pedir� su confirmaci�n tres veces y eliminar� el campo, as� como toda la informaci�n que albergara.");
define(_HELPDELETETABLEINFO_, "Borrar una tabla de la base de datos es tan sencillo como eliminar un campo de una de las tablas: pulse el bot�n \"Borrar\" (\"Delete\") que hay al lado de la tabla que desea eliminar y confirme a continuaci�n el proceso, pero recuerde que si borra una tabla de sus bases de datos, ser� completamente eliminada y no podr� recuperar <b>ninguna</b> informaci�n de ella.");
define(_HELPDELETEDBINFO_, "Para borrar una base de datos, pulse sobre el bot�n \"Borrar base de datos\" (\"Delete database\") en la p�gina principal; de nuevo tendr� que confirmar tres veces su elecci�n y entonces se eliminar� la base de datos. Esto provocar�, por supuesto, la eliminaci�n de <b>todo</b>. Es muy importante que no haga esto accidentalmente, ya que toda la informaci�n contenida en la base de datos ser� eliminada y no podr� recuperarla.");
define(_HELPEXECUTINGSQLINFO_, "Para ejecutar una instrucci�n MySQL, deber� saber, por supuesto, qu� instrucci�n es, qu� hace y qu� cambios producir� en su base de datos. Si sabe usar MySQL, entonces puede simplemente escribir la instrucci�n en la casilla de la p�gina principal o en la p�gina de detalles de la tabla y ejecutarla. Sin embargo, no se mostrar� ning�n mensaje de salida, la ejecuci�n ser� \"silenciosa\".");
define(_HELPEXPORTINGINFO_, "Esta funci�n es incre�blemente �til si necesita hacer una copia de la base de datos que se encuentra en el servidor. Permite hacer un volcado de la base de datos o tabla de su elecci�n a trav�s del servidor web y guardarlo en un fichero id�ntico al que hubiera creado la funci�n \"mysqldump\" - f�cil.");
define(_HELPIMPORTINGINFO_, "Importar su propia base de datos creada por la funci�n \"mysqldump\" es muy f�cil de hacer. Pulse \"Importar informaci�n\" (\"Import data\") en la p�gina principal y se mostrar� una nueva ventana en la que podr� elegir un fichero de su ordenador. Este es el fichero que desea subir al servidor. Pulse \"�Importar!\" (\"Import!\") para recuperar la informaci�n en la base de datos, refresque el contenido de la p�gina principal y los datos se habr�n incluido en la base de datos, siempre y cuando no haya habido errores, claro.");

define(_IMPORTDATA_, "Importar datos");
define(_IMPORTDATAINSTRUCT_, "Para importar informaci�n en esta base de datos, deber� pulsar sobre el bot�n \"Examinar...\" (\"Browse...\") y seleccionar un fichero previamente volcado. Estos ficheros son simplemente una lista m�s o menos larga de instrucciones SQL que reconstruyen la base de datos volcada.");
define(_IMPORTFILE_, "Importar fichero");
define(_IMPORTDBDATA_, "Importar base de datos");

define(_WELCOMETITLE_, "Bienvenido");
define(_EXPORTDB_, "Exportar base de datos");
define(_DELETEDB_, "Eliminar base de datos");
define(_DELETETABLE_, "Eliminar tabla");
define(_OPTIMIZETABLE_, "Mejorar tabla");
define(_DELETEFIELD_, "Eliminar campo");
define(_DELETEDBCONFIRM_, "�Est� seguro de querer eliminar esta base de datos?");
define(_DELETEFIELDCONFIRM_, "�Est� seguro de querer eliminar este campo?");
define(_DELETETABLECONFIRM_, "�Est� seguro de querer eliminar esta tabla?");
define(_LOGOUTCONFIRM_, "�Seguro que quiere desconectarse?");
define(_LOGOUT_, "Desconectar");
define(_TABLENAME_, "Nombre de tabla");
define(_COMMANDS_, "Opciones");
define(_KEYMANAGEMENT_, "Gesti�n de claves");

define(_DELETEKEYCONFIRM_, "�Est� seguro de querer eliminar esta clave?");
define(_DELETEKEY_, "Borrar clave");
define(_MODIFYARECORD_, "Modificar un registro");

define(_LOGINERROR_, "No es posible conectarse");
define(_LOGINERRORINFO_, "Lo sentimos, pero no se ha podido conectar usted al servidor MySQL; esto puede ocurrir por varios motivos. Quiz� su nombre de usuario y/o contrase�a son incorrectos, o la base de datos que ha indicado no existe en el servidor. Tambi�n podr�a ser que el servidor no admite conexiones de otros equipos y tiene, por tanto, que conectarse al servidor desde el servidor mismo. Si este problema persiste, deber�a ponerse en contacto con el administrador del servidor.");

define(_SEARCHRESULTS_, "Resultados de la b�squeda");
define(_FOUNDRECORDS_, "Se han encontrado los siguientes registros");
define(_NOPRIMARYKEY_, "No se ha definido ninguna clave primaria o �nica, de forma que los efectos de la modificaci�n o eliminaci�n de un registros son impredecibles");
define(_DELETERECORDCONFIRM_, "�Confirma la eliminaci�n de este registro?");
define(_DELETERECORD_, "Eliminar registro");
define(_MODIFYRECORD_, "Modificar registro");
define(_SEARCHEMPTY_, "No se han podido encontrar registros que satisfagan su criterio de b�squeda");
define(_RENAMEFIELD_, "Renombrar campo");
define(_FIELDNEWNAME_, "Nuevo nombre del campo");
define(_FIELDNEWNAMEINFO_, "Por favor, escriba el nuevo nombre del campo y pulse el bot�n \"Aceptar\" (\"OK\")");

define(_RENAMETABLE_, "Renombrar tabla");
define(_TABLENEWNAME_, "Nuevo nombre de la tabla");
define(_TABLENEWNAMEINFO_, "Por favor, escriba el nuevo nombre de la tabla y pulse el bot�n \"Aceptar\" (\"OK\")");
define(_SQLRESULTS_, "Resultados SQL");
define(_SQLEXECUTED_, "La instrucci�n SQL se ha ejecutado satisfactoriamente");
define(_SQLOUTPUT_, "Este es el resultado de la instrucci�n SQL");
define(_SQLERROR_, "No es posible ejecutar la instrucci�n SQL");

define(_SQLRESULTCODE_, "La consulta se ha llevado a cabo. MySQL ha devuelto lo siguiente");
define(_SQLRESULTROWS_, "N�mero de filas que se devuelven");
define(_SQLRESULTROWSAFFECTED_, "N�mero de filas afectadas"); 
define(_SQLRESULTFIELDS_, "N�mero de campos que se devuelven");
define(_TABLEDETAILS_, "Detalles de la tabla");
define(_ADDNEWFIELD_, "A�adir un nuevo campo");
define(_SEARCHDELETEMODIFYRECORDS_, "Buscar/borrar/modificar registros");

define(_CURDATABASE_, "Base de datos en uso");
define(_CURTABLE_, "Tabla seleccionada");
define(_CHANGEFIELDTYPE_, "Cambiando el tipo del campo");
define(_SUCCESSMOD_, "Se ha modificado satisfactoriamente el asiento");
define(_ERRORMOD_, "Se ha producido un error al intentar modificar el asiento"); 
define(_ERRORMODRECORD_, "Se ha producido un error en la b�squeda del registro para modificar");
define(_ERROROPTIMIZE_, "Se ha producido un error al intentar mejorar la tabla");
define(_SUCCESSOPTIMIZE_, "La tabla ha sido mejorada satisfactoriamente"); 
define(_ERRORTABLEDESC_, "No es posible obtener una descripci�n de la tabla");
define(_SEARCHRECORDS_, "Buscar registros");
define(_OPERATION_, "Operaci�n");
define(_TYPE_, "Tipo");
define(_ERRORENAMEFIELD_, "No es posible renombrar el campo");
define(_SUCCESSRENAMEFIELD_, "El campo ha sido renombrado satisfactoriamente");
define(_ERRORRENAMETABLE_, "No es posible renombrar la tabla");
define(_SUCCESSRENAMETABLE_, "La tabla ha sido renombrada satisfactoriamente");
define(_RESET_, "Reiniciar");

define(_IMPORTSUCCESS_, "Datos importados satisfactoriamente, n� de instrucciones SQL procesadas");
define(_UPDATE_, "Actualizar");
define(_BROWSE_, "Examinar");
define(_EXPORTFMT_, "Exportar formato");
define(_CHANGEDB_, "Cambiar base de datos");
define(_CHANGETABLE_, "Cambiar tabla");

define(_SHOWPAGE_, "Mostrar n� de p&aacute;gina");
define(_RESULTSPERPAGE_, "N� de filas por p&aacute;gina");
define(_NEXTPAGE_, "P�gina siguiente");
define(_PREVIOUSPAGE_, "P�gina anterior");
define(_NOTE_, "Nota");

define(_ADDFIELDAFTER_, "A�adir el campo a continuaci�n de");
define(_TABLEEND_, "Fin de tabla");

define(_DBMANAGER_, "Administrador de la base de datos");
define(_ALLOWEDDBS_, "Su usuario tiene acceso a las siguientes bases de datos y sus tablas respectivas");
define(_DISALLOWEDDBS_, "Estas son las bases de datos a las que no tiene acceso");
define(_WELCOMEDB_, "Bienvenido a la p�gina de administraci�n de bases de datos. Puede seleccionar una base de datos para administrar o administrar las bases de datos ya disponibles (si tiene permiso).");
define(_CREATEDB_, "Crear una base de datos");
define(_CREATEDBERROR_, "No se ha podido crear la base de datos");
define(_CREATEDBGOOD_, "La base de datos se ha creado satisfactoriamente");
define(_DELETEDBERROR_, "No se ha podido borrar la base de datos");
define(_DELETEDBGOOD_, "La base de datos se ha eliminado satisfactoriamente");
define(_GRANTDBERROR_, "No se han podido otorgar permisos al usuario");
define(_GRANTDBGOOD_, "Los permisos han sido otorgados al usuario satisfactoriamente");

?>
