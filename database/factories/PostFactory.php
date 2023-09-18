<?php

namespace Database\Factories;

use App\Models\PostStatus;
use App\Models\PostType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'title'=>fake()->sentence(),
           'description'=>fake()->paragraphs(3,true),
            'post_status'=> PostStatus::PUBLISH, //publish
            'post_type' => PostType::BLOG, // blog,page,multimedia
            'slug'=>'',
            'uuid'=>'-',
            'author'=>'admin'
        ];
    }
}
