<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cid = $this->faker->unique()->randomNumber();
        $gender = $this->faker->unique()->numberBetween(0, 1);
        $fName = $this->faker->firstName($gender);
        $lName = $this->faker->lastName();
        $citizenid = $this->faker->regexify('[A-Z0-9]{8}');
        $dob = $this->faker->dateTimeBetween('-100 years', '-18 years', null);
        $dobStr = $dob->format('Y-m-d');

        return [
            'citizenid' => $citizenid,
            'cid' => $cid,
            'license' => 'license:bd5ab718b0f74f7b8b19d4b20dcb81bbf47f2114',
            'name' => 'Cockers',
            'money' => '{"cash":' . $this->faker->numberBetween(100, 1000) . ',"crypto":0,"bank":' . $this->faker->numberBetween(1000, 5000) . '}',
            'charinfo' => '{"gender":'. $gender . ',"backstory":"placeholder backstory","birthdate":"' . $dobStr . '","nationality":"Blah","phone":"'. $this->faker->numerify('##########') .'","cid":"' . $cid . '","firstname":"' . $fName . '","lastname":"' . $lName . '","account":"US09QBCore' . $this->faker->numerify('##########') . '"}',
            'mugshot' => 'https://eu.ui-avatars.com/api/?name=' . $fName . '+' . $lName . '&background=random',
            'job' => '{"name":"unemployed","label":"Civilian","isboss":false,"grade":{"name":"Freelancer","level":0},"onduty":true,"payment":10}',
            'gang' => '{"name":"none","label":"No Gang Affiliaton","grade":{"name":"none","level":0},"isboss":false}',
            'position' => '{"x":0.0,"y":771166669396508700.0,"z":0.0}',
            'metadata' => '{"jobrep":{"trucker":0,"taxi":0,"hotdog":0,"tow":0},"ishandcuffed":false,"isdead":false,"fingerprint":"Ju917x65rVh7194","walletid":"QB-68334943","craftingrep":0,"inside":{"apartment":[]},"tracker":false,"phonedata":{"InstalledApps":[],"SerialNumber":91182341},"fitbit":[],"thirst":100,"status":[],"jailitems":[],"licences":{"driver":' . $this->faker->randomElement(['true', 'false']) . ',"business":' . $this->faker->randomElement(['true', 'false']) . ',"weapon":' . $this->faker->randomElement(['true', 'false']) . '},"injail":0,"dealerrep":0,"bloodtype":"AB+","phone":[],"callsign":"NO CALLSIGN","hunger":100,"attachmentcraftingrep":0,"commandbinds":[],"armor":0,"stress":0,"criminalrecord":{"hasRecord":false},"inlaststand":false}',
            'inventory' => '[{"slot":1,"amount":1,"info":{"type":"Class C Driver License","firstname":"' . $fName . '","lastname":"' . $lName . '","birthdate":"' . $dobStr . '"},"type":"item","name":"driver_license"},{"slot":2,"amount":1,"info":{"nationality":"Blah","lastname":"' . $lName . '","gender":' . $gender . ',"firstname":"' . $fName . '","citizenid":"' . $citizenid . '","birthdate":"' . $dobStr . '"},"type":"item","name":"id_card"},{"slot":3,"amount":1,"info":[],"type":"item","name":"phone"}]',
            'last_updated' => now()
        ];
    }
}
