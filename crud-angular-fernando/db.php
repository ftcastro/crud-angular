<?php
	include('connection.php');
	
	switch($_GET['action'])  {
	    case 'add_coment' :
	    		echo("<script>console.log('olá');</script>");	    
	            add_coment();
	            break;
	    case 'get_coment' :
	            get_coment();
	            break;
	    case 'edit_coment' :
	            edit_coment();
	            break;
	    case 'delete_coment' :              
	            delete_coment();
	            break;
	    case 'update_coment' :
	            update_coment();
	            break;
	}
	function add_coment() {
	    $data = json_decode(file_get_contents("php://input")); 
	    $nome      = $data->nome;    
	    $email      = $data->email;
		$telefone      = $data->telefone;
	    print_r($data);
	    $qry = 'INSERT INTO MAODEOBRA (nome,email,telefone) values ("'.$nome.'","' . $email . '","' . $telefone . '")';
	    $qry_res = mysql_query($qry);
	    if ($qry_res) {
	        $arr = array('msg' => "Dados enviados com sucesso", 'erro' => '');
	        $jsn = json_encode($arr);
	        echo '<script language="javascript">alert("message successfully sent");</script>';
	        // print_r($jsn);
	    } 
	    else {
	        $arr = array('msg' => "", 'erro' => 'Ocorreu um erro ao enviar os dados');
	        $jsn = json_encode($arr);
	        // print_r($jsn);
	    }
	}

	function get_coment() {
	    $qry = mysql_query('SELECT * from MAODEOBRA ORDER BY id DESC');
	    $data = array();
	    while($rows = mysql_fetch_array($qry))
	    {
	        $data[] = array(
	                    "id" => $rows['id'],
	                    "nome" => $rows['nome'],
	                    "email" => $rows['email'],
						"telefone" => $rows['telefone']
	                    );
	    }
	    print_r(json_encode($data));
	    return $data;  
	}

	function delete_coment() {
	    $data = json_decode(file_get_contents("php://input"));

	    $index = $data->coment_index;     
	    //print_r($data)   ;
	    $del = mysql_query("DELETE FROM MAODEOBRA WHERE id = ".$index);
	    if($del)
	    return true;
	    return false;     
	}

	function edit_coment() {
	    $data = json_decode(file_get_contents("php://input"));     
	    $index = $data->coment_index; 
	    $qry = mysql_query('SELECT * from MAODEOBRA WHERE id='.$index);
	    $data = array();
	    while($rows = mysql_fetch_array($qry))
	    {
	        $data[] = array(
	                    "id"            =>  $rows['id'],
	                    "nome"     =>  $rows['nome'],
	                    "email"     =>  $rows['email'],
						"telefone"     =>  $rows['telefone']
	                    );
	    }
	    print_r(json_encode($data));
	    return json_encode($data);  
	}
	
	function update_coment() {
	    $data = json_decode(file_get_contents("php://input")); 
	    $id = $data->id;
	    $nome = $data->nome;    
	    $email = $data->email;
		$telefone = $data->telefone;
	   	    
	    $qry = "UPDATE MAODEOBRA set nome='".$nome."' , email='".$email."' , telefone='".$telefone."' WHERE id=".$id;
	  
	    $qry_res = mysql_query($qry);
	    if ($qry_res) {
	        $arr = array('msg' => "Dados enviados com sucesso", 'error' => '');
	        $jsn = json_encode($arr);
	        	    } 
	    else {
	        $arr = array('msg' => "", 'error' => 'Ocorreu um erro ao enviar o os dados');
	        $jsn = json_encode($arr);
	        	    }
	}

?>