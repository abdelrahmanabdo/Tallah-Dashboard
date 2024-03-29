<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title', 200);
            $table->string('title_ar')->nullable();
            $table->longText('body');
            $table->longText('body_ar')->nullable();
            $table->integer('likes')->default(0);
            $table->boolean('is_reviewed')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->string('softDeletes');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
