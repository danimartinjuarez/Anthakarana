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
        Event::factory()->create(['title'=>'Abrazar árboles ', 'description'=>'Actividad muy relajante y armonizadora de energías', 'people'=>'25', 'image'=>'https://st.depositphotos.com/1518767/4293/i/950/depositphotos_42935891-stock-photo-boy-hugging-a-tree-at.jpg', 'date'=>'2022-08-14', 'start_hour'=>'10:00']);
        Event::factory()->create(['title'=>'Iniciación Reiki I', 'description'=>'Te permitirá tratarte a ti y a quien lo necesite', 'image'=>'https://th.bing.com/th/id/OIP.WhSVeVwJcJEFSoZ0eH51OwHaHa?pid=ImgDet&rs=1', 'people'=>'7', 'date'=>'2022-08-14', 'start_hour'=>'10:00']);
        Event::factory()->create(['title'=>'Retiro Espiritual', 'description'=>'Si necesitas desconectar esta es tu actividad ideal ', 'image'=>'https://th.bing.com/th/id/R.fde987fa010bb3fc89eb38cc1d6cfefa?rik=%2beHb%2fOY9ja6GzQ&pid=ImgRaw&r=0', 'people'=>'30', 'date'=>'2022-08-14', 'start_hour'=>'10:00']);
        Event::factory()->create();

        User::factory()->create(['name'=>'admin', 'email'=>'admin@admin.com', 'isAdmin'=>true]);
        User::factory()->create(['name'=>'user1', 'email'=>'user1@user.com', 'isAdmin'=>false]);
        
    }
}
