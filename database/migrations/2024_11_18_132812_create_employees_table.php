<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('NIF')->unique();
            $table->string('tno');
            $table->integer('num_hijos')->default(0);
            $table->unsignedBigInteger('departament_id'); // Ajusta el nombre
            $table->timestamps();

            // Clave foránea
            $table->foreign('departament_id')->references('id')->on('departaments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
