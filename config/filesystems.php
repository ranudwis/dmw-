<?php

return [
    'default' => 'local',
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'googledrive' => [
            'driver' => 'googledrive',
            'clientId' => env('GOOGLE_CLIENT_ID'),
            'clientSecret' => env('GOOGLE_CLIENT_SECRET'),
            'refreshToken' => env('GOOGLE_DMW_REFRESH_TOKEN'),
            'folderId' => env('GOOGLE_DMW_FOLDER_ID'),
        ],
    ]
];
