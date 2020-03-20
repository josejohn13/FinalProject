<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $insert["customer_name"]        = "Admin";
        $insert["customer_username"]    = "admin";
        $insert["customer_password"]    = Crypt::encrypt("water123");
        $insert["customer_no"]          = "09123456789";
        $insert["customer_address"]     = "";
        $insert["customer_type"]        = "admin";
        DB::table("members")->insert($insert);
    }
}
