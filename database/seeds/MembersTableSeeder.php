<?php

use App\Member;
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::insert([
            'last_name' => 'お名前',
            'first_name' => '太郎',
            'pref' => '石川県',
            'address' => '金沢市',
            'gender' => '1',
            'group_id' => 2
         ]);
   
         Member::insert([
            'last_name' => 'お名前',
            'first_name' => '花子',
            'pref' => '富山県',
            'address' => '高岡市',
            'gender' => '1',
            'group_id' => 1
          ]);
    }
}
