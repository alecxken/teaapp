<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_details', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_id',500)->nullable(false);
            $table->string('collection_date',500)->nullable(false);
            $table->string('transaction_id',500)->nullable();
            $table->string('total_cost',500)->nullable();
            $table->string('total_weight',500)->nullable();
            $table->string('clerk_id',500)->nullable();
            $table->string('status',500)->nullable();
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
        Schema::dropIfExists('collection_details');
    }
}
