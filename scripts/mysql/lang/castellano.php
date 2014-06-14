<?php
/*

El Panel MySQL de Matt - administre bases de datos MySQL a distancia
Copyright (C) 2001 Matt Wilson <matt@mattsscripts.co.uk>
Traducción al español por Germán Alonso <http://www.keltoi-web.com>

Este programa es gratuito; puede redistribuirlo y/o modificarlo
según los términos de la Licencia Pública General GNU (GNU General
Public License) tal y como se redactó por la Free Software Foundation;
bien la versión 2 de la Licencia o (si lo prefiere) cualquier versión
posterior.

Este programa ha sido creado con la intención de que sea útil, pero
SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita de UTILIDAD
COMERCIAL o ADECUACIÓN PARA UN PROPÓSITO ESPECÍFICO. Véase la Licencia 
Pública General GNU para más información.

Junto con este programa debiera haber recibido una copia de la Licencia
Pública General GNU; si no es así, escriba a la Free Software Foundation, Inc.,
59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.

*/

// fichero de la versión en español
define(_WELCOME_, "Por favor, escriba su nombre de usuario y contraseña. Escriba también el nombre de la base de datos a la que desea acceder; si no se proporciona el nombre de ninguna base de datos, se proporcionará una lista con todas las bases de datos existentes en el servidor. Para conectarse a un servidor, escriba el nombre del servidor en la casilla \"Servidor\". Si se da algún error, lo más probable es que se trate de un error en el nombre de usuario y/o contraseña.");
define(_USERNAME_, "Nombre de usuario");
define(_PASSWORD_, "Contraseña");
define(_DBNAME_, "Nombre de la base de datos");
define(_DBHOST_, "Servidor");
define(_LOGIN_, "Conectar");
define(_USE_, "Abrir");

// Página de información
define(_ABOUT_, "Acerca de");
define(_ABOUTINFO_, "\"El Panel de Control MySQL de Matt\" (MPanel) ha sido implementado por Matt Wilson con el fin de permitir el acceso a bases de datos MySQL a través de un navegador en vez de usar una cuenta de telnet, y también para los usuarios que quieran usar una base de datos MySQL sin tener que enfrentarse al problema de construir una base de datos en modo texto. Las siguientes funciones pueden ser ejecutadas mediante este panel de control:");

define(_CREATETABLEINFO_, "Crear tablas con las características MySQL ordinarias");
define(_DELETETABLEINFO_, "Borrar tablas de una base de datos");
define(_OPTIMIZETABLEINFO_, "Mejorar las tablas para que se trabaje más rápido");
define(_RENAMETABLEINFO_, "Renombrar tablas");
define(_ADDFIELDSINFO_, "Añadir nuevos campos a tablas ya existentes");
define(_EDITFIELDINFO_, "Editar los atributos de los campos en tablas y/o campos ya existentes");
define(_DELETEDBINFO_, "Borrar bases de datos");
define(_IMPORTINFO_, "Importar bases de datos desde su servidor local MySQL");
define(_EXPORTDBINFO_, "Exportar bases de datos del servidor");
define(_EXPORTTABLEINFO_, "Exportar tablas individualmente del servidor");
define(_EXECUTESQLINFO_, "Ejecutar instrucciones SQL a medida de forma manual");
define(_CONTACT_, "Contactp");
define(_CONTACTINFO_, "Para cualquier pregunta, etc., puede dirigirse a la siguiente dirección de correo electrónico: <a href=\"mailto: matt@mattsscripts.co.uk\">matt@mattsscripts.co.uk</a> y responderé lo antes posible.");
define(_BACKTOLOGINPAGE_, "Vuelta a la página de identificación");
define(_BACKTOMAINPAGE_, "Vuelta a la página principal");
define(_BACK_, "Atrás");

