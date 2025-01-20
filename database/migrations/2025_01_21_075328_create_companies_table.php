<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
        });

        Status::insert([
            [
                'name' => 'Активен',
            ],
            [
                'name' => 'В ожидании',
            ],
            [
                'name' => 'В архиве',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('statuses');
    }
};
