<?php

namespace App\Http\Servicses\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * TODO: Get all categories without pagination
     *
     * @return Collection
     */
    public function getAllCategoriesList()
    {
        return Category::with(['parent', 'children'])->get();
    }


    /**
     * TODO: Get category by ID
     *
     * @param int $id
     * @return Category
     */
    public function getCategoryById(Category $category): Category
    {
        return Category::with(['parent', 'children'])->findOrFail($category->id);
    }

    /**
     * TODO: Create a new category
     *
     * @param array $data
     * @return Category
     */
    public function createCategory(array $data)
    {
        return DB::transaction(function () use ($data) {
            return Category::create($data);
        });
    }

    /**
     * TODO: Update an existing category
     *
     * @param int $id
     * @param array $data
     * @return Category
     */
    public function updateCategory(Category $category, array $data): Category
    {
        $category->update($data);
        return $category->fresh(['parent', 'children']);
    }

    /**
     * TODO: Delete a category
     *
     * @param int $id
     * @return bool
     */

    public function deleteCategory(Category $category): bool
    {

        // TODO: Implement method to delete category
        return (bool) $category->delete(); // Temporary return
    }

    /**
     * TODO: Get parent categories (categories without parent)
     *
     * @return Collection
     */
    public function getParentCategories(): Collection
    {

        // TODO: Implement method to get parent categories
        return collect(); // Temporary return
    }

    /**
     * TODO: Check if category has children
     *
     * @param int $id
     * @return bool
     */
    public function hasChildren(int $id): bool
    {
        // TODO: Implement method to check if category has children
        return false; // Temporary return
    }

    /**
     * TODO: Get categories for API with ordering, filtering, and search
     * This method should handle:
     * - Ordering by name, created_at, etc.
     * - Filtering by parent_id, status, etc.
     * - Searching by name
     * - Pagination
     *
     * @param array $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCategoriesForApi(array $params = [])
    {
        $categories = Category::query();

        if (isset($params["parent_id"])) {
            $categories = $categories->parentId($params["parent_id"]);
        }

        if (isset($params["search"])) {
            $categories = $categories->where("name", "like", "%{$params["search"]}%");
        }

        if (isset($params["order_by"])) {
            $categories = $categories->orderBy($params["order_by"], $params["order_direction"]);
        }

        return $categories->paginate(10);
    }
}
