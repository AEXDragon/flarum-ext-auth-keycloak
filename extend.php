<?php

use Hystar\Auth\Keycloak\KeycloakAuthController;
use Hystar\Auth\Keycloak\Listener;
use Illuminate\Events\Dispatcher;
use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    (new Extend\Routes('forum'))
        ->get('/auth/keycloak', 'auth.keycloak.get', KeycloakAuthController::class),

    (new Extend\Event())
        ->subscribe(Listener\AddLogoutRedirect::class),

    (new Extend\Settings)
      ->serializeToForum('hystar-auth-keycloak.delegate_avatars', 'hystar-auth-keycloak.delegate_avatars', 'boolVal', false),

    new Extend\Locales(__DIR__.'/locale'),
];
