<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1496254574TicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('tickets')) {
            Schema::create('tickets', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('event_id')->unsigned();
                $table->foreign('event_id', '41526_592f086e76f1b')->references('id')->on('events')->onDelete('cascade');
                $table->string('title');
                $table->integer('amount')->unsigned();
                $table->date('available_from');
                $table->date('available_to');
                $table->double('price', 15, 2);
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
