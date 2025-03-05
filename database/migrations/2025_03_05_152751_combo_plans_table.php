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
        //
        Schema::create("combo_plans",function(Blueprint $table){
            $table->id();
            $table->string("name");
            $table->decimal("price",10,2);
            $table->timestamps();
        });
        
        Schema::create("combo_plans_details",function(Blueprint $table){
            $table->id();
            $table->foreignId('combo_plan_id')->constrained('combo_plans')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
