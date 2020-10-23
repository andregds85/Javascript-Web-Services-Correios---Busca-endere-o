
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Language" content="pt-br">

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
      <!-- Busca CEP -->
      <!-- Adicionando JQuery -->
 
      
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>CEP</title>
      
   </head>
  <body>
 
<!-- Topo da Página -->      
      
      <p></p>
      
      <!-- Fluid Jumbotron --> 
      
   <div class="container-fluid">      
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">WEB Service VIA CEP</h1>
    <p class="lead">Busca endereço com o cep</p>
  </div>
  </div>
   </div>    
      
     
   <!-- Inserir Usuário -->      
      
 <div class="container-fluid">    

  <form class="was-validated"  name="regform" method="get" action="#">
 
  <!-- nome e sobrenome -->    
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cep">CEP</label>
      <input type="text" name="cep" data-minlength="10"  class="form-control" id="cep" placeholder="CEP" required minlength="3">
      <div class="invalid-feedback">Favor preencher o CEP</div>
            
    </div>
      
    <div class="form-group col-md-6">
      <label for="rua">Rua</label>
      <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua" required minlength="3">
      <div class="invalid-feedback">Favor preencher a Rua</div>  
              
    </div>
    </div>
      
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="bairro">Bairro</label>
      <input type="text" name="bairro"  class="form-control" id="bairro" placeholder="bairro" required minlength="6">
      <div class="invalid-feedback">Favor preencher o Bairro</div>
    
        
    </div>
      
    
      <!-- nome e sobrenome -->    
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="estado">Estado</label>
      <input type="text" name="uf" class="form-control" id="uf" placeholder="estado" required minlength="6">
      <div class="invalid-feedback">Favor preencher o estado</div>
    
        
    </div>
      
    <div class="form-group col-md-6">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="cidade" required minlength="6">
      <div class="invalid-feedback">Favor preencher a cidade</div>  
              
    </div>
      
      </div>
      
    </div>

      </form>
      
      
      
      
      
      
      
      
      
      
      
    
       
     
      </div>     

      
     
      
      

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
 
   
    
  </body>
</html>