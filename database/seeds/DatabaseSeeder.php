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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('companies')->truncate();
        DB::table('contacts')->truncate();

        factory(App\Company::class, 5)->create()->each(function($company){
        $company->contacts()->save(factory(App\Contact::class)->make());
        });
    }

}
