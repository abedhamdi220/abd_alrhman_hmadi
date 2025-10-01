<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Servicses\Admin\CategoryService;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use Illuminate\Container\Attributes\DB;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        
    }

    /**
     * TODO: Display a listing of categories (Web Route)
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategoriesList();
        // TODO: Implement method to show categories list page

        return view("category.index", data: compact("categories"));
    }

    /**
     * TODO: Show the form for creating a new category (Web Route)
     */
    public function create(Request $request)
    {
        // $categories = $this->categoryService->createCategory();
        // TODO: Implement method to show create category form
        return view("admin.categories.create", ['parentCategories' => collect()]);
    }

    /**
     * TODO: Store a newly created category (Web Route)
     */
    public function store(CategoryStoreRequest $request)
    {

        $category = $this->categoryService->createCategory($request->validated());

        // TODO: Implement method to store new category
        return redirect()->route('categories.index');
    }

    /**
     * TODO: Display the specified category (Web Route)
     */
    public function show(Category $category)
    {
        // TODO: Implement method to show single category
        $categories = $this->categoryService->getCategoryById($category);
        return view("category.show", compact("categories"));
    }

    /**
     * TODO: Show the form for editing the specified category (Web Route)
     */
    public function edit(Category $category)
    {


        // TODO: Implement method to show edit category form
        return view("category.edit", ['category' => null, 'parentCategories' => collect($category->parentCategories)]);
    }

    /**
     * TODO: Update the specified category (Web Route)
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        
        $category = $this->categoryService->updateCategory($category, $request->validated());



        // TODO: Implement method to update category
        return redirect()->route('categories.index');
    }

    /**
     * TODO: Remove the specified category (Web Route)
     */
    public function destroy(Category $category)
    {
        $deleted = $this->categoryService->deleteCategory($category);

        if ($deleted) {
            return redirect()->route('categories.index')
                ->with('success', 'Category deleted successfully.');
        }

        return redirect()->route('categories.index')
            ->with('error', 'Failed to delete category.');
    }
}
