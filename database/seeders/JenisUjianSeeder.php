<?php

namespace Database\Seeders;

use App\Models\JenisUjian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['nama' => 'TWK'],
            ['nama' => 'TIU'],
            ['nama' => 'TKP'],
        ];

        foreach ($items as $item) {
            JenisUjian::create($item);
        }
    }
}
