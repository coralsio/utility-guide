<?php

namespace Corals\Utility\Guide\Transformers;

use Corals\Foundation\Transformers\FractalPresenter;

class GuidePresenter extends FractalPresenter
{
    /**
     * @param array $extras
     * @return GuideTransformer|\League\Fractal\TransformerAbstract
     */
    public function getTransformer($extras = [])
    {
        return new GuideTransformer($extras);
    }
}
