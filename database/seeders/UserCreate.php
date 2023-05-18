<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //подключаемся к базе User
        $user = new User();
        //заполянем таблицу данными
        $user->name = config('users.name');
        $user->email = config('users.mail');
        $user->password = Hash::make(config('admin-users.password'));
        //поле is_admin ставим вручную в статус 1, по умолчанию 0
        //сохраняем данные в таблицуу
        $user->save();
    }
}
