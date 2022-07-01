<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user   =   [
                        [
                            'fullname'      =>  'Resepsionis 1',
                            'username'      =>  'admin123',
                            'password'      =>  Hash::make('admin123'),
                            'status'        =>  true,
                            'created_at'    =>  Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s'),
                        ],
                        [
                            'fullname'      =>  'Resepsionis 2',
                            'username'      =>  'admin456',
                            'password'      =>  Hash::make('admin456'),
                            'status'        =>  true,
                            'created_at'    =>  Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s'),
                        ],
                    ];

        foreach ($user as $usr) {
            $arr    =   User::firstOrCreate($usr);
        }
    }
}
