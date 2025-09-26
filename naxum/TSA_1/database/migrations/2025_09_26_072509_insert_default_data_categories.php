<?php

declare(strict_types=1);

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    const DEFAULT_DATA = [
        [
            1, 'Destributor',
        ],
        [
            2, 'Customer',
        ],
    ];

    public function up()
    {
        try {
            collect(self::DEFAULT_DATA)->each(function ($item) {
                [$id, $name] = $item;

                Category::create([
                    'id' => $id,
                    'name' => $name,
                ]);
            });

        } catch (Exception $error) {
            dd($error->getMessage());
        }
    }

    public function down()
    {
        collect(self::DEFAULT_DATA)->each(function ($item) {
            [$id] = $item;
            try {

                Category::findOrFail($id)->delete();

            } catch (Exception $error) {
                dd($error->getMessage());
            }
        });

    }
};
