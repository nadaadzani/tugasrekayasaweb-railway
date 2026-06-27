<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Projects::insert([[
            'title' => 'Sistem ERP',
            'description' => 'Sistem ERP (Enterprise Resource Planning) Perusahaan manufaktur',
            'teknologi' => 'PHP, Laravel, MySQL',
            'image' => 'erp.png',
            'status' => 'active'
        ], ['title' => 'Sistem HRIS',
            'description' => 'Sistem HRIS (Human Resource Information System) Perusahaan manufaktur',
            'teknologi' => 'PHP, Laravel, MySQL',
            'image' => 'hris.png',
            'status' => 'in_progress'
            ], ['title' => 'Sistem SCM',
            'description' => 'Sistem SCM (Supply Chain Management) Perusahaan manufaktur',
            'teknologi' => 'PHP, Laravel, MySQL',
            'image' => 'scm.png',
            'status' => 'in_progress'
        ], ['title' => 'Sistem WMS',
            'description' => 'Sistem WMS (Warehouse Management System) Perusahaan manufaktur',
            'teknologi' => 'PHP, Laravel, MySQL',
            'image' => 'wms.png',
            'status' => 'completed']]);
    }
}
