<?php

namespace Corals\Modules\Utility\Guide\Policies;

use Corals\Foundation\Policies\BasePolicy;
use Corals\Modules\Utility\Guide\Models\Guide;
use Corals\User\Models\User;

class GuidePolicy extends BasePolicy
{
    protected $administrationPermission = 'Administrations::admin.utility';

    /**
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        if ($user->can('UtilityGuide::guide.view')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('UtilityGuide::guide.create');
    }

    /**
     * @param User $user
     * @param Guide $guide
     * @return bool
     */
    public function update(User $user, Guide $guide)
    {
        if ($user->can('UtilityGuide::guide.update')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @param Guide $guide
     * @return bool
     */
    public function destroy(User $user, Guide $guide)
    {
        if ($user->can('UtilityGuide::guide.delete')) {
            return true;
        }

        return false;
    }
}
