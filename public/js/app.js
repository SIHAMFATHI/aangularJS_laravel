var app = angular.module('crmApp', []);

// STEP 1: App load ஆகும்போது token இருந்தா attach பண்ண
app.run(function($http) {
    var token = localStorage.getItem('token');
    if (token) {
        $http.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    }
});

app.controller('AuthController', function($scope, $http, $window) {
    $scope.loginData = {};
    $scope.registerData = {};

    $scope.login = function() {
        $http.post('http://localhost:8000/api/login', $scope.loginData)
            .then(function(response) {
                $window.localStorage.setItem('token', response.data.token);

                // STEP 2: login ஆன பிறகு token attach பண்ண
                $http.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.token;

                window.location.href = 'dashboard.html';
            })
            .catch(function(error) {
                alert(error.data.message);
            });
    };

    $scope.register = function() {
        if ($scope.registerData.password !== $scope.registerData.password_confirmation) {
            alert('Passwords do not match');
            return;
        }

        $http.post('http://localhost:8000/api/register', $scope.registerData)
            .then(function(response) {
                alert('Registration Successful! Please Login.');
                window.location.href = 'login.html';
            })
            .catch(function(error) {
                alert(error.data.message || 'Registration failed');
            });
    };
});
