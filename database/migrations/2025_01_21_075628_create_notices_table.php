<?php

use App\Models\NoticesButton;
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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('notices_button_id')->unsigned();
            $table->string('title');
            $table->string('text');
            $table->string('url');
            $table->bigInteger('impression_counter')->unsigned()->default(0);
            $table->string('crm');
            $table->decimal('budget');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('notices_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
        });

        NoticesButton::insert([
            [
                'name' => 'Смотреть',
            ],
            [
                'name' => 'Оставить заявку',
            ],
            [
                'name' => 'Скачать',
            ],
            [
                'name' => 'Подробнее',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
        Schema::dropIfExists('notices_buttons');
    }
};
