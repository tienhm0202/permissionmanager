<?php

namespace Backpack\PermissionManager\app\Http\Controllers;

trait LimitAccessAccordingToUserPermissions {
    protected function denyAccessIfNoPermission() {
        $user = backpack_user();
        $permission = $this->crud->entity_name.'.'.$this->crud->getCurrentOperation();
        
        if (! $user->can($permission)) {
            $this->crud->denyAccess($this->crud->getCurrentOperation());
        }
    }
}