<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('research_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category'); // Foreign key to categories table
            $table->string('report'); // PDF file name
            $table->tinyInteger('status')->default(1); // 0=Inactive, 1=Active
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('research_reports');
    }
};