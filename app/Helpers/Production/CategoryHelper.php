<?php
namespace App\Helpers\Production;

use App\Helpers\CategoryHelperInterface;
use App\Repositories\CategoryRepositoryInterface;

use App\Models\Category;

class CategoryHelper implements CategoryHelperInterface
{
    /** @var CategoryRepositoryInterface */
    protected $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function CategoriesForForm()
    {
        return $this->categoryRepository->all()->map(function ($item, $key) {
            return [
                'id'   => $item->id,
                'name' => $item->name,
            ];
        })->pluck('name', 'id')->toArray();
    }
}
