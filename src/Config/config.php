<?php

/*-------------------------------------------
Config file for B2 Backblaze Cloud Storage
---------------------------------------------
*/

return [

    'disks' => [
        'b2' => [
            'driver' => 'b2',
            'bucket' => env('B2_BUCKET', null),
            'id'     => env('B2_ACCOUNT_ID', 'your-account-id'),
            'app'    => env('B2_APPLICATION_KEY', 'your-application-key'),
        ],
    ],

];
