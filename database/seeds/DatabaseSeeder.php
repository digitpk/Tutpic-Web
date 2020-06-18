<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $roles = ['Admin', 'Teacher', 'Student'];
        foreach ($roles as $role) {
            \App\Models\Role::create([
                'title' => $role
            ]);
        }

        $subjects = ['English', 'Math', 'Physics', 'Computer'];
        foreach ($subjects as $subject) {
            \App\Models\Subject::create([
                'title' => $subject
            ]);
        }

        $levels = ['Primary', 'Elementary', 'Secondary', 'High'];
        foreach ($levels as $level) {
            \App\Models\Level::create([
                'title' => $level
            ]);
        }

        // $this->call(UsersTableSeeder::class);
    }
}
