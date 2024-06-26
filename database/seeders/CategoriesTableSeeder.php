<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name"=> "Tecnico Universitario en Redes y Telecomunicaciones",
            "slug"=> Str::slug("Tecnico Universitario en Redes y Telecomunicaciones"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Quimica",
            "slug"=> Str::slug("Tecnico Universitario en Quimica"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Proyectos de Ingenieria",
            "slug"=> Str::slug("Tecnico Universitario en Proyectos de Ingenieria"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Mineria y Metalurgia",
            "slug"=> Str::slug("Tecnico Universitario en Mineria y Metalurgia"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Mecanica Automotriz",
            "slug"=> Str::slug("Tecnico Universitario en Mecanica Automotriz"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Energias Renovables",
            "slug"=> Str::slug("Tecnico Universitario en Energias Renovables"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Electricidad",
            "slug"=> Str::slug("Tecnico Universitario en Electricidad"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Construccion",
            "slug"=> Str::slug("Tecnico Universitario en Construccion"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Administracion de Empresas",
            "slug"=> Str::slug("Tecnico Universitario en Administracion de Empresas"),
        ]);
        Category::create([
            "name"=> "Tecnico Universitario en Informatica",
            "slug"=> Str::slug("Tecnico Universitario en Informatica"),
        ]);
        Category::create([
            "name"=> "Ingenieria en Prevencion de Riesgos",
            "slug"=> Str::slug("Ingenieria en Prevencion de Riesgos"),
        ]);
        Category::create([
            "name"=> "Ingenieria en Informatica",
            "slug"=> Str::slug("Ingenieria en Informatica"),
        ]);
        Category::create([
            "name"=> "Ingenieria en Biotecnologia",
            "slug"=> Str::slug("Ingenieria en Biotecnologia"),
        ]);
        Category::create([
            "name"=> "Ingenieria en Diseño y Fabricacion Industrial",
            "slug"=> Str::slug("Ingenieria en Diseño y Fabricacion Industrial"),
        ]);
        Category::create([
            "name"=> "Ingenieria en Mantenimiento Industrial",
            "slug"=> Str::slug("Ingenieria en Mantenimiento Industrial"),
        ]);
        //Category::factory()->count(10)->create();
    }
}
