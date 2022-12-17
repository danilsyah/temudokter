<?php

namespace Database\Seeders;

use App\Models\MasterData\TypeUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // create data here
         $type_user = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Dokter',
            ],
            [
                'name' => 'Pasien',
            ],
        ];

        // this array $type_user will be insert to table type_user
        TypeUser::insert($type_user);
    }
}
