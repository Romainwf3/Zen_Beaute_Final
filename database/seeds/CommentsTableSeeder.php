<?php

use App\Modeles\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        // on crée un tableau dans config/categories.php
        // puis on crée une boucle pour récupérer toutes les données qui
        // nous serviront a remplir la base de donnée

        $comments = config('comments');
        foreach($comments as $comment) {
            Comment::create( [
                'pseudo' => $comment['pseudo'],
                'content' => $comment['content'],
                'active' => $comment['active'],
            ]);
        }
    }
}
