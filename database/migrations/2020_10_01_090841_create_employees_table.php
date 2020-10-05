<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table -> id();

            $table -> string('firstname', 60);
            $table -> string('lastname', 60);

            $table -> date('date_of_birth');
            $table -> string('private_code', 15);

            $table -> bigInteger('location_id') -> unsigned(); // chiave esterna

            $table -> timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
