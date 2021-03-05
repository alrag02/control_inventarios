<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersWithPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $predefUser = User::create([
            'name' => 'Jaime',
            'last_name_p' => 'Perez',
            'last_name_m' => 'Gonzañes',
            'work_id' => 'wid02',
            'email' => 'NineBaboon@maildrop.cc',
            'password' => '$2y$10$LxP03/KKYdxxpTmn5gFi0et6Sk1D1OkF5T38BnfTw.enxuWeEe3Oi'
        ]);
        $predefUser->assignRole('consultor');

        $predefUser_2 = User::create([
            'name' => 'Oscar',
            'last_name_p' => 'Perez',
            'last_name_m' => 'Montelongo',
            'work_id' => 'wid03',
            'email' => 'osacar.montelongo@lagos.tecmm.edu.mx',
            'password' => '$2y$10$LxP03/KKYdxxpTmn5gFi0et6Sk1D1OkF5T38BnfTw.enxuWeEe3Oi'
        ]);
        $predefUser_2->assignRole('editor');

        $predefUser_3 = User::create([
            'name' => 'Alejandro',
            'last_name_p' => 'Gálvez',
            'last_name_m' => 'Tovar',
            'work_id' => 'wid01',
            'email' => 'agpf5@outlook.com',
            'password' => '$2y$10$LxP03/KKYdxxpTmn5gFi0et6Sk1D1OkF5T38BnfTw.enxuWeEe3Oi'
        ]);
        $predefUser_3->assignRole('admin');
    }
}
