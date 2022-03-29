<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contacts>
 */
class contactsFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customerIDs = DB::table('customers')->pluck('customer_id');
        return [
           
            
             'customer_id' =>$this->faker->randomElement($customerIDs),
             'account_number'=>$this->faker->firstName(),
             'contact_name'=>$this->faker->name(),
         
         
     ];
    }
}
