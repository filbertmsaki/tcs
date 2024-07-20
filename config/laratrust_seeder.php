<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => false,

    'roles_structure' => [
        'superadministrator' => [
            'user-management' => 'r',
            'role' => 'c,r,u,d',
            'permission' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'currency' => 'c,r,u,d',
            'tax' => 'c,r,u,d',
            'product' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'ussd-request' => 'c,r,u,d',
            'covernote-verification' => 'c,r,u,d',
            'quotations' => 'c,r,u,d',
            'claim' => 'c,r,u,d',
            'claim-notification' => 'c,r,u,d',
            'claim-intimation' => 'c,r,u,d',
            'claim-assessment' => 'c,r,u,d',
            'claim-discharge-voucher' => 'c,r,u,d',
            'claim-payment' => 'c,r,u,d',
            'claim-rejection' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'business' => [
            'profile' => 'r,u',
        ],
        'customer_care' => [
            'profile' => 'r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
