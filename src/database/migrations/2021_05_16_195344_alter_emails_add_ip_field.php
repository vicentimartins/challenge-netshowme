<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmailsAddIpField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->string('ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $hasIp = Schema::hasColumn('emails', 'ip');

        Schema::table('emails', function (Blueprint $table) use ($hasIp) {
            if ($hasIp) {
                $table->dropColumn('ip');
            }
        });
    }
}
