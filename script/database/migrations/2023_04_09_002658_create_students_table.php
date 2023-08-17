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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("stu_code");
            $table->string("f_name");
            $table->string("m_name")->nullable();
            $table->string("l_name");
            $table->string("dob");
            $table->string("gender");
            $table->string("age");
            $table->string("religion");
            $table->string("cast");
            $table->string("bpl");
            $table->string("aadhar");
            $table->string("class");
            $table->string("pre_road")->nullable();
            $table->string("pre_landmark")->nullable();
            $table->string("pre_pin")->nullable();
            $table->string("pre_state")->nullable();
            $table->string("pre_district")->nullable();
            $table->string("pre_building")->nullable();
            $table->string("pre_country")->nullable();
            $table->string("pre_co")->nullable();
            $table->string("per_road")->nullable();
            $table->string("per_landmark")->nullable();
            $table->string("per_pin")->nullable();
            $table->string("per_state")->nullable();
            $table->string("per_district")->nullable();
            $table->string("per_building")->nullable();
            $table->string("per_country")->nullable();
            $table->string("per_co")->nullable();
            $table->string("phone");
            $table->string("email")->nullable();
            $table->string("course");
            $table->string("duration");
            $table->longtext("details");
            $table->string("session_year");
            $table->string("image");
            $table->enum("status",["0","1"])->comment("0->Inactive 1->Active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
