<?php

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
        Schema::create('issues', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('gadget_type');
            $table->text('description');
            $table->string('location')->nullable();
            $table->uuid('issue_assigned_to')->nullable();
            $table->timestamps();

            //foreign key contraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('issue_assigned_to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gadget_issues');
    }
};
