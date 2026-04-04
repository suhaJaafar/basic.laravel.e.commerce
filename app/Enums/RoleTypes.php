<?php

namespace App\Enums;

enum RoleTypes : string
{
    case Admin = 'admin';
    case Provider = 'provider';
    case Customer = 'customer';
}
