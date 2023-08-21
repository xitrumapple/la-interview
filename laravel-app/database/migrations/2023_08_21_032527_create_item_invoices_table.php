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
        Schema::create('item_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("item_id")->default(0);
            $table->unsignedBigInteger("invoice_id")->default(0);
            $table->integer("quantity")->unsigned()->default(0);
            $table->integer("price")->unsigned()->default(0);
            $table->foreign("item_id")->references("id")->on("items")->onDelete("cascade");
            $table->foreign("invoice_id")->references("id")->on("invoices")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_invoices');
    }
};