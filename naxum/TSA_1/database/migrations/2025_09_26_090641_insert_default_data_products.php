<?php

declare(strict_types=1);

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration
{
    const DEFAULT_DATA = [
        [2, 'PR2', 'BAG 2', 0],
        [53, 'PR53', 'BAG 53', 47.5],
        [54, 'PR54', 'BAG 54', 45],
        [57, 'PR57', 'BAG 57', 75],
        [59, 'PR59', 'BAG 59', 32.5],
        [62, 'PR62', 'BAG 62', 130],
        [63, 'PR63', 'BAG 63', 925],
        [64, 'PR64', 'BAG 64', 925],
        [65, 'PR65', 'BAG 65', 575],
        [66, 'PR66', 'BAG 66', 295],
        [67, 'PR67', 'BAG 67', 47.5],
        [68, 'PR68', 'BAG 68', 32.5],
        [69, 'PR69', 'BAG 69', 50],
        [70, 'PR70', 'BAG 70', 1],
        [71, 'PR71', 'BAG 71', 31.25],
        [72, 'PR72', 'BAG 72', 1],
        [73, 'PR73', 'BAG 73', 1],
        [74, 'PR74', 'BAG 74', 1],
        [75, 'PR75', 'BAG 75', 1],
        [76, 'PR76', 'BAG 76', 1],
        [77, 'PR77', 'BAG 77', 1],
        [78, 'PR78', 'BAG 78', 30],
        [79, 'PR79', 'BAG 79', 50],
        [80, 'PR80', 'BAG 80', 175],
        [81, 'PR81', 'BAG 81', 175],
        [82, 'PR82', 'BAG 82', 295],
        [83, 'PR83', 'BAG 83', 295],
        [84, 'PR84', 'BAG 84', 295],
        [85, 'PR85', 'BAG 85', 575],
        [86, 'PR86', 'BAG 86', 575],
        [87, 'PR87', 'BAG 87', 575],
        [88, 'PR88', 'BAG 88', 387.5],
        [89, 'PR89', 'BAG 89', 387.5],
        [90, 'PR90', 'BAG 90', 387.5],
        [91, 'PR91', 'BAG 91', 125],
        [92, 'PR92', 'BAG 92', 1],
        [93, 'PR93', 'BAG 93', 125],
        [94, 'PR94', 'BAG 94', 167.5],
        [95, 'PR95', 'BAG 95', 167.5],
        [96, 'PR96', 'BAG 96', 61.25],
        [97, 'PR97', 'BAG 97', 575],
        [98, 'PR98', 'BAG 98', 1],
        [99, 'PR99', 'BAG 99', 575],
        [100, 'PR100', 'BAG 100', 187.5],
        [101, 'PR101', 'BAG 101', 205],
        [102, 'PR102', 'BAG 102', 295],
        [103, 'PR103', 'BAG 103', 575],
        [106, 'PR106', 'BAG 106', 36],
        [107, 'PR107', 'BAG 107', 38],
        [108, 'PR108', 'BAG 108', 38],
        [109, 'PR109', 'BAG 109', 26],
        [110, 'PR110', 'BAG 110', 60],
        [111, 'PR111', 'BAG 111', 26],
        [112, 'PR112', 'BAG 112', 40],
        [113, 'PR113', 'BAG 113', 25],
        [114, 'PR114', 'BAG 114', 24],
        [115, 'PR115', 'BAG 115', 40],
        [116, 'PR116', 'BAG 116', 104],
        [117, 'PR117', 'BAG 117', 310],
        [118, 'PR118', 'BAG 118', 310],
        [119, 'PR119', 'BAG 119', 310],
        [120, 'PR120', 'BAG 120', 100],
        [121, 'PR121', 'BAG 121', 100],
        [122, 'PR122', 'BAG 122', 134],
        [123, 'PR123', 'BAG 123', 134],
        [124, 'PR124', 'BAG 124', 49],
        [125, 'PR125', 'BAG 125', 150],
        [126, 'PR126', 'BAG 126', 1],
        [128, 'PR128', 'BAG 128', 925],
        [129, 'PR129', 'BAG 129', 925],
        [134, 'PR134', 'BAG 134', 40],
        [135, 'PR135', 'BAG 135', 9999],
        [136, 'PR136', 'BAG 136', 50],
        [137, 'PR137', 'BAG 137', 84],
        [138, 'PR138', 'BAG 138', 105],
        [139, 'PR139', 'BAG 139', 175],
        [140, 'PR140', 'BAG 140', 227.5],
        [141, 'PR141', 'BAG 141', 30],
        [142, 'PR142', 'BAG 142', 37.5],
        [143, 'PR143', 'BAG 143', 50],
    ];

    public function up()
    {
        collect(self::DEFAULT_DATA)->each(function ($item) {
            try {
                [$id, $sku, $name, $price] = $item;

                Product::create([
                    'id' => $id,
                    'sku' => $sku,
                    'name' => $name,
                    'price' => $price,
                ]);

            } catch (Exception $error) {
                dd($error, $item);
            }
        });
    }

    public function down()
    {
        collect(self::DEFAULT_DATA)->each(function ($item) {
            try {
                [$id] = $item;

                Product::findOrFail($id)->delete();

            } catch (Exception $error) {
                dd($error, $item);
            }
        });
    }
};
