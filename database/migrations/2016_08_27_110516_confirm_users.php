<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class ConfirmUsers extends Migration
{
    public function up()
    {
        Schema::create('confirm_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',255)->unique();
            $table->string('token',32);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }
    public function down()
    {
        Schema::drop('confirm_users');
    }
}