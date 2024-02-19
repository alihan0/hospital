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
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('site_url');
            $table->string('site_domain');
            $table->string('site_description')->nullable();
            $table->string('site_keywords')->nullable();
            $table->string('site_logo_header_white')->nullable();
            $table->string('site_logo_footer_white')->nullable();
            $table->string('site_logo_header_dark')->nullable();
            $table->string('site_logo_footer_dark')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_google_analytics')->nullable();
            $table->string('site_livechat')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('tertiary_color')->nullable();
            $table->string('site_lang')->nullable();
            $table->string('token')->nullable();
            $table->string('licence')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systems');
    }
};
