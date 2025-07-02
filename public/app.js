app.config(function($routeProvider) {
    $routeProvider

    // Admin Page - Only admin role
    .when('/admin', {
        templateUrl: 'admin.html',
        controller: 'AdminCtrl',
        resolve: {
            auth: function($location) {
                var role = localStorage.getItem('userRole');
                if (role !== 'admin') {
                    $location.path('/unauthorized'); // 🔒 Access Block
                }
            }
        }
    })

    // Manager Page - Only manager and admin
    .when('/manager', {
        templateUrl: 'manager.html',
        controller: 'ManagerCtrl',
        resolve: {
            auth: function($location) {
                var role = localStorage.getItem('userRole');
                if (role !== 'manager' && role !== 'admin') {
                    $location.path('/unauthorized');
                }
            }
        }
    })

    // Agent Page - Only agent
    .when('/agent', {
        templateUrl: 'agent.html',
        controller: 'AgentCtrl',
        resolve: {
            auth: function($location) {
                var role = localStorage.getItem('userRole');
                if (role !== 'agent') {
                    $location.path('/unauthorized');
                }
            }
        }
    })

    // Unauthorized Page
    .when('/unauthorized', {
          templateUrl: 'app/views/unauthorized.html'
    });
});
