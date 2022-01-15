<?php

return [
    // Current package
    'version'         => '1.0.14',

    // If disable users Can't register in the website
    'register_enable' => true,

    // The Boot Token is used in the pre api autentication
    // So we can prevent unwanted aplication ping your url
    'boot_token'      => 'skeleton_default_token',

    // In here for example you have have a admin guard login or a diferent user guard
    // default is web
    'user_guard' => 'web',

    // Send the email of user verification once the user try to login
    'send_verification' => true,

    // Using innersia Js
    'inertiajs_enable' => true,
];
