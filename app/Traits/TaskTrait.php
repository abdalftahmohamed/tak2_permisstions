<?php

namespace App\Traits;

trait TaskTrait
{
    public static function FillAdminPermissionsFromRouteNames()
    {
        $routes = Route::getRoutes();
        $permissions = [];
        foreach ($routes as $route) { // thanks zaki 🌹
            $routeName = $route->getName();
            $routePartials = explode(':', $routeName);
            if ($routeName && $routePartials[0] == 'admin' && !in_array($routeName, config('auth.excluded_routes'))) {
                if (!isset($routePartials[1])) continue;
                $routeDef = explode('.', $routePartials[1]);
                $page = $routeDef[0];
                $action = isset($routeDef[1]) ? $routeDef[1] : '';
                if (!isset($routeDef[1]))
                    $page = 'Admin ' . ucfirst($page);
                switch (true) {
                    case in_array($action, ['index', 'show']):
                        $permissions[$page . '_view'] = ucfirst($page) . ' view';
                        break;
                    case in_array($action, ['create', 'store']):
                        $permissions[$page . '_create'] = ucfirst($page) . ' create';
                        break;

                    case in_array($action, ['edit', 'update']):
                        $permissions[$page . '_edit'] = ucfirst($page) . ' edit';
                        break;

                    case in_array($action, ['destroy']):
                        $permissions[$page . '_delete'] = ucfirst($page) . ' delete';
                        break;
                    default:
                        $permissions[strtolower(trim($page . '_' . $action))] = strlen($action) ? ucfirst($page) . ' ' . $action : ucfirst($page);
                        break;
                }
            }
        }

        $perms = [];
        foreach ($permissions as $slug => $name) {
            $perm = Permission::firstOrCreate(['name' => $name, 'slug' => Str::slug($slug, '_')]);
            $perms[] = $perm;
        }
        return $perms;
    }
}
