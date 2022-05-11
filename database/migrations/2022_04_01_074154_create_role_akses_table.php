<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleAksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_akses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_controller');
            $table->string('can_create')->nullable();
            $table->string('can_read')->nullable();
            $table->string('can_edit')->nullable();
            $table->string('can_delete')->nullable();
            $table->string('can_index')->nullable();
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('role_akses');
    }
}
