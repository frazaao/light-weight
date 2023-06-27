<?php

namespace App\Imports;

use App\Models\Product;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Product::create([
                Product::NAME => $row[0],
                Product::CALORIES => $row[1],
                Product::PROTEINS => $row[2],
                Product::CARBS => $row[3],
                Product::LIPIDS => $row[4],
            ]);
        }
    }
}