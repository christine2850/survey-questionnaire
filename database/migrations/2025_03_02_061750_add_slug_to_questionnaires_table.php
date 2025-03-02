<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Update existing records
        $questionnaires = DB::table('questionnaires')->whereNull('slug')->orderBy('id')->get();
        foreach ($questionnaires as $questionnaire) {
            DB::table('questionnaires')
                ->where('id', $questionnaire->id)
                ->update(['slug' => Str::slug($questionnaire->title)]);
        }

        // Now make the column required and unique
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
