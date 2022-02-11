<?php

namespace Backpack\PermissionManager\app\Http\Controllers;

trait LimitAccessAccordingToUserPermissions {
    protected function denyAccessIfNoPermission() {
        $user = backpack_user();
        $permission = strtolower($this->crud->entity_name).'.'.$this->crud->getCurrentOperation();

        $default_root_id = config('backpack.permissionmanager.default_root_id');
        $defautl_root_role = config('backpack.permissionmanager.default_root_role');
        
        if (! $user->can($permission) && $user->id != $default_root_id  && !$user->hasRole($defautl_root_role)) {
            $this->crud->denyAccess($this->crud->getCurrentOperation());
        }
    }
}