<?php
/*

Matt's MySQL Panel - administer MySQL databases remotely
Copyright (C) 2001 Matt Wilson <matt@mattsscripts.co.uk

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/

// the english language file
define(_WELCOME_, "Please enter your username and password below. Also enter the name of the database you wish to access, if no database is provided then a list will be supplied containing all the server's databases. To connect to a remote host you can enter the hostname in the \"Server host\" text box. If an error occurs it is most likely due to an invalid username/password combination.");
define(_USERNAME_, "Username");
define(_PASSWORD_, "Password");
define(_DBNAME_, "Database Name");
define(_DBHOST_, "Server Host");
define(_LOGIN_, "Login");
define(_USE_, "Use");

// about/info page
define(_ABOUT_, "About");
define(_ABOUTINFO_, "\"Matt's MySQL Control Panel\" (MPanel) was written by Matt Wilson to allow people to access MySQL databases remotely via a web browser instead of via a telnet account, or alternatively for people who wish to use a MySQL database but don't want to have to go through the trouble of manually constructing a database using a text mode client. Using this control panel the following functions can be achieved:");
define(_CREATETABLEINFO_, "Create tables with all the usual MySQL functionality");
define(_DELETETABLEINFO_, "Delete tables from a database");
define(_OPTIMIZETABLEINFO_, "Optimize tables for increased speed");
define(_RENAMETABLEINFO_, "Rename tables");
define(_ADDFIELDSINFO_, "Add fields to existing tables");
define(_EDITFIELDINFO_, "Edit field attributes for existing tables and/or fields");
define(_DELETEDBINFO_, "Delete databases");
define(_IMPORTINFO_, "Import databases from your local MySQL server");
define(_EXPORTDBINFO_, "Export databases from the server");
define(_EXPORTTABLEINFO_, "Export individual tables from the server");
define(_EXECUTESQLINFO_, "Execute custom, manual SQL statements on the server");define(_CONTACT_, "Contact");
define(_CONTACTINFO_, "To contact me with any questions etc. email me at <a href=\"mailto: matt@mattsscripts.co.uk\">matt@mattsscripts.co.uk</a> and I will reply as soon as possible.");
define(_BACKTOLOGINPAGE_, "Back to the login page");
define(_BACKTOMAINPAGE_, "Back to the main page");
define(_BACK_, "Back");

define(_CREATETABLEERROR_, "There was an error trying to create the new table");
define(_CREATETABLEGOOD_, "Table created successfully");
define(_ADDNEWFIELD_, "Add a new field");
define(_ADDFIELDINFO_, "In order to create a new field in your table you must provide the field name and SQL field type, these can be entered below");
define(_FIELDNAME_, "Field name");
define(_FIELDTYPE_, "Field type");
define(_VALUE_, "Value");
define(_FUNC_, "Func.");

define(_TINYINT_, "Tiny integer");
define(_SMALLINT_, "Small integer");
define(_MEDIUMINT_, "Medium integer");
define(_INT_, "Integer");
define(_BIGINT_, "Big integer");
define(_FLOAT_, "Float");
define(_DOUBLE_, "Double");
define(_DECIMAL_, "Decimal");
define(_CHAR_, "Char");
define(_VARCHAR_, "Varchar");
define(_TINYTEXT_, "Tiny text");
define(_TINYBLOB_, "Tiny blob");
define(_ENUM_, "Enum");
define(_TEXT_, "Text");
define(_BLOB_, "Blob");
define(_MEDIUMTEXT_, "Medium text");
define(_MEDIUMBLOB_, "Medium blob");
define(_LONGTEXT_, "Long text");
define(_LONGBLOB_, "Long blob");
define(_DATETIME_, "Date &amp; Time");
define(_DATE_, "Date");
define(_TIME_, "Time");
define(_YEAR_, "Year");
define(_TIMESTAMP_, "Timestamp");

define(_MODIFIERS_, "Modifiers");
define(_OK_, "OK");

define(_CREATEKEYERROR_, "There was an error trying to create the new key");
define(_CREATEKEYGOOD_, "Key created successfully");
define(_ADDKEY_, "Add a new key");
define(_ADDKEYTOTABLE_, "Add a new key to table");
define(_ADDKEYINFO_, "To create a new key, you must enter a few details below, the key name, the key type and the fields that the key should cover.");
define(_ADDKEYWARNING_, "<u>NOTE:</u>Remember a key cannot exceed 255 characters in total!");
define(_KEYNAME_, "Key name");
define(_KEYTYPE_, "Key type");
define(_PRIMARYKEY_, "Primary key");
define(_UNIQUEKEY_, "Unique key");
define(_NORMALKEY_, "Key");
define(_KEYFIELDS_, "Fields to cover");
define(_FIELDS_, "Fields");

define(_ADDRECORDERROR_, "Unable to add record");
define(_ADDRECORDGOOD_, "Added record to table");
define(_LISTFIELDSERROR_, "Unable to retrieve a field list");
define(_ADDRECORD_, "Add a record");

define(_EXPORTTABLE_, "Export table");
define(_EXECUTESQL_, "Execute SQL command");

define(_CREATETABLE_, "Create a new table");
define(_CREATETABLEINFO_, "To create a new table, simply enter the name of the new table you wish to create below. The table will be created with an empty field called \"delete_me\", this is because all tables require at the very least one column to exist.");
define(_NEWTABLENAME_, "New table name");
define(_DELETEDBERROR_, "Unable to delete database");
define(_DROPFIELDERROR_, "Unable to drop field");
define(_DROPFIELDGOOD_, "Field deleted successfully");
define(_DROPKEYERROR_, "Unable to delete key");
define(_DROPKEYGOOD_, "Key deleted successfully");
define(_DELETERECORDERROR_, "Error deleting record");
define(_DELETERECORDGOOD_, "Record deleted successfully");
define(_DROPTABLEERROR_, "Unable to delete table");
define(_DROPTABLEGOOD_, "Table deleted successfully");
define(_CHOOSEEXPORT_, "Choose what to export");
define(_EXPORTINGDATA_, "Exporting data");
define(_CONSTRUCTION_, "Construction");
define(_TABLEDATA_, "Table data");
define(_TABLEKEYS_, "Table keys");
define(_EDITFIELDERROR_, "Unable to edit field type");
define(_EDITFIELDGOOD_, "Field type edited successfully");
define(_EDITFIELD_, "Edit field type");
define(_NEWFIELDTYPE_, "New field type");

define(_ERROR_, "An error occured");
define(_ERRORINFO_, "Sorry but an error just occured when you were trying to perform this task, if this shouldn't have happened and you think it is a bug please submit a bug report to me <a href=\"mailto: bugs@mattsscripts.co.uk\">here</a> stating how, when and why it occured and i'll try to fix it. Otherwise you might have not got your username and/or password and/or database name wrong which would mean you need to <a href=\"index.php\">go back</a> to the login screen and try to login again. Otherwise, you might be able to just click <a href=\"javascript:window.back();\">back</a> to try again.");
define(_ERRORMSG_, "Error message");

define(_ERRORDBCONNECT_, "Unable to connect to the database server, please check your username and password.");
define(_ERRORDBLIST_, "Unable to obtain a list of databases present on the server, please contact the server administrator for more assistance.");

define(_HELPPAGE_, "Help page");
define(_HELPINTRO_, "\"Matt's MySQL Control-Panel\" was designed so that people could access their MySQL databases to construct tables etc without needing a telnet account, a number of things can be done with this script, including;");
define(_HELPCREATEDELETETABLE_, "Creating/deleting table");
define(_HELPDELETEDB_, "Deletion of databases");
define(_INTRO_, "Introduction");
define(_HELPADDDELETEFIELDS_, "Add/deleting fields from tables");
define(_HELPALTERFIELDS_, "Alteration of current field names/types");
define(_HELPINSERTRECORDS_, "Inserting records into tables");
define(_HELPDELETERECORDS_, "Deleting records from tables");
define(_HELPMODIFYRECORDS_, "Modifying existing records in tables");
define(_HELPEXECUTESQL_, "Execution of MySQL commands");
define(_ETC_, "etc");

define(_HELPTOC_, "Table Of Contents");
define(_HELPLOGIN_, "Logging into the system");
define(_HELPCREATETABLE_, "Creating a table");
define(_HELPADDFIELD_, "Adding a field to the table");
define(_HELPEDITFIELD_, "Editing the field type");
define(_HELPINSERTRECORD_, "Inserting a record into the table");
define(_HELPQUERYTABLE_, "Querying a table for information");
define(_HELPDELETEMODIFYRECORD_, "Deleting/Modifying a record in the table");
define(_HELPDELETEFIELD_, "Deleting a field in the table");
define(_HELPDELETETABLE_, "Deleting a table from the database");
define(_HELPDELETEDB_, "Deleting a database");
define(_HELPEXECUTINGSQL_, "Executing a MySQL command");
define(_HELPEXPORTING_, "Exporting a table or database");
define(_HELPIMPORTING_, "Importing your own database");

define(_HELPLOGININFO_, "OK, this is the first and most important part that you must do correctly otherwise you are going nowhere! Your username is the username that you use to connect to the MySQL database and your password is the password that you were given to access the MySQL database. The next part is the database name that you wish to use, if this is left blank then a list of all available databases will be given for you to choose from. The last part is the hostname of the MySQL server, this is very important as some servers don't allow remote connections and hence this script will have to reside on the server itself to be any use.");
define(_HELPCREATETABLEINFO_, "Creating a table is easy with this script, once logged in click on the \"Create table\" button on the left hand side of the screen, this should open up a new window displaying an input dialog and \"Create\" button, simply type in the name of the table which you wish to create and then click \"Create\". Its as simple as that, just refresh the main screen and the new table should have been created provided of course that your table name was legal! The table will contain a single field called \"Delete_me\" this is because a table <b>has</b> to contain at least one field, this means that once you have constructed your table you can simply delete this field, for information on how to do this see <a href=\"help.html#delfield\">here</a>.");
define(_HELPADDFIELDINFO_, "When you want to add a field to your database you must select the required table by logging in and clicking on the tablename in the list, this will bring up a list of all the field names currently present in the table. To add a new field to this list click the \"Add field\" button at the side of the screen, this will cause a popup window asking you for the new field's name and type, please note that the type details are very important and if you are not aware of the different types of field in MySQL I would recommend reading up on them either in the <a target=_new href=\"http://www.mysql.com/documentation/index.html\">MySQL manual</a> or on <a href=\"http://www.your-name-here.co.uk/mysql/fields.html\" target=_new>this page</a> from Your-Name-Here which contains some information on field lengths and types.");
define(_HELPEDITFIELDINFO_, "Editing the field information and setting the type of field is another process which requires knowledge of field types and some MySQL knowledge (see '3. Adding a field to the table' for help on finding places of information) and must be done from within the table information area, this is found by clicking on the table which contains the field you wish to alter. Next to each field there are a couple of buttons, one of these is called \"Edit type\", by clicking this button a new window will popup with a place where you can enter the new field type, once this has been entered click the \"Go\" button to update the database.");
define(_HELPINSERTRECORDINFO_, "To insert a record into one of your tables you must first select it on the main screen, this will take you to a page containing a list of all the fields in the table and some information on each of their types. By then clicking on the \"Add Record\" button you will be taken to another page containing an input dialog for each field where you can enter information in which will be placed into the record you wish to inser into the table. Once you have finished click \"Add Record\" at the bottom of the screen to insert the record into the database.o insert a record into one of your tables you must first select it on the main screen, this will take you to a page containing a list of all the fields in the table and some information on each of their types. By then clicking on the \"Add Record\" button you will be taken to another page containing an input dialog for each field where you can enter information in which will be placed into the record you wish to inser into the table. Once you have finished click \"Add Record\" at the bottom of the screen to insert the record into the database.");
define(_HELPQUERYTABLEINFO_, "This is quite simple to do, once you have selected the table that contains the data which you want to query click on the \"Query table\" button on the left hand side of the screen, this will bring up a few text boxes - one for each field in your table. This is where you put in the data that you want to search for, the script will then search the current database and table for the records matching the data your provided and will display the results in tables.");
define(_HELPDELETEMODIFYRECORDINFO_, "This feature is quite easy to use, however it can be dangerous depending on whether you have multiple records identical. The problem is that if two records are identical then by deleting one of them you automatically delete the other - this is where 'id' fields and unique fields come into their own (aka Primary Keys). These fields can be used to tell each individual field apart. To delete a field firstly click on the table that contains the field on the main screen and then click on the 'Delete record' button at the side of the screen, then fill in as much information as you can on the screen (not case sensitive and it does search for the record so part of the record is useful for searching) then click search, the search results will be displayed on the screen, simply click on the \"Delete me\" button to remove the record (and hopefully just that record) from the table. Modifying a field is done in much the same way, the only difference is that when you click the \"Modify\" button after a search you must then fill in the new details to be put into the table.");
define(_HELPDELETEFIELDINFO_, "Deleting a field in one of your tables is even easier than adding a field, simply select the table on the main screen which contains the field you wish to delete and then click on the \"Delete\" button next to the specific field, the script will ask you three times if you are sure you want to delete this field and then it will be deleted along with all the information contained within it.");
define(_HELPDELETETABLEINFO_, "Deleting a table from the database is as easy as deleting a field from one of your tables, simple click the delete button next to the table you want to delete on the main table and then confirm your choice, but remember if you delete a table from one of your databases, it will be totally deleted and you will not be able to retrieve <b>any</b> of the data contained within it.");
define(_HELPDELETEDBINFO_, "To delete a database click on the \"Delete database\" button on the main screen, once again you will have to confirm your choice three times and then the database will be deleted, this will of course delete <b>everything</b> it is very important that you do not do this by accident as all of your database information will be removed and you will not be able to retrieve any of it!");
define(_HELPEXECUTINGSQLINFO_, "In order to execute a MySQL command you must of course know what a MySQL command is and does and how it is going to change your database. If you know how to use MySQL then you can simply enter the command into the input dialog on either the main screen or on the table details screen to execute that command, you will not see any output however, it will just execute the command silently.");
define(_HELPEXPORTINGINFO_, "This function of the script can be incredibly useful if you need to get a copy of the database currently on the server, it allows you to 'mysqldump' the database or table of your choice via the web server and then just save the page-source to a file which is then identical to a file which 'mysqldump' would have created - easy.");
define(_HELPIMPORTINGINFO_, "Importing your own database created by 'mysqldump' is just as easy to perform. To do this click on the \"Import data\" button on the main screen, this will bring up a new window where you can enter a local filename, this is the file which you wish to upload, then click \"Import!\" to import the data into the database, just refresh the main screen and the data should have been entered into the database providing that there were no errors of course.");

define(_IMPORTDATA_, "Import data");
define(_IMPORTDATAINSTRUCT_, "In order to import data into this database you must click on the \"Browse...\" button and select a previously dumped file. These files are just a long list of SQL commands which reconstruct any aspect of the database dumped.");
define(_IMPORTFILE_, "Import file");
define(_IMPORTDBDATA_, "Import database data");

define(_WELCOMETITLE_, "Welcome");
define(_EXPORTDB_, "Export database");
define(_DELETEDB_, "Delete database");
define(_DELETETABLE_, "Delete table");
define(_OPTIMIZETABLE_, "Optimize table");
define(_DELETEFIELD_, "Delete field");
define(_DELETEDBCONFIRM_, "Are you sure you want to delete this database?");
define(_DELETEFIELDCONFIRM_, "Are you sure you want to delete this field?");
define(_DELETETABLECONFIRM_, "Are you sure you want to delete this table?");
define(_LOGOUTCONFIRM_, "OK to log out?");
define(_LOGOUT_, "Logout");
define(_TABLENAME_, "Table name");
define(_COMMANDS_, "Commands");
define(_KEYMANAGEMENT_, "Key management");

define(_DELETEKEYCONFIRM_, "Are you sure you want to delete this key?");
define(_DELETEKEY_, "Delete key");
define(_MODIFYARECORD_, "Modify a record");

define(_LOGINERROR_, "Unable to login");
define(_LOGINERRORINFO_, "We're sorry but we were unable to log you into the MySQL server, this could be for a number of reasons, perhaps your username and/or password are incorrect or the database you supplied doesn't exist on the server. It could also be that the server doesn't allow remote connections and you have to connect to the server from the server itself. If this problem continues you should contact the server administrator.");

define(_SEARCHRESULTS_, "Search results");
define(_FOUNDRECORDS_, "Found the following records");
define(_NOPRIMARYKEY_, "No primary key or unique key is present in this table so any attempt to modify or delete a record can produce unpredictable results!");
define(_DELETERECORDCONFIRM_, "OK to delete this record?");
define(_DELETERECORD_, "Delete record");
define(_MODIFYRECORD_, "Modify record");
define(_SEARCHEMPTY_, "No records were found matching your search criteria");
define(_RENAMEFIELD_, "Rename field");
define(_FIELDNEWNAME_, "New name for field");
define(_FIELDNEWNAMEINFO_, "Please enter the new field name and press the 'OK' button.");

define(_RENAMETABLE_, "Rename table");
define(_TABLENEWNAME_, "New name for table");
define(_TABLENEWNAMEINFO_, "Please enter the new table name and then press the 'OK' button");
define(_SQLRESULTS_, "SQL results");
define(_SQLEXECUTED_, "SQL command executed successfully");
define(_SQLOUTPUT_, "Here is the output of your SQL command");
define(_SQLERROR_, "Unable to execute SQL command");

define(_SQLRESULTCODE_, "Query executed, MySQL returned the following");
define(_SQLRESULTROWS_, "Number of rows returned");
define(_SQLRESULTROWSAFFECTED_, "Number of rows returned");
define(_SQLRESULTFIELDS_, "Number of fields returned");
define(_TABLEDETAILS_, "Table details");
define(_ADDNEWFIELD_, "Add new field");
define(_SEARCHDELETEMODIFYRECORDS_, "Search/Delete/Modify records");

define(_CURDATABASE_, "Current database");
define(_CURTABLE_, "Current table");
define(_CHANGEFIELDTYPE_, "Changing field type");
define(_SUCCESSMOD_, "Entry successfully modified");
define(_ERRORMOD_, "Error modifying entry");
define(_ERRORMODRECORD_, "Error find record for modification");
define(_ERROROPTIMIZE_, "Error optimizing table");
define(_SUCCESSOPTIMIZE_, "Successfully optimized table");
define(_ERRORTABLEDESC_, "Unable to obtain table description");
define(_SEARCHRECORDS_, "Search records");
define(_OPERATION_, "Operation");
define(_TYPE_, "Type");
define(_ERRORENAMEFIELD_, "Unable to rename field");
define(_SUCCESSRENAMEFIELD_, "Successfully renamed field");
define(_ERRORRENAMETABLE_, "Unable to rename table");
define(_SUCCESSRENAMETABLE_, "Successfully renamed table");
define(_RESET_, "Reset");

define(_AUTO_INCREMENT_FM_, "Auto Increment (All Int types)");
define(_BINARY_FM_, "Binary (Char, Varchar)");
define(_NOT_NULL_FM_, "Not NULL (All types)");
define(_UNSIGNED_FM_, "Unsigned (Numeric types)");
define(_ZERO_FILL_FM_, "Zero Fill (Numeric types)");
define(_DEFAULT_FM_, "Default (All, except BLOB, TEXT)");
define(_MODIFIERS_, "Modifiers");

define(_IMPORTSUCCESS_, "Data imported successfully, number of SQL queries executed");

define(_UPDATE_, "Update");
define(_BROWSE_, "Browse");
define(_EXPORTFMT_, "Export format");
define(_CHANGEDB_, "Change database");
define(_CHANGETABLE_, "Change table");

define(_SHOWPAGE_, "Show page number");
define(_RESULTSPERPAGE_, "Number of results per page");
define(_NEXTPAGE_, "Next page");
define(_PREVIOUSPAGE_, "Previous page");
define(_NOTE_, "Note");

define(_ADDFIELDAFTER_, "Add field after");
define(_TABLEEND_, "Table end");

define(_FINDDB_, "Find database");

define(_DBMANAGER_, "Database manager");
define(_ALLOWEDDBS_, "Your user has access to the following databases and their respective tables");
define(_DISALLOWEDDBS_, "These are the databases you do not have access to");
define(_WELCOMEDB_, "Welcome to the database administration page. You can either select a database to administer from below or manage the available databases (if access permits).");
define(_CREATEDB_, "Create a database");
define(_CREATEDBERROR_, "Unable to create database");
define(_CREATEDBGOOD_, "Successfully created database");
define(_DELETEDBERROR_, "Unable to delete database");
define(_DELETEDBGOOD_, "Successfully deleted database");
define(_GRANTDBERROR_, "Unable to grant user permissions");
define(_GRANTDBGOOD_, "Successfully granted user permissions");

define(_GRANTUSER_, "Grant database access to a user");

define(_IMPORTTYPE_, "File import format");
define(_CSVHEADER_, "CSV file contains field header line");
define(_CSVCONTAINER_, "CSV field container");
define(_CSVSEPERATOR_, "CSV field seperator");

//define(_SELECTDB_, "Please select the database you wish to administer");
//define(_DBLISTINFO_, "Underneath there are is a list of all the databases residing on the MySQL database server provided. Please click on the database that you wish to administrate.");

define(_BROWSEQUICK_, "Quick Browse");

// A couple of new ones
define(_DELUSER_, "Delete a user");
define(_DELUSERCHOOSE_, "You must choose a user to delete");
define(_DELUSERBAD_, "An error occured when trying to delete the user");
define(_DELUSERGOOD_, "User deleted successfully");

define(_GRANTDBCHOOSE_, "You must choose a database");

define(_CREATEDBCHOOSE_, "You must enter a database name");

define(_REVOKEUSERGOOD_, "Successfully revoked privaleges");
define(_REVOKEUSERBAD_, "An error occured while trying to revoke privaleges");
define(_REVOKEUSERCHOOSE_, "You must choose a privalege set to revoke");
define(_REVOKEUSER_, "Revoke user access");

?>
