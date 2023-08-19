<?php

namespace App\Services;

use App\Repositories\Menu\MenuRepository;
use Flash;
use Illuminate\Support\Facades\Route;

class MenuService
{
    protected $menuRepo;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepo = $menuRepo;
    }

    public function getAll(array $payload)
    {
        $menu = $this->menuRepo->all();

        $menuTree = $this->data_tree($menu->toArray());
        return [$menu, $menuTree];
    }

    private function data_tree(array $data, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                $child = $this->data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
                unset($data[$item['id']]);
            }
        }
        return $result;
    }

    public function getCreate()
    {
        $menus = $this->menuRepo->all();
        $menus = $this->data_tree($menus->toArray());
        $routeCollection = Route::getRoutes();
        return [$menus, $routeCollection];
    }

    public function store(array $params)
    {
        return $this->menuRepo->create($params);
    }

    public function show(int $id)
    {
        return $this->menuRepo->find($id);
    }

    public function getEdit(int $id)
    {
        $menu = $this->menuRepo->find($id);
        if (empty($menu)) {
            \Flash::error('Menu not found');

            return redirect(route('menus.index'));
        }

        $menus = $this->menuRepo->all();

        return [$menu, $menus];
    }

    public function update(array $params, int $id)
    {
        $menu = $this->menuRepo->find($id);
        $menu->update($params);
    }

    public function destroy(int $id)
    {
        $menu = $this->menuRepo->find($id);
        if (empty($menu)) {
            \Flash::error('Menu not found');

            return redirect(route('menus.index'));
        }
        $this->menuRepo->delete($id);
        return null;
    }
}
