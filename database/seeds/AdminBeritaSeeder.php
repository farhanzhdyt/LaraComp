<?php

use Illuminate\Database\Seeder;

class AdminBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = "Admin Berita";
        $administrator->email = "admin_berita@gmail.com";
        $administrator->level = "ADMIN_BERITA";
        $administrator->status = "ACTIVE";
        $administrator->password = \Hash::make("laracomp");
        $administrator->phone = "087744411262";
        $administrator->address = "Bandung Kiaracondong";

        $administrator->save();

        $this->command->info("User Admin Berita berhasil diinsert");
    }
}
