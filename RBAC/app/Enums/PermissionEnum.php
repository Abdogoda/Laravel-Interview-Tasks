<?php

namespace App\Enums;

enum PermissionEnum: string
{

    // User permissions
    case VIEW_USERS = 'view_users';
    case VIEW_USER = 'view_user';
    case CREATE_USER = 'create_user';
    case UPDATE_USER = 'update_user';
    case DELETE_USER = 'delete_user';


    // Role permissions
    case VIEW_ROLES = 'view_roles';
    case VIEW_ROLE = 'view_role';
    case CREATE_ROLE = 'create_role';
    case UPDATE_ROLE = 'update_role';
    case DELETE_ROLE = 'delete_role';

    // Permission permissions
    case VIEW_PERMISSIONS = 'view_permissions';
}
