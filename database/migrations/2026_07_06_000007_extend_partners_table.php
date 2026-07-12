<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->text('csr_area')->nullable()->after('description');
            $table->decimal('amount_sponsored', 15, 2)->nullable()->after('csr_area');
            $table->string('recognition_level')->nullable()->after('amount_sponsored');
            $table->string('social_links')->nullable()->after('recognition_level');
            $table->string('contact_person')->nullable()->after('social_links');
            $table->string('contact_email')->nullable()->after('contact_person');
            $table->string('contact_phone')->nullable()->after('contact_email');
            $table->text('documents')->nullable()->after('contact_phone');
        });
    }

    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn([
                'csr_area', 'amount_sponsored', 'recognition_level',
                'social_links', 'contact_person', 'contact_email',
                'contact_phone', 'documents',
            ]);
        });
    }
};
