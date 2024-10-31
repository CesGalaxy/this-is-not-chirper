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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 16)->after('id')->unique();
            $table->string('bio', 512)->after('name')->nullable();
            $table->string('avatar_url')->after('bio')->nullable();
            $table->boolean('is_admin')->after('email_verified_at')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
