<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up(): void
    {
        if (!Schema::hasTable('post_programs')) {
            // Fresh table creation
            Schema::create('post_programs', function (Blueprint $table) {
                $table->id();
                $table->string('group_name');
                $table->string('name');
                $table->string('designation')->nullable();
                $table->string('awareness'); // Yes/No
                $table->string('phone')->nullable();
                $table->text('new_cell_leaders')->nullable();
                $table->text('outreach_locations')->nullable();
                $table->text('leaders_for_outreach')->nullable();
                $table->text('pastors_coordinators')->nullable();
                $table->integer('foundation_school')->default(0);
                $table->integer('baptized')->default(0);
                $table->integer('service_centers')->default(0);
                 $table->boolean('is_read')->default(false)->after('service_centers');
                $table->timestamps();
            });
        } else {
            // Existing table: SQLite workaround to change column type
            DB::statement('
                CREATE TABLE post_programs_temp AS
                SELECT * FROM post_programs;
            ');

            Schema::dropIfExists('post_programs');

            Schema::create('post_programs', function (Blueprint $table) {
                $table->id();
                $table->string('group_name');
                $table->string('name');
                $table->string('designation')->nullable();
                $table->string('awareness'); // Yes/No
                $table->string('phone')->nullable();
                $table->text('new_cell_leaders')->nullable();
                $table->text('outreach_locations')->nullable();
                $table->text('leaders_for_outreach')->nullable();
                $table->text('pastors_coordinators')->nullable();
                $table->integer('foundation_school')->default(0);
                $table->integer('baptized')->default(0);
                $table->integer('service_centers')->default(0);
                $table->timestamps();
            });

            // Copy back data
            DB::statement('
                INSERT INTO post_programs (id, group_name, name, designation, awareness, phone, new_cell_leaders, outreach_locations, leaders_for_outreach, pastors_coordinators, foundation_school, baptized, service_centers, created_at, updated_at)
                SELECT id, group_name, name, designation, awareness, phone, new_cell_leaders, outreach_locations, leaders_for_outreach, pastors_coordinators, foundation_school, baptized, service_centers, created_at, updated_at
                FROM post_programs_temp;
            ');

            Schema::dropIfExists('post_programs_temp');
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('post_programs');
    }
};
