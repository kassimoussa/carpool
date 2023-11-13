<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('ville_depart')->nullable();
            $table->string('quartier_depart')->nullable(); 
            $table->string('ville_destination')->nullable();
            $table->string('quartier_destination')->nullable(); 
            $table->date('date')->nullable();
            $table->time('heure')->nullable(); 
            $table->integer('nb_passager')->nullable();
            $table->integer('prix')->nullable();
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
        Schema::dropIfExists('trajets');
    }
}
