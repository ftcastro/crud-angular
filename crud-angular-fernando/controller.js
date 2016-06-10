var comentApp = angular.module('comentApp', []);    
comentApp.controller('ComentList', function ($scope,$http) {
    $scope.coments    =  [];
    $scope.add_cmt = true;
    $scope.update_cmt = false;
    
    $scope.coments = [
                        {
                            'nome': 'Anderson',
                            'email': 'anderson@none.com',
							'telefone': '3933-3313'
                        },
                        {
                            'nome': 'Bruna',
                            'email': 'bruna@none.com',
							'telefone': '3933-3313'
                        },
                        {
                            'nome': 'Carlos',
                            'email': 'carlos@none.com',
							'telefone': '3933-3313'
                        }
                    ];

    
            
    $scope.remove = function (index) {
        $scope.coments.splice(index,1);
    }

    $scope.get_coment = function() {
        $http.get("db.php?action=get_coment").success(function(data)
        {
            $scope.coments = data;
            //console.log(data);
        });
    }


    $scope.coment_submit = function() {
        $http.post('db.php?action=add_coment', 
            {
                'nome'         : $scope.nome, 
                'email'        : $scope.email,
				'telefone'     : $scope.telefone
            }
        )
        .success(function (data, status, headers, config) {
          $scope.get_coment();
          $scope.nome='';
          $scope.email='';
		  $scope.telefone='';
          $scope.add_coment.$setPristine();
        })
        .error(function(data, status, headers, config){
           
        });
    }


    $scope.coment_delete = function(index) {  
     
      $http.post('db.php?action=delete_coment', 
            {
                'coment_index'     : index
            }
        )      
        .success(function (data, status, headers, config) {    
             $scope.get_coment();
             alert("Dados excluídos com sucesso.");
        })

        .error(function(data, status, headers, config){
           
        });
    }


    $scope.coment_edit = function(index) {  
      $scope.update_cmt = true;
      $scope.add_cmt = false;
      $http.post('db.php?action=edit_coment', 
            {
                'coment_index'     : index
            }
        )      
        .success(function (data, status, headers, config) {    
            $scope.id          =   data[0]["id"];
            $scope.nome        =   data[0]["nome"];
            $scope.email       =   data[0]["email"];
			$scope.telefone    =   data[0]["telefone"];
        })

        .error(function(data, status, headers, config){
            
        });
        
    }


    $scope.update_coment = function() {

        $http.post('db.php?action=update_coment', 
                    {
                        'id'           : $scope.id,
                        'nome'         : $scope.nome, 
                        'email'        : $scope.email,
						'telefone'     : $scope.telefone
                    }
                  )
                .success(function (data, status, headers, config) {
                  $scope.get_coment();
                  $scope.add_cmt = true;
                  $scope.update_cmt = false;
                  $scope.nome='';
                  $scope.email='';
				  $scope.telefone='';
                  $scope.add_coment.$setPristine();
                  
                })
                .error(function(data, status, headers, config){
                   
                });
    }
});
