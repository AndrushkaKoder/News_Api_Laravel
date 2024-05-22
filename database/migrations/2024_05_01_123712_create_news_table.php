<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->text('description');
			$table->longText('text')->nullable();
			$table->text('url')->nullable();
			$table->text('image')->nullable();
			$table->string('publishedAt')->nullable()->default(null);
			$table->unsignedBigInteger('author_id')->nullable();
			$table->unsignedBigInteger('source_id')->nullable();
			$table->timestamps();

			$table->foreign('author_id')
				->on('authors')
				->references('id')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('source_id')
				->on('sources')
				->references('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('news');
	}
}
