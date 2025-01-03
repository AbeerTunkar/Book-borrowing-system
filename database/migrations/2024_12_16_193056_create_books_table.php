<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->date('published_at')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->morphs('borrowable');
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');

    }
}
