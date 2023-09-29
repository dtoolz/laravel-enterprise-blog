<?php

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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->text('home_top_bar_advert');
            $table->boolean('home_top_bar_advert_status');
            $table->text('home_middle_page_advert');
            $table->boolean('home_middle_page_advert_status');
            $table->text('news_details_page_advert');
            $table->boolean('news_details_page_advert_status');
            $table->text('news_page_advert');
            $table->boolean('news_page_advert_status');
            $table->text('side_bar_advert');
            $table->boolean('side_bar_advert_status');
            $table->text('home_top_bar_advert_url')->nullable();
            $table->text('home_middle_page_advert_url')->nullable();
            $table->text('news_details_page_advert_url')->nullable();
            $table->text('news_page_advert_url')->nullable();
            $table->text('side_bar_advert_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
