<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('slug',200)->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->string('translation_lang',10);
            $table->integer('translation_of',autoIncrement:  false,unsigned: true);
            $table->boolean('active')->default(1);
            $table->foreignIdFor(\App\Models\MainCategory::class);
            $table->foreignIdFor(\App\Models\Vendor::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
