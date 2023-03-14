<?PhP 

return [
    'userId' => env('APARAT_USERID') ,
    'password' => env('APARAT_PASS'),

    'urls' => [
        'popular-videos' => 'https://www.aparat.com/etc/api/mostviewedvideos',
        'login' => 'https://www.aparat.com/etc/api/login/luser/{userId}/lpass/{password}'
    ]
];
