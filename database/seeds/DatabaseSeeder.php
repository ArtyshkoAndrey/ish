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

        DB::table('headers')->insert([
            'name' => 'input1',
            'content' => 'Инженерная школа МАОУ "КУГ № 1 - Универс"',
        ]);
        DB::table('headers')->insert([
            'name' => 'input2',
            'content' => '#ИнженернаяШкола',
        ]);
        DB::table('headers')->insert([
            'name' => 'input3',
            'content' => 'Инженерное образование - приоритет - качество - перспектива.',
        ]);
    }
}
