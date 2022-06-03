<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Category;
use App\Models\Template;
use App\Models\Group;
use App\Models\Lead;
use App\Models\User;
use App\Models\LeadCategory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Category
Breadcrumbs::for('category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Category', route('category.index'));
});

// Category > Create
Breadcrumbs::for('category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('category.index');
    $trail->push('Create', route('category.create'));
});

// Category > Edit
Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('category.index', $category);
    $trail->push('Edit', route('category.edit', $category));
});


// Template
Breadcrumbs::for('template.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Template', route('template.index'));
});

// Template > Create
Breadcrumbs::for('template.create', function (BreadcrumbTrail $trail) {
    $trail->parent('template.index');
    $trail->push('Create', route('template.create'));
});

// Template > Edit 
Breadcrumbs::for('template.edit', function (BreadcrumbTrail $trail, Template $template) {
    $trail->parent('template.index', $template);
    $trail->push('Edit', route('template.edit', $template));
});

// Group
Breadcrumbs::for('groups.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Group', route('groups.index'));
});

// Group > Create
Breadcrumbs::for('groups.create', function (BreadcrumbTrail $trail) {
    $trail->parent('groups.index');
    $trail->push('Create', route('groups.create'));
});

// Group > Edit 
Breadcrumbs::for('groups.edit', function (BreadcrumbTrail $trail, Group $groups) {
    $trail->parent('groups.index', $groups);
    $trail->push('Edit', route('groups.edit', $groups));
});

// Leads
Breadcrumbs::for('leads.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Leads', route('leads.index'));
});

// Leads > Create
Breadcrumbs::for('leads.create', function (BreadcrumbTrail $trail) {
    $trail->parent('leads.index');
    $trail->push('Create', route('leads.create'));
});

// Leads > Edit 
Breadcrumbs::for('leads.edit', function (BreadcrumbTrail $trail, Lead $leads) {
    $trail->parent('leads.index', $leads);
    $trail->push('Edit', route('leads.edit', $leads));
});

// Users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});

// Users > Create
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Create', route('users.create'));
});

// Users > Edit 
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users.index', $user);
    $trail->push('Edit', route('users.edit', $user));
});

// Roles
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

// Roles > Create
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Create', route('roles.create'));
});

// Roles > Edit 
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('roles.index', $role);
    $trail->push('Edit', route('roles.edit', $role));
});

// Permission
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Permission', route('permissions.index'));
});

// Permission > Create
Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push('Create', route('permissions.create'));
});

// Permission > Edit 
Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('permissions.index', $permission);
    $trail->push('Edit', route('permissions.edit', $permission));
});

// LeadCategory
Breadcrumbs::for('leadscategory.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Lead Category', route('leadscategory.index'));
});

// LeadCategory > Create
Breadcrumbs::for('leadscategory.create', function (BreadcrumbTrail $trail) {
    $trail->parent('leadscategory.index');
    $trail->push('Create', route('leadscategory.create'));
});

// LeadCategory > Edit 
Breadcrumbs::for('leadscategory.edit', function (BreadcrumbTrail $trail, LeadCategory $leadscategory) {
    $trail->parent('leadscategory.index', $leadscategory);
    $trail->push('Edit', route('leadscategory.edit', $leadscategory));
});

// Emails
Breadcrumbs::for('emails.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Email', route('emails.index'));
});

// Emails > Create
Breadcrumbs::for('emails.create', function (BreadcrumbTrail $trail) {
    $trail->parent('emails.index');
    $trail->push('Compose', route('emails.create'));
});

// EmailScheduler
Breadcrumbs::for('emailscheduler.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('EmailScheduler', route('emails.index'));
});

// EmailScheduler > Create
Breadcrumbs::for('emailscheduler.create', function (BreadcrumbTrail $trail) {
    $trail->parent('emailscheduler.index');
    $trail->push('Compose', route('emailscheduler.create'));
});