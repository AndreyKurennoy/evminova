<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SheetsTableNullableBody extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sheets', function (Blueprint $table) {
            $table->text('body')->nullable()->change();
            $table->text('title')->nullable()->change();
            $table->string('category_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sheets', function (Blueprint $table) {
            $table->text('body')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->string('category_name')->nullable()->change();
        });
    }
}

