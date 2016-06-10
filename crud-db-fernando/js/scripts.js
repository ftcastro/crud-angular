// Empty JS for your own code to be here
var categoriaApp = angular.module('categoriaApp',
  ['categoria-componentes']);

categoriaApp.controller('CategoriaCtrl',
  function ($scope) {
    $scope.nome = 'Fernando';
  });