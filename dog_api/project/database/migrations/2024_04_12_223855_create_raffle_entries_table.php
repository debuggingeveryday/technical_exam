<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RaffleEntry;

return new class extends Migration
{
    private const DEFAULT_DATA = [1, 2, 3, 1000, 1001, 1002, 345234, 345235, 17575999];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('raffle_entries', function (Blueprint $table) {
            $table->id();
            $table->date("date")->nullable();
            $table->timestamps();
        });

        foreach (self::DEFAULT_DATA as $data) {
            RaffleEntry::create(
                [
                    'id' => $data
                ]
            );
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffle_entries');
    }
};