define(_CREATETABLEERROR_, "Se ha producido un error al intentar crear la tabla");
define(_CREATETABLEGOOD_, "La tabla ha sido creada satisfactoriamente");
define(_ADDNEWFIELD_, "Añadir un nuevo campo");
define(_ADDFIELDINFO_, "Para crear un nuevo campo en la tabla, debe escribir el nombre y el tipo SQL del campo");
define(_FIELDNAME_, "Nombre del campo");
define(_FIELDTYPE_, "Tipo SQL del campo");
define(_VALUE_, "Valor");
define(_FUNC_, "Func.");

define(_TINYINT_, "Entero enano (tiny integer)");
define(_SMALLINT_, "Entero pequeño (small integer)");
define(_MEDIUMINT_, "Entero mediano (medium integer)");
define(_INT_, "Entero (integer)");
define(_BIGINT_, "Entero grande (big integer)");
define(_FLOAT_, "Real en coma flotante (float)");
define(_DOUBLE_, "Real de doble precisión (double)");
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
define(_YEAR_, "Año");
define(_TIMESTAMP_, "Registro de fecha/hora (timestamp)");

define(_MODIFIERS_, "Modificadores");
define(_AUTO_INCREMENT_FM_, "Incrementado automáticamente (para todos los tipos enteros)");
define(_BINARY_FM_, "Binario (para los tipos de cadena: CHAR y VARCHAR)");
define(_NOT_NULL_FM_, "Requerido/no nulo (para todos los tipos)");
define(_UNSIGNED_FM_, "Sin signo (para todos los tipos numéricos)");
define(_ZERO_FILL_FM_, "Rellenar con ceros (para todos los tipos numéricos)");
define(_DEFAULT_FM_, "Valor por defecto (para todos, excepto BLOB y texto)");

define(_OK_, "Aceptar");

define(_CREATEKEYERROR_, "Se ha producido un error al crear la nueva clave");
define(_CREATEKEYGOOD_, "La clave ha sido creada satisfactoriamente");
define(_ADDKEY_, "Añadir una nueva clave");
define(_ADDKEYTOTABLE_, "Añadir una nueva clave a la tabla");
define(_ADDKEYINFO_, "Para crear una nueva clave, debe escribir estos datos: el nombre de la clave, el tipo de la clave y los campos que la componen.");
define(_ADDKEYWARNING_, "<u>NOTA:</u>¡Recuerde que el nombre de una clave no puede superar los 255 caracteres de extensión!");
define(_KEYNAME_, "Nombre de la clave");
define(_KEYTYPE_, "Tipo de la clave");
define(_PRIMARYKEY_, "Clave primaria");
define(_UNIQUEKEY_, "Clave única");
define(_NORMALKEY_, "Clave");
define(_KEYFIELDS_, "Campos que componen la clave");
define(_FIELDS_, "Campos");

define(_ADDRECORDERROR_, "No se ha podido añadir el registro");
define(_ADDRECORDGOOD_, "El registro ha sido incluido en la tabla");
define(_LISTFIELDSERROR_, "No se ha podido obtener una lista de los campos");
define(_ADDRECORD_, "Añadir un registro");

define(_EXPORTTABLE_, "Exportar tabla");
define(_EXECUTESQL_, "Ejecutar una instrucción SQL");

define(_CREATETABLE_, "Crear una nueva tabla");
define(_CREATETABLEINFO_, "Para crear una nueva tabla, basta con escribir el nombre de la tabla que desea crear. La tabla se creará con un campo vacío llamado \"borreme\" (\"delete_me\"); este campo es necesario ya que es obligatorio que todas las tablas tengan al menos un campo.");
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
define(_EXPORTINGDATA_, "Exportando la información");
define(_CONSTRUCTION_, "Construcción");
define(_TABLEDATA_, "Datos de la tabla");
define(_TABLEKEYS_, "Claves de la tabla");
define(_EDITFIELDERROR_, "No es posible modificar el tipo del campo");
define(_EDITFIELDGOOD_, "El tipo del campo ha sido modificado satisfactoriamente");
define(_EDITFIELD_, "Modificar el tipo de campo");
define(_NEWFIELDTYPE_, "Nuevo tipo de campo");

