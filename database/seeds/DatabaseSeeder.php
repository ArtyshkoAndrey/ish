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
            'name' => '#ИнженернаяШкола',
            'title' => 'Инженерная школа МАОУ "КУГ № 1 - Универс"',
            'subtitle' => 'Инженерное образование - приоритет - качество - перспектива.'
        ]);
    }
}
