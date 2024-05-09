<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TestUser;
use App\Models\AvatarOrder;
use App\Models\GameCharacter;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // 테스트 사용자 생성
        for ($i = 0; $i < 10; $i++) {
            $user = TestUser::create([
                'username' => $faker->userName,
                'email' => $faker->email
            ]);

            // 테스트 게임 캐릭터 생성
            for ($j = 0; $j < rand(1, 3); $j++) {
                $character = new GameCharacter([
                    'character_name' => $faker->firstName,
                    'level' => rand(1, 100)
                ]);
                $user->gameCharacters()->save($character);
            }

            // 테스트 아바타 주문 생성
            $avatarOrder = new AvatarOrder([
                'avatar_ordered' => rand(1, 10),
                'order_date' => $faker->dateTimeThisYear()
            ]);
            $user->avatarOrder()->save($avatarOrder);
        }
    }
}
