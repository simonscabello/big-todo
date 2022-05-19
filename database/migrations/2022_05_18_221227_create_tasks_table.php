<?php

use App\Models\Project;
use App\Models\Team;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class);
            $table->foreignIdFor(Team::class)->nullable();
            $table->foreignId('author_id')->constrained('users');
            $table->string('title');
            $table->text('description');
            $table->date('deadline');
            $table->string('status');
            $table->string('type');
            $table->string('priority');
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
        Schema::dropIfExists('tasks');
    }
};
