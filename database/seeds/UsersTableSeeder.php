<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table((new User)->getTable())->delete();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'nurses']);
        Role::create(['name' => 'professionals']);

        factory(User::class)->create([
            'email' => 'admin@admin.com',
        ])->assignRole('admin');

        Model::reguard();
    }
}
