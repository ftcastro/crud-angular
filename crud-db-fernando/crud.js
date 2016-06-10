function ajax() {
};
ajax.prototype.iniciar = function() {
 
        try{
                this.xmlhttp = new XMLHttpRequest();
        }catch(ee){
                try{
                        this.xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }catch(e){
                        try{
                                this.xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }catch(E){
                                this.xmlhttp = false;
                        }
                }
        }
        return true;
}
 
ajax.prototype.ocupado = function() {
        estadoAtual = this.xmlhttp.readyState;
        return (estadoAtual && (estadoAtual < 4));
}
 
ajax.prototype.processa = function() {
        if (this.xmlhttp.readyState == 4 && this.xmlhttp.status == 200) {
                return true;
        }
}
 
ajax.prototype.enviar = function(url, metodo, modo) {
        if (!this.xmlhttp) {
                this.iniciar();
        }
        if (!this.ocupado()) {
                if(metodo == "GET") {
                        this.xmlhttp.open("GET", url, modo);
                        this.xmlhttp.send(null);
                } else {                
                        this.xmlhttp.open("POST", url, modo);
                        this.xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
                        this.xmlhttp.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
                        this.xmlhttp.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
                        this.xmlhttp.setRequestHeader("Pragma", "no-cache");
                        this.xmlhttp.send(url);
                }       
 
                if (this.processa) {
                        return unescape(this.xmlhttp.responseText.replace(/\+/g," "));
                }
        }
        return false;
}
 
function editar(id) {
        elem2 = document.getElementById('campo2'+id); //Nome
        elem3 = document.getElementById('campo3'+id); //Email
        elem4 = document.getElementById('campo4'+id); //Telefone
        bot = document.getElementById("enviar"+id); //botao de enviar
        elem2.innerHTML = "<input type=\"text\" value=\"" + elem2.innerHTML + "\" id='"+id+"n_c' />"; 	//inserir o primeiro input
        elem3.innerHTML = "<input type=\"text\" value=\"" + elem3.innerHTML + "\" id='"+id+"d_c' />";   //inserir o segundo input
        elem4.innerHTML = "<input type=\"text\" value=\"" + elem4.innerHTML + "\" id='"+id+"c_c' />"; 	//inserir o terceiro input
        bot.innerHTML = '<button href="javascript:" onclick="editado(\''+ id +'\')">Enviar</button>';	//inserir o botão de enviar a alteração
}
 
 
function editado(id) {
        envia = document.getElementById('enviar'+id); //span onde vai aparecer o botaozinho para enviar a alteracao
        campo2 = document.getElementById(id+'n_c').value; //segundo campo
        campo3 = document.getElementById(id+'d_c').value; //terceiro campo
        campo4 = document.getElementById(id+'c_c').value; //quarto campo
        ecampo2 = escape(campo2); //para nao haver problemas de acentos
        ecampo3 = escape(campo3); //para nao haver problemas de acentos
        ecampo4 = escape(campo4); //para nao haver problemas de acentos
        document.getElementById('campo2'+id).innerHTML = campo2; //alterar o registro na pagina
        document.getElementById('campo3'+id).innerHTML = campo3; //alterar o registro na pagina
        document.getElementById('campo4'+id).innerHTML = campo4; //alterar o registro na pagina
        envia.innerHTML = '<button href="javascript:" onclick="editar(\''+id+'\')">Alterar</button>'; //depois de enviar, mostrar de novo o botão de editar
        xmlhttp = new ajax();
        xmlhttp.enviar('connection.php?acao=edit&id='+ id + '&nome='+ ecampo2 + '&email=' + ecampo3, + '&telefone=' + ecampo4, "POST", false); //endereco para enviar a alteração
}
 
 
function addrow(id) {
        tb = document.getElementById('tabela'); 		//id da tabela
        campo2 = document.getElementById('nome'); 		//primeiro campo
        campo3 = document.getElementById('email'); 		//segundo campo
		campo4 = document.getElementById('telefone');	//terceiro campo
         
        var x=tb.insertRow(-1); //inserir a linha
        var y=x.insertCell(0); //inserir coluna 1
        var z=x.insertCell(1); //inserir coluna 2
        var w=x.insertCell(2); //inserir coluna 3
        var b=x.insertCell(3); //inserir coluna 4
		var n=x.insertCell(4); //inserir coluna 5
         
        y.innerHTML=id; //na primeira coluna, inserir o id
        z.innerHTML="<span id=\"campo1"+id+"\">"+campo2.value+"</span>"; //na segunda coluna, inserir o nome
        w.innerHTML="<span id=\"campo3"+id+"\">"+campo3.value+"</span>"; //na terceira coluna, inserir o email
		b.innerHTML="<span id=\"campo3"+id+"\">"+campo4.value+"</span>"; //na quarta coluna, inserir o telefone
        n.innerHTML='<span id="enviar'+id+'"><button href="javascript:editar(\''+id+'\')">Alterar</button></span><button a href="java script:;" onclick="apagar(\''+id+'\', this.parentNode.parentNode.rowIndex);">Remover</button>'; //na quinta coluna, inserir as opções
}
 
function add() {
        campo2 = document.getElementById('nome').value; //recupera primeiro campo
        ecampo2 = escape(campo2); //"escapa" primeiro campo
        campo3 = document.getElementById('email').value; //recupera segundo campo
        ecampo3 = escape(campo2);//"escapa" segundo campo
        campo4 = document.getElementById('telefone').value; //recupera terceiro campo
        ecampo4 = escape(campo3);//"escapa" terceiro campo
        if(ecampo2==""){
                $('#nome').css("border-color",'red');
                $('#erroNome').text("Por favor digite o seu nome").css("color","red").slideDown();
        }else{
                $('#nome').css("border-color",'');
                $('#erroNome').text("").css("color","").hide();  
        }
        if(ecampo3==""){
                $('#coment').css("border-color",'red');
                $('#erroEmail').text("Por favor digite seu endereço de e-mail").css("color","red").slideDown();
        }else{
                $('#coment').css("border-color",'');
                $('#erroEmail').text("").css("color","").hide();  
        }
		if(ecampo4==""){
                $('#telefone').css("border-color",'red');
                $('#erroTelefone').text("Por favor digite o seu telefone").css("color","red").slideDown();
        }else{
                $('#telefone').css("border-color",'');
                $('#erroTelefone').text("").css("color","").hide();  
        }
        if(ecampo2!=""&&ecampo3!=""){
                xmlhttp = new ajax();
                id = xmlhttp.enviar('connection.php?acao=add&nome='+ ecampo2 + '&telefone=' + ecampo3, + '&email=' + ecampo4, "POST", false); //Adicionando
                addrow(id); //adiciona a linha com os campos
                campo2.value = ""; //limpa o campo 2
                campo3.value = ""; //limpa o campo 3
                campo4.value = ""; //limpa o campo 4
        }
        
}
 
function apagar(id, rowIndex){
        console.log(id);
        if (confirm('Tem certeza que deseja excluir este registro?'))
        {
                document.getElementById("tabela").deleteRow(rowIndex); //id da tabela + excluir linha
                xmlhttp = new ajax();
                xmlhttp.enviar('connection.php?acao=del&id='+ id, "POST", false); //envia o comando para deletar
        }
}