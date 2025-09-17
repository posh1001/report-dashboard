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

                // Step 1
                $table->string('group_name');
                $table->string('name');
                $table->string('designation')->nullable();
                $table->string('awareness'); // Yes/No
                $table->string('phone')->nullable();

                // Step 2
                $table->text('new_cell_leaders')->nullable();
                $table->text('outreach_locations')->nullable();
                $table->text('leaders_for_outreach')->nullable();
                $table->text('pastors_coordinators')->nullable();
                $table->text('cell_pioneered')->nullable();
                $table->text('churches_pioneered')->nullable();
                $table->text('centers_pioneered')->nullable();

                // Step 3
                $table->unsignedInteger('foundation_school')->default(0);
                $table->unsignedInteger('baptized')->default(0);
                $table->unsignedInteger('service_centers')->default(0);
                $table->unsignedInteger('new_cells')->default(0);
                $table->unsignedInteger('returning_invitees')->default(0);
                $table->unsignedInteger('new_church')->default(0);
                $table->unsignedInteger('attendance')->default(0);

                // Notifications
                $table->boolean('is_read')->default(false);

                $table->timestamps();
            });
        } else {
            // Existing table: SQLite workaround to "alter" structure
            DB::statement('
                CREATE TABLE post_programs_temp AS
                SELECT * FROM post_programs;
            ');

            Schema::dropIfExists('post_programs');

            Schema::create('post_programs', function (Blueprint $table) {
                $table->id();

                // Step 1
                $table->string('group_name');
                $table->string('name');
                $table->string('designation')->nullable();
                $table->string('awareness'); // Yes/No
                $table->string('phone')->nullable();

                // Step 2
                $table->text('new_cell_leaders')->nullable();
                $table->text('outreach_locations')->nullable();
                $table->text('leaders_for_outreach')->nullable();
                $table->text('pastors_coordinators')->nullable();
                $table->text('cell_pioneered')->nullable();
                $table->text('churches_pioneered')->nullable();
                $table->text('centers_pioneered')->nullable();

                // Step 3
                $table->unsignedInteger('foundation_school')->default(0);
                $table->unsignedInteger('baptized')->default(0);
                $table->unsignedInteger('service_centers')->default(0);
                $table->unsignedInteger('new_cells')->default(0);
                $table->unsignedInteger('returning_invitees')->default(0);
                $table->unsignedInteger('new_church')->default(0);
                $table->unsignedInteger('attendance')->default(0);

                // Notifications
                $table->boolean('is_read')->default(false);

                $table->timestamps();
            });

            // Copy back old data (new fields default to 0/null/false)
            DB::statement('
                INSERT INTO post_programs (
                    id, group_name, name, designation, awareness, phone,
                    new_cell_leaders, outreach_locations, leaders_for_outreach, pastors_coordinators,
                    foundation_school, baptized, service_centers,
                    created_at, updated_at
                )
                SELECT
                    id, group_name, name, designation, awareness, phone,
                    new_cell_leaders, outreach_locations, leaders_for_outreach, pastors_coordinators,
                    foundation_school, baptized, service_centers,
                    created_at, updated_at
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
