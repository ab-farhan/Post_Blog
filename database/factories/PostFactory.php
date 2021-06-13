<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Auth;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_title'=>$this->faker->sentence,
            'category_id'=>2,
            'post_creator_id'=>1,
            'post_slug'=>Str::slug($this->faker->sentence,'-'),
            'post_image'=>$this->faker->image,
            'post_description'=>$this->faker->text(400),
        ];
    }
}
