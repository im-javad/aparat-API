<?PhP 

return [
    'userId' => env('APARAT_USERID') ,
    'password' => env('APARAT_PASS'),

    'urls' => [
        'popular-videos' => 'https://www.aparat.com/etc/api/mostviewedvideos',
        'login' => 'https://www.aparat.com/etc/api/login/luser/{userId}/lpass/{password}',
        'uploadForm' => 'https://www.aparat.com/etc/api/upload​form/luser/{userId}/ltoken/{token}',
        'deleteVideoLink' => 'https://www.aparat.com/etc/api/deletevideolink/videohash/{uid}/luser/{userId}/ltoken/{token}',
    ],
];
