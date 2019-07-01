<?php

namespace App\Repositories\Eloquent;
use App\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    /**
    * @param object $category
    */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getBlankModel()
    {
        return new Category();
    }

    public function all()
    {
      $category = $this->category->all();

      return $category;
    }

    public function searchCategories($input)
    {
        $name = $input['name'];

        $categories = $this->category
        ->where('name', 'like', "%{$name}%")
        ->get();

        return $categories;
    }

    public function findCategoryId($category_name)
    {

        $category_id = $this->category
        ->where('name', $category_name)
        // ->orWhere('name', 'like', "%{$category_name}%")
        ->pluck('id')
        ->first();

        return $category_id;
    }

    public function getPopularCategories(){
        $categories = $this->category
        ->take(10)
        ->get();

        return $categories;
    }

}