<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibilityCriteria;
use Illuminate\Support\Facades\DB;

class EligibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        //Incress 500 to 15000 if you want to test

        for ($i=0; $i < 500; $i++) { 
            $data[]=[
                'name' => 'Eligibility Criteria '.($i+1),
                'age_greater_than'=>rand(18,50),
                'age_less_than'=>rand(18,50),
                'income_greater_than'=>rand(20000,50000),
                'income_less_than'=>rand(51000,100000),
                'last_login_days_ago'=>rand(1,365),
            ];

            if(($i+1) % 1000==0){
                DB::table("eligibility_criterias")->insert($data);
                $data=[];
            }
        }
        if(!empty($data)){
            DB::table("eligibility_criterias")->insert($data);
        }
    }
}
