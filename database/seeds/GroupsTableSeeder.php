<?php
use App\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Group::insert([
            'name' => '所属なし'
         ]);
   
         Group::insert([
            'name' => 'グループA'
         ]);
   
         Group::insert([
            'name' => 'グループB'
         ]);
    }
}
