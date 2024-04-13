<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RaffleEntry extends Model
{
    use HasFactory;

    protected $fillable = ["id"];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $latestEntry = DB::table('raffle_entries');

            if ($latestEntry->exists() && Schema::hasColumn('raffle_entries', 'new_identifier')) {
                $id = $latestEntry->latest('id')->first()->id;

                $letters = '';
                $alphabet = range('A', 'Z');
                $numLetters = count($alphabet);
                while ($id >= $numLetters) {
                    $letters = $alphabet[$id % $numLetters] . $letters;
                    $id = floor($id / $numLetters) - 1;
                }
                    $letters = $alphabet[$id] . $letters;

                $numbers = str_pad((string)($id % $numLetters), 3, '0', STR_PAD_LEFT);

                $model->new_identifier = $letters . $numbers;
            }
        });
    }
}
