<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_labels = ["Italiano ", "Cinese", "Giapponese", "Messicano", "Greco"];

        foreach ($_labels as $_label) {
            $type = new Type();
            $type->name = $_label;
            $type->image = '';
            $type->save();
        }
    }
}