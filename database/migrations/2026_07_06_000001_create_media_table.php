<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('filename');                    // stored path e.g. "sections/abc123.jpg"
            $table->string('original_name');                // original uploaded filename
            $table->string('alt_text')->nullable();         // alt text for accessibility
            $table->string('mime_type')->nullable();         // image/jpeg, image/png, etc.
            $table->unsignedBigInteger('file_size')->nullable(); // in bytes
            $table->string('disk')->default('public');
            $table->string('collection')->nullable();        // which directory/collection (sections, gallery, blog, etc.)
            $table->nullableMorphs('mediable');              // polymorphic link to source model (optional)
            $table->timestamps();

            $table->index('filename');
            $table->index('collection');
            $table->unique(['filename', 'disk']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
