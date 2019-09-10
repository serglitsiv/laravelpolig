<?php
namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository
 * @package App\Repositories
 */

class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статетей для вывода в списке
     * Админка
     * @return LengthAwarePaginator
     */

    public function getAllWithPaginate()
    {
        $columns = [
            'id' ,
            'title',
            'slug' ,
            'is_published' ,
            'published_at' ,
            'user_id' ,
            'category_id' ,
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->with(['category','user'])
            ->paginate(25);

        return $result;
    }

    /**
    Получить модель на редакт. в админке
     * @param  int $id
     * @return Model
     */

 public function getEdit($id)
 {
   return $this->startConditions()->find($id);
 }

}