<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gmail')->unique();
            $table->string('phone_number');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(false);
            $table->date('date_join')->nullable(); // Tambahkan kolom ini
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('members');
    }
};

