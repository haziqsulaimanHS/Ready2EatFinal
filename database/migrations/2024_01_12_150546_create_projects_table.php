<?php

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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectID');
            $table->string('name');
            $table->string('systemOwner');
            $table->string('systemPIC');
            $table->string('projectDuration');
            $table->string('projectStatus');
            $table->date('projectStartDate')->nullable();
            $table->date('projectEndDate')->nullable();
            // $table->foreign('lead_developer_id')->references('id')->on('leadDevelopers')->onDelete('cascade');
            // $table->unsignedBigInteger('lead_developer_id')->nullable();
            $table->string('developmentMethodology')->nullable();
            $table->string('systemPlatform')->nullable();
            $table->string('projectDeploymentType')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
