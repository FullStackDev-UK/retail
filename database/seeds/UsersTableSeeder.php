<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pu = new User([
            'name' => 'Phone User',
            'email' => 'phone@device.test',
            'password' => bcrypt('phonepw123'),
            'role' => 'admin'
        ]);
        $pu->save();

        factory(User::class, 10)->create();
    }
}
