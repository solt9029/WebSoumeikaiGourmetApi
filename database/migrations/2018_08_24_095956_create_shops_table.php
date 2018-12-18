<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Shop;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img');
            // category should be managed with another table, but okay:(
            $table->string('category');
            $table->string('phone_number');
            $table->string('address');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('link');
            $table->string('comment');
            // owners table should be created, but I decided to use them because it's time consuming:(
            $table->string('owner_name');
            $table->string('owner_club');
            $table->string('owner_graduated_at');
            $table->string('owner_group');
        });

        $json = File::get('database/data/shops.json');
        // decode json to array
        $shops = json_decode($json, true);
        DB::table('shops')->insert($shops);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
