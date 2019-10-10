<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@gmail.com";
        $administrator->level = "ADMIN";
        $administrator->status = "ACTIVE";
        $administrator->password = \Hash::make("laracomp");
        $administrator->phone = "087744411262";
        $administrator->address = "Bandung Kiaracondong";

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
