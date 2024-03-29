<?php

namespace Corals\Utility\Guide\Http\Controllers;

use Corals\Foundation\Http\Controllers\BaseController;
use Corals\Utility\Guide\DataTables\GuidesDataTable;
use Corals\Utility\Guide\Http\Requests\GuideRequest;
use Corals\Utility\Guide\Models\Guide;
use Corals\Utility\Guide\Services\GuideService;
use Illuminate\Http\Request;

class GuideController extends BaseController
{
    protected $guideService;

    public function __construct(GuideService $guideService)
    {
        $this->guideService = $guideService;

        $this->resource_url = config('utility-guide.models.guide.resource_url');

        $this->resource_model = new Guide();

        $this->title = 'utility-guide::module.guide.title';
        $this->title_singular = 'utility-guide::module.guide.title_singular';

        parent::__construct();
    }

    /**
     * @param GuideRequest $request
     * @param GuidesDataTable $dataTable
     * @return mixed
     */
    public function index(GuideRequest $request, GuidesDataTable $dataTable)
    {
        return $dataTable->render('utility-guide::guide.index');
    }

    /**
     * @param GuideRequest $request
     * @param Guide $guide
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(GuideRequest $request, Guide $guide)
    {
        $this->setViewSharedData(['title_singular' => trans('Corals::labels.create_title', ['title' => $this->title_singular])]);

        $guideConfigFields = $guide->getConfig('guide_config.fields');

        return view('utility-guide::guide.create_edit')->with(compact('guide', 'guideConfigFields'));
    }

    /**
     * @param GuideRequest $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|mixed
     */
    public function store(GuideRequest $request)
    {
        try {
            $guide = $this->guideService->store($request, Guide::class);

            flash(trans('Corals::messages.success.created', ['item' => $this->title_singular]))->success();
        } catch (\Exception $exception) {
            log_exception($exception, Guide::class, 'store');
        }

        return redirectTo($this->resource_url);
    }

    /**
     * @param GuideRequest $request
     * @param Guide $guide
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(GuideRequest $request, Guide $guide)
    {
        $this->setViewSharedData(['title_singular' => trans('Corals::labels.update_title', ['title' => $guide->url ?? $guide->route])]);

        $guideConfigFields = $guide->getConfig('guide_config.fields');


        return view('utility-guide::guide.create_edit')->with(compact('guide', 'guideConfigFields'));
    }

    /**
     * @param GuideRequest $request
     * @param Guide $guide
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(GuideRequest $request, Guide $guide)
    {
        try {
            $this->guideService->update($request, $guide);

            flash(trans('Corals::messages.success.updated', ['item' => $this->title_singular]))->success();
        } catch (\Exception $exception) {
            log_exception($exception, Guide::class, 'update');
        }

        return redirectTo($this->resource_url);
    }

    /**
     * @param GuideRequest $request
     * @param Guide $guide
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(GuideRequest $request, Guide $guide)
    {
        try {
            $this->guideService->destroy($request, $guide);

            $message = ['level' => 'success', 'message' => trans('Corals::messages.success.deleted', ['item' => $this->title_singular])];
        } catch (\Exception $exception) {
            log_exception($exception, Guide::class, 'destroy');
            $message = ['level' => 'error', 'message' => $exception->getMessage()];
        }

        return response()->json($message);
    }

    /**
     * @param Request $request
     * @param $index
     * @param Guide $guide
     * @return array|string
     * @throws \Throwable
     */
    public function getGuideConfigFields(Request $request, $index, Guide $guide)
    {
        abort_if(! $request->ajax(), 404);

        $guideConfigFields = $guide->getConfig('guide_config.fields');

        return view('utility-guide::guide.partials.guide_config_fields')
            ->with(compact('index', 'guideConfigFields'))
            ->render();
    }
}
