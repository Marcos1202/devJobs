<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Juan',
            'email' => 'juan@correo.com',
            'email_verified_at'=>Carbon::now(),
            'password'=> Hash::make('123123123'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);

        DB::table('users')->insert([
            'name'=>'Marcos',
            'email' => 'admin@admin.org',
            'email_verified_at'=>Carbon::now(),
            'password'=> Hash::make('123123123'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
    }
}
