<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            NestedSet::columns($table);
//            $table->foreignIdFor(\App\Models\Category::class, 'parent_id')->nullable()->constrained('categories');
//            $table->unsignedInteger('_lft')->nullable();
//            $table->unsignedInteger('_rgt')->nullable();
            $table->string('name');
            $table->boolean('is_income')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
