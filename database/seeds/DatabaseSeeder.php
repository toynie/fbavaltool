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
        $this->call(UsersTableSeeder::class);

        $this->call(BussTypesTableSeeder::class);


        $this->call(QsetsTableSeeder::class);
        // $this->call(QuestionsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);



        $this->call(TypeQuestionSeeder::class);

        // $this->call(AnswersTableSeeder::class);
        $this->call(AnswersGeneralTableSeeder::class);

        $this->call(TransactionQATableSeeder::class);
        $this->call(TransactionTableSeeder::class);

        $this->call(SettingsTableSeeder::class);

        $this->call(CustomAnswerTableSeeder::class);
    }
}
