<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorships', function (Blueprint $table) {
            // avremo 4 sponsorizzazioni, ogni doc di default avra quella relativa all'id 1, che sarà type_sponsorship = non è sponsorizzato.
            $table->id();
            $table->string('name');
            $table->string('type_sponsorship');
            $table->timestamp('start_date');
            $table->timestamp('finish_date');
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
        Schema::dropIfExists('sponsorships');
    }
}
