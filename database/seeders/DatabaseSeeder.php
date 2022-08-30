<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
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
        Event::factory()->create(['title' => 'Abrazar árboles', 'description' => 'Actividad muy relajante y armonizadora de energías',  'image' => 'https://media.traveler.es/photos/613765fbbf63e581e01009e6/master/w_1600%2Cc_limit/166216.jpg', 'total_people' => '25', 'sub_people' => '10', 'date' => '2022-08-14', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Iniciación Reiki I', 'description' => 'Te permitirá tratarte a ti y a quien lo necesite', 'image' => 'https://calmradio.com/media/k2/items/cache/8528daa5f569343a0025bbf25ddfaee5_M.jpg', 'total_people' => '7', 'sub_people' => '10', 'date' => '2022-08-14', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Retiro Espiritual', 'description' => 'Si necesitas desconectar esta es tu actividad ideal ', 'image' => 'https://th.bing.com/th/id/R.fde987fa010bb3fc89eb38cc1d6cfefa?rik=%2beHb%2fOY9ja6GzQ&pid=ImgRaw&r=0', 'total_people' => '30', 'sub_people' => '10', 'date' => '2022-07-14', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Medicina Alternativa', 'description' => 'Si necesitas desconectar esta es tu actividad ideal ', 'image' => 'https://img.freepik.com/premium-vector/futuristic-alternative-holistic-therapy-concept-with-glowing-low-polygonal-human-hand-lotus-flower_67515-980.jpg', 'total_people' => '30', 'sub_people' => '10', 'date' => '2022-08-11', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Charla sobre terapias alternativas', 'description' => 'Si necesitas desconectar esta es tu actividad ideal ', 'image' => 'https://i.ytimg.com/vi/oq9An6v6fo0/maxresdefault.jpg', 'total_people' => '30', 'sub_people' => '10', 'date' => '2022-04-20', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Yoga Winter Festival', 'description' => 'Si necesitas desconectar esta es tu actividad ideal ', 'image' => 'https://www.elfest.es/files/events/52/image_5205_1_large.jpg', 'total_people' => '30', 'sub_people' => '10', 'date' => '2022-11-18', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Meditacion Guiada', 'description' => 'Si necesitas desconectar esta es tu actividad ideal ', 'image' => 'https://cdn.stayhappening.com/events5/banners/67231f0ae91ec0a746d0546596338212d5a009d9bcfc5d8a4cb96d3d5957b488-rimg-w1200-h800-gmir.jpg?v=1659028944', 'total_people' => '30', 'sub_people' => '10', 'date' => '2022-12-15', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Sanar la mente', 'description' => 'Si necesitas desconectar esta es tu actividad ideal ', 'image' => 'https://www.salud180.com/sites/www.salud180.com/files/78531344.jpg', 'total_people' => '30', 'sub_people' => '10', 'date' => '2022-09-12', 'start_hour' => '10:00']);
        Event::factory()->create(['title' => 'Iniciación en terapias alternativas', 'description' => 'Si necesitas desconectar esta es tu actividad ideal ', 'image' => 'https://mistramitesyrequisitos.com/wp-content/uploads/2020/01/Como-abrir-un-centro-de-terapias-alternativas-1.jpg', 'total_people' => '30', 'sub_people' => '10', 'date' => '2022-02-17', 'start_hour' => '10:00']);

        Event::factory(0)->create();

        User::factory()->create(['name' => 'admin', 'email' => 'admin@admin.com', 'isAdmin' => true]);
        User::factory()->create(['name' => 'user1', 'email' => 'user1@user.com', 'isAdmin' => false]);
    }
}
