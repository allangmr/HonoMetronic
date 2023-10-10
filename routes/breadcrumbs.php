<?php

use App\Models\Patient;
use App\Models\Procedure;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;



// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});

// Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});

// Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Dashboard > User Management > Permission
Breadcrumbs::for('user-management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Permissions', route('user-management.permissions.index'));
});

// Dashboard > Patients
Breadcrumbs::for('patients.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pacientes', route('patients.index'));
});

// Dashboard > Patients > [Patient]
Breadcrumbs::for('patients.show', function (BreadcrumbTrail $trail, Patient $patient) {
    $trail->parent('patients.index');
    $trail->push(ucwords($patient->name), route('patients.show', $patient));
});

// Dashboard > Procedures > [Procedure]
Breadcrumbs::for('procedures.show', function (BreadcrumbTrail $trail, Procedure $procedure) {
    $trail->parent('procedures.index');
    $trail->push(ucwords($procedure->name), route('procedures.show', $procedure));
});
