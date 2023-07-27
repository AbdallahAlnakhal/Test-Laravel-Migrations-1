<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNameInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



public function up()
{
    Schema::table('companies', function (Blueprint $table) {
        $table->string('name')->after('title');
    });

    DB::table('companies')->update([
        'name' => \DB::raw('title')
    ]);

    Schema::table('companies', function (Blueprint $table) {
        $table->dropColumn('title');
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::table('companies', function (Blueprint $table) {
        $table->string('title')->after('name');
    });

    DB::table('companies')->update([
        'title' => DB::raw('name')
    ]);

    Schema::table('companies', function (Blueprint $table) {
        $table->dropColumn('name');
    });
}
}








