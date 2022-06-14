<?php

use App\Models\Referant;
use App\Models\User;
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
        Schema::create('bons', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Referant::class);
            $table->foreignIdFor(User::class);
            $table->string('important_infos');
            $table->string('b_date');
            $table->string('charge_date');
            $table->string('charge_time');
            $table->string('depart_time');
            $table->string('charge_place');
            $table->string('destination');
            $table->string('transport1');
            $table->string('transport2');
            $table->string('transport3');
            $table->string('retard');
            $table->string('itineraire1');
            $table->string('itineraire2');
            $table->string('itineraire3');
            $table->string('instructions1');
            $table->string('instructions2');
            $table->string('instructions3');
            $table->string('passenger1');
            $table->string('tel1');
            $table->string('passenger2');
            $table->string('tel2');
            $table->string('passenger3');
            $table->string('tel3');
            $table->string('passenger4');
            $table->string('tel4');
            $table->string('passenger5');
            $table->string('tel5');
            $table->boolean('state');
            $table->string('images');
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
        Schema::dropIfExists('bons');
    }
};
