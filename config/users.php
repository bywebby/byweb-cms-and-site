<?php

//field is_admin correct in DB 1 - admin, 0 - off admin
//Чтобы стать админом нужно в базее  данных поставить 1 в поле is_admin
return [
    'name' =>  env('BYWEB_ADMIN_USER'),
    'mail' => env('BYWEB_ADMIN_MAIL'),
    'password' => env('BYWEB_ADMIN_PASSWORD'),
];
