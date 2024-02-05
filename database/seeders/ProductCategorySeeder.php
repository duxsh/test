<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vegetableCategories = array(
            "Engine Components" => array("Piston", "Crankshaft", "Camshaft", "Timing Belt", "Oil Pump"),
            "Brake System" => array("Brake Pads", "Brake Rotors", "Brake Calipers", "Brake Lines", "Master Cylinder"),
            "Suspension Parts" => array("Struts", "Shocks", "Control Arms", "Sway Bar Links", "Bushings"),
            "Exhaust System" => array("Muffler", "Catalytic Converter", "Exhaust Pipes", "Oxygen Sensor"),
            "Electrical Components" => array("Alternator", "Starter Motor", "Battery", "Ignition Coil", "Spark Plugs"),
            "Transmission Parts" => array("Transmission Fluid", "Clutch Kit", "Transmission Filter", "Torque Converter"),
            "Air Conditioning" => array("A/C Compressor", "A/C Condenser", "A/C Evaporator", "A/C Blower Motor"),
            "Filters" => array("Oil Filter", "Air Filter", "Fuel Filter", "Cabin Air Filter"),
            "Belts and Chains" => array("Serpentine Belt", "Timing Belt", "Drive Belt", "Timing Chain"),
            "Fluids and Lubricants" => array("Engine Oil", "Transmission Fluid", "Brake Fluid", "Coolant")
        );

        foreach ($vegetableCategories as $categoryName => $vegetables) {
            $category = \App\Models\ProductCategory::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);

            foreach ($vegetables as $vegetableName) {
                \App\Models\ProductCategory::create([
                    'name' => $vegetableName,
                    'slug' => \Illuminate\Support\Str::slug($vegetableName),
                    'parent_id' => $category->id,
                ]);
            }
        }

    }
}