<?php

use Illuminate\Database\Seeder;

class UpdateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->where('model_id',1)
            ->update([
            'role_id' => 2,
        ]);
    }
}
