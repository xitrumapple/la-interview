<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("item_name", 100);
            $table->string("slug", 200);
            $table->string("unit", 30);
            $table->integer("price")->unsigned()->default(0);
            $table->unsignedBigInteger("cate_id")->default(0);
            $table->foreign("cate_id")->references("id")->on("cates")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};