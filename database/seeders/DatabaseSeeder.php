<?php

namespace Database\Seeders;

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
        $user = \App\Models\Comment::factory()->create([
            'name' => 'Маркус Перссон',
            'comment' => 'Если твой код работает, значит это хороший код.'
          
        ]);
        $user = \App\Models\Comment::factory()->create([
            'name' => 'Гейб Логан Ньюэлл',
            'comment' => 'Чтобы понять код мидла, нужно быть мидлом. Чтобы понять код сеньора, достаточно быть джуном'
          
        ]);
        $user = \App\Models\Comment::factory()->create([
            'name' => 'Марк Цукерберг',
            'comment' => 'Комментарии в коде должны быть похожими на кружевные трусики: маленькими, прозрачными, и оставляющими достаточно места для воображения'
          
        ]);
        $user = \App\Models\Comment::factory()->create([
            'name' => 'Джеймс Гослинг',
            'comment' => 'Кофе не помогает программировать, зато он приятен на вкус'
          
        ]);
        $user = \App\Models\Comment::factory()->create([
            'name' => 'Эндрю Таненбаум',
            'comment' => 'Завидую тестировщикам: все хотят с ними дружить'
          
        ]);
        $user = \App\Models\Comment::factory()->create([
            'name' => 'Крис Хьюз',
            'comment' => 'Чем опытнее программист, тем лучше он осознаёт всю скудность своих знаний и навыков'
          
        ]);
    }
}
