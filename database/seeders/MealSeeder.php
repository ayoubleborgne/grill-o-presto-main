<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Meal;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::create([
            'image' => 'imageMeal/Côtes-levées super.jpg',
            'name' => "Côtes-levées caramelisés presto",
            'description' => "Nos côtes levées, grillées à point, nappées de sauce barbecue fumée secrète. Choix d'accompagnements disponible.",
            'price' => '16.00',
        ]);
        Meal::create([
            'image' => 'imageMeal/Riz frit.jpg',
            'name' => 'Riz frit',
            'description' => "Riz frit maison au poulet, débordant de légumes sautés dans une huile de sésame provenant directement d'Asie.",
            'price' => '14.00',
        ]);
        Meal::create([
            'image' => 'imageMeal/Soupe extrême.jpg',
            'name' => 'Soupe extrême',
            'description' => "Soupe délicieuse d'un mélange de courges et de légumes. Avec des ingrédients de provenance locale, on ajoute un peu de chili pour relever une note épicée.",
            'price' => '12.00',
        ]);
        Meal::create([
            'image' => 'imageMeal/Les bons wraps.jpg',
            'name' => "Wraps au poulet du chef",
            'description' => "Wrap santé rempli de délicieux ingrédients préparés localement. Un accompagnement de (petite) salade césar est inclus.",
            'price' => '14.50',
        ]);
        Meal::create([
            'image' => 'imageMeal/Ailes de poulet.jpg',
            'name' => 'Ailes de poulet',
            'description' => "Nos ailes de poulets caramélisés à la sauce chipotle fumée, un délice en bouche pour les plus audacieux.",
            'price' => '15.20',
        ]);
        Meal::create([
            'image' => 'imageMeal/dumplings.jpg',
            'name' => 'Dumplings',
            'description' => "Dumplings maisons au porc, fraichement préparés selon les règles de l'art. ",
            'price' => '14.30',
        ]);
        Meal::create([
            'image' => 'imageMeal/sashimi.jpg',
            'name' => 'Sashimi',
            'description' => "Sashimis frais, d'inspirations japonaise servis avec un brin de verdure.",
            'price' => '14.25',
        ]);
        Meal::create([
            'image' => 'imageMeal/poulet-general-tao.jpg',
            'name' => 'Général Tao',
            'description' => "Poulet général tao classique selon la recette familiale. Notre sauce, balance parfaite d'une note sucrée et épicée, accompagnés de quelques légumes du jour, sur un lit de riz.",
            'price' => '15.75',
        ]);
        Meal::create([
            'image' => 'imageMeal/Petit Poulet De Grain Végétal.jpg',
            'name' => 'Poulet portugais',
            'description' => "Poulet entier cuit sur la broche avec des épices portugaises.",
            'price' => '14.75',
        ]);
        Meal::create([
            'image' => 'imageMeal/Spaghetti.jpg',
            'name' => 'Spaghetti bolognaise',
            'description' => "Spaguetti bolognaise classique, digne d'un restaurant d'Italie, disponible près de chez vous.",
            'price' => '13.25',
        ]);
        Meal::create([
            'image' => 'imageMeal/Salade_greque.jpg',
            'name' => 'Salade greque',
            'description' => "Une salade à la grecque aux arômes de feta, tomates fraîches et basilic.",
            'price' => '14.00',
        ]);
        Meal::create([
            'image' => 'imageMeal/quiche.jpg',
            'name' => 'Quiche',
            'description' => "Quiche classique d'inspirations françaises. Rien de moins qu'un délice signé Grill-O-Presto.",
            'price' => '12.00',
        ]);
        Meal::create([
            'image' => 'imageMeal/pate-chinois.jpg',
            'name' => 'Pâté chinois',
            'description' => "Paté chinois traditionnel ; steak, blé d'inde, patates. Simple, même si Thérèse ne semble pas avoir compris le principe après 4 saisons.",
            'price' => '14.25',
        ]);
    }
}
