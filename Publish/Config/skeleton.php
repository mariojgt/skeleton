<?php

return [
    'version'         => '1.0.11',   // Skeleton version
    'register_enable' => false,     // if true users can register
    // Needed for the laravel sanctum in this way if you building a app you can make sure
    // So no one keeps pingin your aplication without knowing you key
    // More information checkout https://github.com/mariojgt/skeleton-connect-laravel
    'boot_token'           => 'skeleton_default_token',
];
