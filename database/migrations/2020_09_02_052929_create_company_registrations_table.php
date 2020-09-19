<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_registrations', function (Blueprint $table) {

            $table->id();
            $table->timestamps();

            $table->string('company_name',85);
            $table->string('tagline',100)->nullable();
            $table->string('website_url',100)->nullable();
            $table->string('company_email',85);
            $table->string('founder_name',85);
            $table->string('founder_email',85);

            $table->bigInteger('contact_number');
            $table->string('street_address',85);
            $table->string('city',50);
            $table->string('state',50);
            $table->string('country',50);
            $table->bigInteger('pin_code');

            $table->string('gstin',100)->nullable();
            $table->time('office_open_at');
            $table->time('office_close_at');
            $table->date('establish_in');
            $table->string('facebook_url',100)->nullable();
            $table->string('twitter_url',100)->nullable();

            $table->bigInteger('whatsApp_number')->nullable();
            $table->string('category',50);
            $table->string('erp_url');
            $table->string('password',70);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_registrations');
    }
}
