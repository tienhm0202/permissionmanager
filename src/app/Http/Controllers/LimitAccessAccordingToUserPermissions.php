<?php

namespace Backpack\PermissionManager\app\Http\Controllers;

trait LimitAccessAccordingToUserPermissions {
    protected function denyAccessIfNoPermission() {
        $user = backpack_user();
        $permission = strtolower($this->crud->entity_name).'.'.$this->crud->getCurrentOperation();
        
        if (! $user->can($permission) && $user->id != 1  && !$user->hasRole("admin")) {
            $this->crud->denyAccess($this->crud->getCurrentOperation());
        }
    }
}