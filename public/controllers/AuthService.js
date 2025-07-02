// LoginController.js அல்லது AuthService.js

$http.post('http://localhost:8000/api/login', userData).then(function(response) {
    localStorage.setItem('authToken', response.data.token);
    localStorage.setItem('userRole', response.data.user.role); // ✅ role save
    $location.path('/dashboard');
});
$scope.logout = function() {
    localStorage.removeItem('authToken');
    localStorage.removeItem('userRole'); // ✅ Clear role
    $location.path('/login');
};
