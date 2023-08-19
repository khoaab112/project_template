<?php

namespace App\Services;

use App\Helper\FuncLib;
use App\Models\Category;
use App\Models\SeoContent;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\CategoryBrand\CategoryBrandRepository;
use Illuminate\Support\Facades\DB;

class CategoryServices
{
    protected $categoryRepo, $categoryBrandRepo;

    public function __construct(CategoryRepository $categoryRepo, CategoryBrandRepository $categoryBrandRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->categoryBrandRepo = $categoryBrandRepo;
    }


    public function getAll(array $payload)
    {
        $query = $this->categoryRepo->query();
        if (isset($request["sync_seo"]))
            $query = $query->where("sync_seo_content", $request["sync_seo"]);

        $categories = $query->get();

        $cat_tree = FuncLib::data_tree(Category::all()->toArray());

        return [
            'cat_tree' => $cat_tree,
            'categories' => $categories
        ];
    }

    public function getData()
    {
        return FuncLib::data_tree(Category::all()->toArray());
    }

    public function store(array $input)
    {
        if ($input["parent_id"] > 0) {
            $parent = $this->categoryRepo->find($input['parent_id']);
            if (!empty($parent->parent_path))
                $input["parent_path"] = $parent->parent_path . "/" . $input["parent_id"];

            if (empty($parent->parent_path))
                $input["parent_path"] = $input["parent_id"];
        }
        $category = $this->categoryRepo->create($input);

        if (!empty($category->parent_path)) {
            $ids = explode("/", $category->parent_path);
            $parents = $this->categoryRepo->whereIn("id", $ids)->get();

            foreach ($parents as $p) {

                if (!empty($p->children_path))
                    $p->children_path = $p->children_path . "/" . $category->id;

                if (empty($p->children_path))
                    $p->children_path = $category->id;

                $p->save();
            }
        }

        return $category;
    }

    public function find(int $id)
    {
        $category = $this->categoryRepo->find($id);
        $seoContent = SeoContent::where("entity_type", SeoContent::SEO_CATEGORY)
            ->where("entity_id", $id)
            ->first();

        $categories = FuncLib::data_tree(Category::all()->toArray());

        return [
            'categories' => $categories,
            'category' => $category,
            'seoContent' => $seoContent
        ];
    }

    /**
     * @param int $id
     * @param array $request
     * @return array
     */
    public function update(int $id, array $params)
    {
        $category = $this->categoryRepo->find($id);

        $category->update($params);
        return $category;
    }

    public function destroy(int $id)
    {
        $category = $this->categoryRepo->find($id);
        $parentIds = explode("/", $category->parent_path);
        $parents = $this->categoryRepo->whereIn("id", $parentIds)->get();
        foreach ($parents as $parent) {
            $strChild = '';
            $aryChild = explode("/", $parent->children_path);
            foreach ($aryChild as $child) {
                if ($child != $category->id) {
                    if (!empty($strChild)) {
                        $strChild .= "/" . $child;
                    } else {
                        $strChild = $child;
                    }
                }
            }
            $parent->children_path = $strChild;
            $parent->save();
        }

            $category->delete($id);
            return null;
    }

    public function updateCategoryBrand(array $request)
    {
        if (!isset($request["category_id"]))
            return redirect()->back();

        $aryInsert = [];
        if (isset($request["filter_value"])) {
            foreach ($request["filter_value"] as $branId => $position) {
                $aryInsert[] = [
                    "category_id" => $request["category_id"],
                    "brand_id" => $branId,
                    "position" => $position,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")
                ];
            }
        }
        DB::beginTransaction();
        $categoryBrand = $this->categoryBrandRepo->where('category_id', $request['category_id'])->delete();
        if (!empty($aryInsert)) {
            $this->categoryBrandRepo->create($aryInsert);
        }
        DB::commit();

    }

}
