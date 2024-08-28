<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advantage::create([
            'title' => 'Quality Servicing',
            'description' => 'Diam dolor diam ipsum sit amet diam et eos erat ipsum',
            'icon' => 'fa fa-certificate fa-3x text-primary flex-shrink-0'
        ]);
        Advantage::create([
            'title' => 'Expert Workers',
            'description' => 'Diam dolor diam ipsum sit amet diam et eos erat ipsum',
            'icon' => 'fa fa-users-cog fa-3x text-primary flex-shrink-0'
        ]);
        Advantage::create([
            'title' => 'Modern Equipment',
            'description' => 'Diam dolor diam ipsum sit amet diam et eos erat ipsum',
            'icon' => 'fa fa-tools fa-3x text-primary flex-shrink-0'
        ]);
    }
}
