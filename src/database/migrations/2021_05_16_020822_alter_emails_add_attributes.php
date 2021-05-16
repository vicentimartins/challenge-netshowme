<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmailsAddAttributes extends Migration
{
    public function up()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')
                ->unique();
            $table->string('phone');
            $table->text('message');
        });
    }

    public function down()
    {
        $attributes = ['name', 'email', 'phone', 'message'];

        Schema::table('emails', function (Blueprint $table) use ($attributes) {
            foreach ($attributes as $attribute) {
                $attributeExists = Schema::hasColumn('emails', $attribute);

                if ($attributeExists) {
                    $table->dropColumn($attribute);
                }
            }
        });
    }

}
