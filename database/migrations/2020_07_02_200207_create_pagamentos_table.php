<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('senderName', 250);
            $table->string('senderPhone', 250);
            $table->string('senderEmail', 250);
            $table->string('senderHash', 250);
            $table->string('senderCNPJ', 250);
            $table->string('shippingAddressStreet', 250);
            $table->string('shippingAddressNumber', 250);
            $table->string('shippingAddressDistrict', 250);
            $table->string('shippingAddressPostalCode', 250);
            $table->string('shippingAddressCity', 250);
            $table->string('shippingAddressState', 250);
            $table->string('itemId', 250);
            $table->string('itemDescription', 250);
            $table->string('itemAmount', 250);
            $table->string('itemQuantity', 250);
            $table->string('paymentMethod', 250);

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
        Schema::dropIfExists('pagamentos');
    }
}
