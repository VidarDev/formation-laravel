<?php

use App\Models\Author;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('authors')) {
            Schema::create('authors', function (Blueprint $table) {
                $table->id();
                $table->string('lastname');
                $table->string('firstname');
                $table->string('slug')->unique();
                $table->string('email')->unique();
                $table->longText('description');
                $table->timestamps();
            });
        }
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignIdFor(Author::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeignIdFor(Author::class);
        });
        Schema::dropIfExists('authors');
    }
};
