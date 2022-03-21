<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'usu_usuario'=>'admin',
            'password'=>bcrypt('12345678'),
            'usu_estado'=>'1',
            'usu_cedula'=>'123456789',
            'usu_apellido'=>'Acosta',
            'usu_nombre'=>'Stalin',
            'usu_correo'=>'admin@vn.com',
            'usu_rol'=>'1',
            'usu_tipo'=>'1',
            'created_at'=>date('Y-m-d H:i'),

    ]);        
    }
}
