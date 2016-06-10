<?php
        //mysql_connect("localhost", "root", "");
        //mysql_select_db("bd_maodeobra");
		
		$servername = "localhost";
		$username = "scriptsf_user";
		$password = "20scripts16";
		$dbname = "scriptsf_maodeobra";
		
		$conn = mysql_connect($servername, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);
			if (!$conn) {				
				//die("Connection failed: " $conn -> connect_error);
				die('Could not connect: ' . mysql_error());
			}
                        mysql_select_db($dbname, $conn) or trigger_error(mysql_error(),E_USER_ERROR);
         
        function autoindex($tb)
        {
                $query = mysql_query('SHOW TABLE STATUS LIKE "' . $tb . '"');
                $data = mysql_fetch_array($query);
                return $data['Auto_increment'];
        }
         
        switch ($_REQUEST['acao']) {
                case 'add' :
                        $valor1 = urldecode($_REQUEST['id']);
                        $valor2 = urldecode($_REQUEST['nome']);
                        $valor3 = urldecode($_REQUEST['email']);
						$valor4 = urldecode($_REQUEST['telefone']);
                        echo autoindex("MAODEOBRA");
                        mysql_query("INSERT INTO MAODEOBRA VALUES('','$valor2', '$valor3', '$valor4')");
                        break;
                case 'del' :
                        $id = $_REQUEST['id'];
                        mysql_query("DELETE FROM MAODEOBRA WHERE id = '$id'");
                        break;
                case 'edit' :
                        $id  = $_REQUEST["id"];
                        $valor2 = urldecode($_REQUEST["nome"]);
                        $valor3 = urldecode($_REQUEST["email"]);
                        $valor4 = urldecode($_REQUEST["telefone"]);
                        mysql_query("UPDATE MAODEOBRA SET nome = '$valor2', email = '$valor3', telefone = '$valor4' WHERE id = '$id'");
                        break;
        }
 
?>