<?php

namespace Database\Seeders;

use App\Models\Situacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Situacao::factory()
            ->count(15)
            ->create();
    }
}
