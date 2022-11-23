<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'all_categories' => 'Show All Categories',
            'add_category' => 'Add New Category',
            'edit_category' => 'Edit Category',
            'delete_category' => 'Delete category',
            'all_products' => 'Show All Products',
            'add_product' => 'Add New Product',
            'edit_product' => 'Edit Product',
            'delete_product' => 'Delete Product',
        ];

        Permission::truncate();
        foreach($permissions as $code => $name) {
            Permission::create([
                'code' => $code,
                'name' => $name
            ]);
        }
    }
}
