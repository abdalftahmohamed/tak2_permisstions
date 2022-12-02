<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Sections;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'  => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456789')
        ];
        User::create($user);

        $admin = [
            ['name'  => 'Admin','email' => 'admin@admin.com','password' =>bcrypt('123456789')],
            ['name'  => 'Editor','email' => 'editor@editor.com','password' =>bcrypt('123456789')],
            ['name'  => 'Author','email' => 'author@author.com','password' =>bcrypt('123456789')],
        ];
        Admin::insert($admin);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);

        Permission::insert([
            ['name'=>'Add Post','slug'=>'add-post'],
            ['name'=>'Delete Post','slug'=>'delete-post'],
            ['name'=>'Create Post','slug'=>'create-post'],

        ]);

        // Assign Role
        Admin::whereId(1)->first()->roles()->attach([1]);
        Admin::whereId(2)->first()->roles()->attach([2]);
        Admin::whereId(3)->first()->roles()->attach([3]);

        // Role has Permission
        Role::whereId(1)->first()->permissions()->attach([1,2,3]);
        Role::whereId(2)->first()->permissions()->attach([1]);
        Role::whereId(3)->first()->permissions()->attach([2]);

    }
}
