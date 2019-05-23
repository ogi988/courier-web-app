<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

    Schema::create('shipment_temps', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('shipment_number');
        $table->string('status');//0-nije pokupljen,1-u magacinu,2-prevoz na adresu,3-isporuceno,4-odbijeno
        $table->string('method_payment');//1-pouzecu,2-racun
        $table->string('mass');
        $table->string('category');
        $table->string('who_pay');//1-posiljalac,2-primalac
        $table->string('name');
        $table->string('surname');
        $table->string('address');
        $table->string('email')->nullable();
        $table->string('city');
        $table->string('number');
        $table->string('shipment_price')->nullable();//cena posilje
        $table->string('transport_price');
        $table->string('type');//1-fizcko,2-pravno
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
        Schema::dropIfExists('shipment_temps');
    }
}
