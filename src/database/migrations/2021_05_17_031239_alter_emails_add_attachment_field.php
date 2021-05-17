<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmailsAddAttachmentField extends Migration
{
    public function up()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->string('attachment')
                ->nullable();
        });
    }

    public function down()
    {
        $hasAttachment = Schema::hasColumn('emails', 'attachment');

        Schema::table('emails', function (Blueprint $table) use ($hasAttachment) {
            if ($hasAttachment) {
                $table->dropColumn('attachment');
            }
        });
    }
}
