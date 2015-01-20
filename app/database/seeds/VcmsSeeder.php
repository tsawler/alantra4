<?php


class VcmsSeeder extends \Seeder {

    public function run()
    {
        $this->call('verilion\vcms\VcmsDefaultTableSeeder');

        $this->command->info('Tables seeded!');
    }

}