define(_ERROR_, "Se ha producido un error");
define(_ERRORINFO_, "Lo sentimos, pero ha ocurrido un error cuando se intentaba llevar  a cabo la operación; si no debiera haber ocurrido y cree que es un fallo de programación (bug), por favor, envíeme un informe <a href=\"mailto: bugs@mattsscripts.co.uk\">pulsando aquí</a> que incluya cómo, cuándo y por qué ha ocurrido e intentaremos solucionarlo. Si no, puede que su nombre de usuario y/o su contraseña y/o el nombre de la base de datos sean erróneos, lo que significa que necesita <a href=\"index.php\">a la página de autentificación</a> e intentar identificarse de nuevo. También puede <a href=\"javascript:window.back();\">pulsar aquí</a> para volver a intentarlo.");
define(_ERRORMSG_, "Mensaje de error");

define(_FINDDB_, "Encontrar base de datos");
define(_ERRORDBCONNECT_, "No es posible conectar con el servidor de bases de datos; por favor, compruebe su nombre de usuario y contraseña.");

define(_ERRORDBLIST_, "No es posible obtener una lista de todas las bases de datos existentes en el servidor; por favor, póngase en contacto con el administrador del servidor para obtener más ayuda.");
define(_SELECTDB_, "Por favor, escoja la base de datos que desea administrar.");
define(_DBLISTINFO_, "A continuación se muestra una lista de las bases de datos 
residentes en el servidor de bases de datos MySQL especificado. Por favor, pulse sobre la base de datos que desea administrar.");

define(_HELPPAGE_, "Página de ayuda");
define(_HELPINTRO_, "\"El Panel de Control MySQL de Matt\" se ha diseñado de forma que los usuarios pudieran acceder a sus bases de datos MySQL para construir tablas, etc., sin necesidad de una cuenta de telnet. Este panel permite hacer un buen número de cosas, incluyendo:");
define(_HELPCREATEDELETETABLE_, "Creación/eliminación de tablas");
define(_HELPDELETEDB_, "Eliminación de bases de datos");
define(_INTRO_, "Introducción");
define(_HELPADDDELETEFIELDS_, "Adición/eliminación de campos");
define(_HELPALTERFIELDS_, "Modificación de nombres/tipos de campos existentes");
define(_HELPINSERTRECORDS_, "Adición de registros a las tablas");
define(_HELPDELETERECORDS_, "Eliminación de registros de las tablas");
define(_HELPMODIFYRECORDS_, "Modificación de registros existentes en las tablas");
define(_HELPEXECUTESQL_, "Ejecución de instrucciones SQL");
define(_ETC_, "etc");

define(_HELPTOC_, "Índice de contenidos");
define(_HELPLOGIN_, "Conectándose al sistema");
define(_HELPCREATETABLE_, "Creando una tabla");
define(_HELPADDFIELD_, "Añadiendo un campo a la tabla");
define(_HELPEDITFIELD_, "Modificando el tipo de un campo");
define(_HELPINSERTRECORD_, "Agregando un registro a la tabla");
define(_HELPQUERYTABLE_, "Haciendo consultas a la base de datos");
define(_HELPDELETEMODIFYRECORD_, "Borrando/modificando un registro de la tabla");
define(_HELPDELETEFIELD_, "Eliminando un campo de la tabla");
define(_HELPDELETETABLE_, "Eliminando una tabla de la base de datos");
define(_HELPDELETEDB_, "Eliminando una base de datos");
define(_HELPEXECUTINGSQL_, "Ejecutando una instrucción SQL");
define(_HELPEXPORTING_, "Exportando una tabla o una base de datos");
define(_HELPIMPORTING_, "Importando su propia base de datos");

define(_HELPLOGININFO_, "Bien, esta es la primera y más importante parte de las que debe hacer correctamente; si no, ¡no irá a ninguna parte! Su nombre de usuario es el nombre que usa para conectarse a la base de datos MySQL y su contraseña es la que se le dio para acceder a la base de datos MySQL. Lo siguiente es el nombre de la base de datos a la quiere acceder; si lo deja en blanco, se le mostrará una lista de todas las bases de datos para que elija una. Lo último es el nombre del servidor MySQL; esto es muy importante, ya que algunos servidores no permiten conexiones a otros equipos, y por tanto este script tendrá que alojarse en el servidor mismo para funcionar adecuadamente.");
define(_HELPCREATETABLEINFO_, "La creación de una tabla es fácil con este script. Una vez conectado pulse sobre el botón \"Crear tabla\" (\"Create table\") en la parte izquierda de la pantalla; esto debería abrir una nueva ventana con una casilla y el botón \"Crear\" (\"Create\"). Es tan simple como eso; basta con refrescar la página principal y la nueva tabla habrá sido creada, suponiendo claro que el nombre de la tabla era válido. La tabla contendrá un solo campo llamado \"Borreme\" (\"Delete_me\"). El motivo es que cualquier tabla <b>debe</b> tener por lo menos un campo. Una vez que haya creado la tabla, puede simplemente borrar este campo (para obtener información sobre cómo hacerlo, <a href=\"help.html#delfield\">pulse aquí</a>).");
define(_HELPADDFIELDINFO_, "Cuando quiera añadir un campo a la base de datos, deberá escoger la tabla requerida conectándose y pulsando sobre el nombre de la tabla en la lista; esto mostrará una lista con todos los campos existentes en la tabla. Para añadir un nuevo campo a la lista, pulse el botón \"Añadir campo\" (\"Add field\") en el margen de la pantalla. Esto hará que aparezca una ventana nueva pidiéndole el nombre y tipo del nuevo campo. Por favor, tenga en cuenta que el tipo es muy importante y si no está al corriente de los distintos tipos de campo en MySQL, le recomendaríamos informarse en <a target=_new href=\"http://www.mysql.com/documentation/index.html\">el manual de MySQL</a>
o en <a href=\"http://www.your-name-here.co.uk/mysql/fields.html\" target=_new>esta página de Your-Name-Here</a> que contiene información sobre los tipos y tamaños de los tipos."); 
define(_HELPEDITFIELDINFO_, "La modificación del tipo de un campo es otro proceso que requiere conocimientos sobre los tipos de los campos y sobre MySQL (véase \"3. Añadiendo campos a la tabla\" para encontrar sitios donde informarse) y debe hacerse desde el área de información de la tabla, que se muestra pulsando sobre la tabla que contiene el campo que queremos modificar. Al lado de cada campo hay un par de botones: uno de ellos se llama \"Editar tipo\" (\"Edit type\"). Si se pulsa, aparecerá una nueva ventana con una casilla en la que puede escribir el nuevo tipo del campo. Una vez que lo ha hecho, pulse el botón \"Aceptar\" (\"Go\") para actualizar la base de datos.");
define(_HELPINSERTRECORDINFO_, "Para añadir un registro a una de sus tablas, primero debe seleccionarla en la página principal. Esto le llevará a otra página que contendrá una lista con todos los campos de la tabla y algunos datos sobre cada uno de sus tipos. Si pulsa sobre el botón \"Añadir registro\" (\"Add record\") se le mostrará otra página que contendrá una casilla para cada campo en la que deberá escribir la información del registro que quiere incluir en la tabla. Una vez que haya terminado, pulse \"Añadir registro\" (\"Add record\") en la parte inferior de la página para agregar el registro a la base de datos.");

define(_HELPQUERYTABLEINFO_, "Este proceso es bastante sencillo: una vez que haya seleccionado la tabla que contiene la información sobre la que quiere realizar la consulta, pulse el botón \"Consultar\" (\"Query table\") en la parte izquierda de la página. Esto provocará que aparezcan unas cuantas casillas - una por cada campo de la tabla. En ellas es donde escribirá los datos por los que quiere buscar. El script entonces buscará en la base de datos y la tabla en uso los registros que concuerden con los datos que ha escrito y devolverá los resultados en forma tabular.");
define(_HELPDELETEMODIFYRECORDINFO_, "Esta función es fácil de usar, pero puede ser peligrosa dependiendo de si tiene más de un registro idéntico. El problema es que si dos registros son idénticos, entonces la eliminación de uno de ellos implica automáticamente la eliminación del otro - aquí es donde los campos \"id\" y los campos únicos (también conocidos como Claves Primarias) entran en juego. Estos campos pueden usarse para distinguir cada uno de los registros. Para borrar un registro, primero pulse sobre la tabla que contiene el registro en la página principal y pulse el botón \"Borrar registro\" (\"Delete record\") en el margen de la página; rellene entonces toda la información posible en la página (no se tendrán en cuenta mayúsculas o minúsculas, y se buscará de forma que el criterio de búsqueda coincida con parte del registro. Nota del traductor: las tildes también son ignoradas.) y pulse \"Buscar\" (\"Search\"); los resultados de la búsqueda se mostrarán en la pantalla. Simplemente pulse el botón \"Bórreme\" (\"Delete me\") para eliminar el registro de la tabla. La modificación de un campo se hace de la misma manera; la única diferencia es que cuando pulse el botón \"Modificar\" (\"Modify\") después de una búsqueda deberá rellenar los nuevos datos que quiera incluir en la tabla.");
define(_HELPDELETEFIELDINFO_, "Borrar un campo de una de sus tablas es todavía más sencillo que añadirlo: simplemente escoja la tabla que contiene el campo que desea eliminar en la página principal y pulse el botón \"Borrar\" (\"Delete\") que se encuentra al lado del campo. El script le pedirá su confirmación tres veces y eliminará el campo, así como toda la información que albergara.");
define(_HELPDELETETABLEINFO_, "Borrar una tabla de la base de datos es tan sencillo como eliminar un campo de una de las tablas: pulse el botón \"Borrar\" (\"Delete\") que hay al lado de la tabla que desea eliminar y confirme a continuación el proceso, pero recuerde que si borra una tabla de sus bases de datos, será completamente eliminada y no podrá recuperar <b>ninguna</b> información de ella.");
define(_HELPDELETEDBINFO_, "Para borrar una base de datos, pulse sobre el botón \"Borrar base de datos\" (\"Delete database\") en la página principal; de nuevo tendrá que confirmar tres veces su elección y entonces se eliminará la base de datos. Esto provocará, por supuesto, la eliminación de <b>todo</b>. Es muy importante que no haga esto accidentalmente, ya que toda la información contenida en la base de datos será eliminada y no podrá recuperarla.");
define(_HELPEXECUTINGSQLINFO_, "Para ejecutar una instrucción MySQL, deberá saber, por supuesto, qué instrucción es, qué hace y qué cambios producirá en su base de datos. Si sabe usar MySQL, entonces puede simplemente escribir la instrucción en la casilla de la página principal o en la página de detalles de la tabla y ejecutarla. Sin embargo, no se mostrará ningún mensaje de salida, la ejecución será \"silenciosa\".");
define(_HELPEXPORTINGINFO_, "Esta función es increíblemente útil si necesita hacer una copia de la base de datos que se encuentra en el servidor. Permite hacer un volcado de la base de datos o tabla de su elección a través del servidor web y guardarlo en un fichero idéntico al que hubiera creado la función \"mysqldump\" - fácil.");
define(_HELPIMPORTINGINFO_, "Importar su propia base de datos creada por la función \"mysqldump\" es muy fácil de hacer. Pulse \"Importar información\" (\"Import data\") en la página principal y se mostrará una nueva ventana en la que podrá elegir un fichero de su ordenador. Este es el fichero que desea subir al servidor. Pulse \"¡Importar!\" (\"Import!\") para recuperar la información en la base de datos, refresque el contenido de la página principal y los datos se habrán incluido en la base de datos, siempre y cuando no haya habido errores, claro.");

define(_IMPORTDATA_, "Importar datos");
define(_IMPORTDATAINSTRUCT_, "Para importar información en esta base de datos, deberá pulsar sobre el botón \"Examinar...\" (\"Browse...\") y seleccionar un fichero previamente volcado. Estos ficheros son simplemente una lista más o menos larga de instrucciones SQL que reconstruyen la base de datos volcada.");
define(_IMPORTFILE_, "Importar fichero");
define(_IMPORTDBDATA_, "Importar base de datos");

define(_WELCOMETITLE_, "Bienvenido");
define(_EXPORTDB_, "Exportar base de datos");
define(_DELETEDB_, "Eliminar base de datos");
define(_DELETETABLE_, "Eliminar tabla");
define(_OPTIMIZETABLE_, "Mejorar tabla");
define(_DELETEFIELD_, "Eliminar campo");
define(_DELETEDBCONFIRM_, "¿Está seguro de querer eliminar esta base de datos?");
define(_DELETEFIELDCONFIRM_, "¿Está seguro de querer eliminar este campo?");
define(_DELETETABLECONFIRM_, "¿Está seguro de querer eliminar esta tabla?");
define(_LOGOUTCONFIRM_, "¿Seguro que quiere desconectarse?");
define(_LOGOUT_, "Desconectar");
define(_TABLENAME_, "Nombre de tabla");
define(_COMMANDS_, "Opciones");
define(_KEYMANAGEMENT_, "Gestión de claves");

define(_DELETEKEYCONFIRM_, "¿Está seguro de querer eliminar esta clave?");
define(_DELETEKEY_, "Borrar clave");
define(_MODIFYARECORD_, "Modificar un registro");

define(_LOGINERROR_, "No es posible conectarse");
define(_LOGINERRORINFO_, "Lo sentimos, pero no se ha podido conectar usted al servidor MySQL; esto puede ocurrir por varios motivos. Quizá su nombre de usuario y/o contraseña son incorrectos, o la base de datos que ha indicado no existe en el servidor. También podría ser que el servidor no admite conexiones de otros equipos y tiene, por tanto, que conectarse al servidor desde el servidor mismo. Si este problema persiste, debería ponerse en contacto con el administrador del servidor.");

define(_SEARCHRESULTS_, "Resultados de la búsqueda");
define(_FOUNDRECORDS_, "Se han encontrado los siguientes registros");
define(_NOPRIMARYKEY_, "No se ha definido ninguna clave primaria o única, de forma que los efectos de la modificación o eliminación de un registros son impredecibles");
define(_DELETERECORDCONFIRM_, "¿Confirma la eliminación de este registro?");
define(_DELETERECORD_, "Eliminar registro");
define(_MODIFYRECORD_, "Modificar registro");
define(_SEARCHEMPTY_, "No se han podido encontrar registros que satisfagan su criterio de búsqueda");
define(_RENAMEFIELD_, "Renombrar campo");
define(_FIELDNEWNAME_, "Nuevo nombre del campo");
define(_FIELDNEWNAMEINFO_, "Por favor, escriba el nuevo nombre del campo y pulse el botón \"Aceptar\" (\"OK\")");

define(_RENAMETABLE_, "Renombrar tabla");
define(_TABLENEWNAME_, "Nuevo nombre de la tabla");
define(_TABLENEWNAMEINFO_, "Por favor, escriba el nuevo nombre de la tabla y pulse el botón \"Aceptar\" (\"OK\")");
define(_SQLRESULTS_, "Resultados SQL");
define(_SQLEXECUTED_, "La instrucción SQL se ha ejecutado satisfactoriamente");
define(_SQLOUTPUT_, "Este es el resultado de la instrucción SQL");
define(_SQLERROR_, "No es posible ejecutar la instrucción SQL");

define(_SQLRESULTCODE_, "La consulta se ha llevado a cabo. MySQL ha devuelto lo siguiente");
define(_SQLRESULTROWS_, "Número de filas que se devuelven");
define(_SQLRESULTROWSAFFECTED_, "Número de filas afectadas"); 
define(_SQLRESULTFIELDS_, "Número de campos que se devuelven");
define(_TABLEDETAILS_, "Detalles de la tabla");
define(_ADDNEWFIELD_, "Añadir un nuevo campo");
define(_SEARCHDELETEMODIFYRECORDS_, "Buscar/borrar/modificar registros");

define(_CURDATABASE_, "Base de datos en uso");
define(_CURTABLE_, "Tabla seleccionada");
define(_CHANGEFIELDTYPE_, "Cambiando el tipo del campo");
define(_SUCCESSMOD_, "Se ha modificado satisfactoriamente el asiento");
define(_ERRORMOD_, "Se ha producido un error al intentar modificar el asiento"); 
define(_ERRORMODRECORD_, "Se ha producido un error en la búsqueda del registro para modificar");
define(_ERROROPTIMIZE_, "Se ha producido un error al intentar mejorar la tabla");
define(_SUCCESSOPTIMIZE_, "La tabla ha sido mejorada satisfactoriamente"); 
define(_ERRORTABLEDESC_, "No es posible obtener una descripción de la tabla");
define(_SEARCHRECORDS_, "Buscar registros");
define(_OPERATION_, "Operación");
define(_TYPE_, "Tipo");
define(_ERRORENAMEFIELD_, "No es posible renombrar el campo");
define(_SUCCESSRENAMEFIELD_, "El campo ha sido renombrado satisfactoriamente");
define(_ERRORRENAMETABLE_, "No es posible renombrar la tabla");
define(_SUCCESSRENAMETABLE_, "La tabla ha sido renombrada satisfactoriamente");
define(_RESET_, "Reiniciar");

define(_IMPORTSUCCESS_, "Datos importados satisfactoriamente, nº de instrucciones SQL procesadas");
define(_UPDATE_, "Actualizar");
define(_BROWSE_, "Examinar");
define(_EXPORTFMT_, "Exportar formato");
define(_CHANGEDB_, "Cambiar base de datos");
define(_CHANGETABLE_, "Cambiar tabla");

define(_SHOWPAGE_, "Mostrar nº de p&aacute;gina");
define(_RESULTSPERPAGE_, "Nº de filas por p&aacute;gina");
define(_NEXTPAGE_, "Página siguiente");
define(_PREVIOUSPAGE_, "Página anterior");
define(_NOTE_, "Nota");

define(_ADDFIELDAFTER_, "Añadir el campo a continuación de");
define(_TABLEEND_, "Fin de tabla");

define(_DBMANAGER_, "Administrador de la base de datos");
define(_ALLOWEDDBS_, "Su usuario tiene acceso a las siguientes bases de datos y sus tablas respectivas");
define(_DISALLOWEDDBS_, "Estas son las bases de datos a las que no tiene acceso");
define(_WELCOMEDB_, "Bienvenido a la página de administración de bases de datos. Puede seleccionar una base de datos para administrar o administrar las bases de datos ya disponibles (si tiene permiso).");
define(_CREATEDB_, "Crear una base de datos");
define(_CREATEDBERROR_, "No se ha podido crear la base de datos");
define(_CREATEDBGOOD_, "La base de datos se ha creado satisfactoriamente");
define(_DELETEDBERROR_, "No se ha podido borrar la base de datos");
define(_DELETEDBGOOD_, "La base de datos se ha eliminado satisfactoriamente");
define(_GRANTDBERROR_, "No se han podido otorgar permisos al usuario");
define(_GRANTDBGOOD_, "Los permisos han sido otorgados al usuario satisfactoriamente");

?>
