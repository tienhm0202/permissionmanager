<?php

namespace Backpack\PermissionManager\app\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailDomain implements Rule
{
        /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $email_domain = explode('@', $value)[1];
        return in_array($email_domain, (array) config('backpack.permissionmanager.email_allowed_domain'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $messages = [
            trans('pm.permissionmanager.not_allowed'),
            trans('pm.permissionmanager.email'),
            trans('pm.permissionmanager.domain'),
        ];
        return implode(' ', $messages);
    }
}