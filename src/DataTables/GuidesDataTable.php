<?php

namespace Corals\Utility\Guide\DataTables;

use Corals\Foundation\DataTables\BaseDataTable;
use Corals\Utility\Guide\Models\Guide;
use Corals\Utility\Guide\Transformers\GuideTransformer;
use Yajra\DataTables\EloquentDataTable;

class GuidesDataTable extends BaseDataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $this->setResourceUrl(config('utility-guide.models.guide.resource_url'));

        $dataTable = new EloquentDataTable($query);

        return $dataTable->setTransformer(new GuideTransformer());
    }

    /**
     * Get query source of dataTable.
     * @param Guide $model
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function query(Guide $model)
    {
        return $model->newQuery();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['visible' => false],
            'url' => ['title' => trans('utility-guide::attributes.guide.url')],
            'route' => ['title' => trans('utility-guide::attributes.guide.route')],
            'guide_config' => ['title' => trans('utility-guide::labels.guide.guide_config')],
            'status' => ['title' => trans('Corals::attributes.status')],
            'created_at' => ['title' => trans('Corals::attributes.created_at')],
            'updated_at' => ['title' => trans('Corals::attributes.updated_at')],
        ];
    }

    public function getFilters()
    {
        return [
            'url' => ['title' => trans('utility-guide::attributes.guide.url'), 'class' => 'col-md-3', 'type' => 'text', 'condition' => 'like', 'active' => true],
            'route' => ['title' => trans('utility-guide::attributes.guide.route'), 'class' => 'col-md-3', 'type' => 'text', 'condition' => 'like', 'active' => true],
        ];
    }
}
