<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users created!');
        $this->call(ArticlesTableSeeder::class);
        $this->command->info('Articles created!');
        $this->call(CommentTableSeeder::class);
        $this->command->info('Comments created!');
    }
}
