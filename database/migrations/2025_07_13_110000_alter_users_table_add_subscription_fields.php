<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'subscription_type')) {
                $table->string('subscription_type')->nullable();
            }
            if (!Schema::hasColumn('users', 'join_date')) {
                $table->date('join_date')->nullable();
            }
            if (!Schema::hasColumn('users', 'renewal_date')) {
                $table->date('renewal_date')->nullable();
            }
            if (!Schema::hasColumn('users', 'status')) {
                $table->boolean('status')->default(1);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'subscription_type')) {
                $table->dropColumn('subscription_type');
            }
            if (Schema::hasColumn('users', 'join_date')) {
                $table->dropColumn('join_date');
            }
            if (Schema::hasColumn('users', 'renewal_date')) {
                $table->dropColumn('renewal_date');
            }
            if (Schema::hasColumn('users', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
