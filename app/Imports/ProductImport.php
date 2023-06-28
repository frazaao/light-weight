<?php

namespace App\Imports;

use App\Models\Product;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key < 2) continue;

            $name = preg_replace(
                '/\d/',
                "",
                $row[0]
            );

            $name = trim($name);
            $name = str_replace(",", "", $name);

            Product::create([
                Product::NAME => $name,
                Product::CALORIES => $row[1],
                Product::PROTEINS => $row[2],
                Product::CARBS => $row[4],
                Product::LIPIDS => $row[3],
            ]);
        }
    }
}
