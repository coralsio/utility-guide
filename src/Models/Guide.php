<?php

namespace Corals\Modules\Utility\Guide\Models;

use Corals\Foundation\Models\BaseModel;
use Corals\Foundation\Traits\ModelPropertiesTrait;
use Corals\Foundation\Transformers\PresentableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Guide extends BaseModel
{
    use PresentableTrait;
    use LogsActivity;
    use ModelPropertiesTrait;

    /**
     *  Model configuration.
     * @var string
     */
    public $config = 'utility-guide.models.guide';

    protected $table = 'utility_guides';

    protected $casts = [
        'properties' => 'json',
    ];

    public $guarded = ['id'];
}
