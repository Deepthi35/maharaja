<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        if (Permission::where('name', 'permissions')->first() == null) {
            Permission::create(['name' => 'permissions', 'type' => 1]);
            Permission::create(['name' => 'add-permissions']);
            Permission::create(['name' => 'edit-permissions']);
            Permission::create(['name' => 'delete-permissions']);
            Permission::create(['name' => 'view-permissions']);
            Permission::create(['name' => 'publish-permissions']);
        }

        if (Permission::where('name', 'roles')->first() == null) {
            Permission::create(['name' => 'roles', 'type' => 1]);
            Permission::create(['name' => 'add-roles']);
            Permission::create(['name' => 'edit-roles']);
            Permission::create(['name' => 'delete-roles']);
            Permission::create(['name' => 'view-roles']);
            Permission::create(['name' => 'publish-roles']);
        }

        if (Permission::where('name', 'users')->first() == null) {
            Permission::create(['name' => 'users', 'type' => 1]);
            Permission::create(['name' => 'add-users']);
            Permission::create(['name' => 'edit-users']);
            Permission::create(['name' => 'delete-users']);
            Permission::create(['name' => 'view-users']);
            Permission::create(['name' => 'publish-users']);
        }

        if (Permission::where('name', 'application-setting-types')->first() == null) {
            Permission::create(['name' => 'application-setting-types', 'type' => 1]);
            Permission::create(['name' => 'add-application-setting-types']);
            Permission::create(['name' => 'edit-application-setting-types']);
            Permission::create(['name' => 'delete-application-setting-types']);
            Permission::create(['name' => 'view-application-setting-types']);
            Permission::create(['name' => 'publish-application-setting-types']);
        }

        if (Permission::where('name', 'application-setting-categories')->first() == null) {
            Permission::create(['name' => 'application-setting-categories', 'type' => 1]);
            Permission::create(['name' => 'add-application-setting-categories']);
            Permission::create(['name' => 'edit-application-setting-categories']);
            Permission::create(['name' => 'delete-application-setting-categories']);
            Permission::create(['name' => 'view-application-setting-categories']);
            Permission::create(['name' => 'publish-application-setting-categories']);
        }

        if (Permission::where('name', 'application-settings')->first() == null) {
            Permission::create(['name' => 'application-settings', 'type' => 1]);
            Permission::create(['name' => 'add-application-settings']);
            Permission::create(['name' => 'edit-application-settings']);
            Permission::create(['name' => 'delete-application-settings']);
            Permission::create(['name' => 'view-application-settings']);
            Permission::create(['name' => 'publish-application-settings']);
        }

        if (Permission::where('name', 'slider')->first() == null) {
            Permission::create(['name' => 'slider', 'type' => 1]);
            Permission::create(['name' => 'add-slider']);
            Permission::create(['name' => 'edit-slider']);
            Permission::create(['name' => 'delete-slider']);
            Permission::create(['name' => 'view-slider']);
            Permission::create(['name' => 'publish-slider']);
        }

        if (Permission::where('name', 'cms')->first() == null) {
            Permission::create(['name' => 'cms', 'type' => 1]);
            Permission::create(['name' => 'add-cms']);
            Permission::create(['name' => 'edit-cms']);
            Permission::create(['name' => 'delete-cms']);
            Permission::create(['name' => 'view-cms']);
            Permission::create(['name' => 'publish-cms']);
        }

        if (Permission::where('name', 'service-categories')->first() == null) {
            Permission::create(['name' => 'service-categories', 'type' => 1]);
            Permission::create(['name' => 'add-service-categories']);
            Permission::create(['name' => 'edit-service-categories']);
            Permission::create(['name' => 'delete-service-categories']);
            Permission::create(['name' => 'view-service-categories']);
            Permission::create(['name' => 'publish-service-categories']);
        }

        if (Permission::where('name', 'services')->first() == null) {
            Permission::create(['name' => 'services', 'type' => 1]);
            Permission::create(['name' => 'add-services']);
            Permission::create(['name' => 'edit-services']);
            Permission::create(['name' => 'delete-services']);
            Permission::create(['name' => 'view-services']);
            Permission::create(['name' => 'publish-services']);
        }

        if (Permission::where('name', 'clientele_categories')->first() == null) {
            Permission::create(['name' => 'clientele_categories', 'type' => 1]);
            Permission::create(['name' => 'add-clientele_categories']);
            Permission::create(['name' => 'edit-clientele_categories']);
            Permission::create(['name' => 'delete-clientele_categories']);
            Permission::create(['name' => 'view-clientele_categories']);
            Permission::create(['name' => 'publish-clientele_categories']);
        }

        if (Permission::where('name', 'clienteles')->first() == null) {
            Permission::create(['name' => 'clienteles', 'type' => 1]);
            Permission::create(['name' => 'add-clienteles']);
            Permission::create(['name' => 'edit-clienteles']);
            Permission::create(['name' => 'delete-clienteles']);
            Permission::create(['name' => 'view-clienteles']);
            Permission::create(['name' => 'publish-clienteles']);
        }

        if (Permission::where('name', 'blog_categories')->first() == null) {
            Permission::create(['name' => 'blog_categories', 'type' => 1]);
            Permission::create(['name' => 'add-blog_categories']);
            Permission::create(['name' => 'edit-blog_categories']);
            Permission::create(['name' => 'delete-blog_categories']);
            Permission::create(['name' => 'view-blog_categories']);
            Permission::create(['name' => 'publish-blog_categories']);
        }
        if (Permission::where('name', 'blog_posts')->first() == null) {
            Permission::create(['name' => 'blog_posts', 'type' => 1]);
            Permission::create(['name' => 'add-blog_posts']);
            Permission::create(['name' => 'edit-blog_posts']);
            Permission::create(['name' => 'delete-blog_posts']);
            Permission::create(['name' => 'view-blog_posts']);
            Permission::create(['name' => 'publish-blog_posts']);
        }

        if (Permission::where('name', 'testimonial_categories')->first() == null) {
            Permission::create(['name' => 'testimonial_categories', 'type' => 1]);
            Permission::create(['name' => 'add-testimonial_categories']);
            Permission::create(['name' => 'edit-testimonial_categories']);
            Permission::create(['name' => 'delete-testimonial_categories']);
            Permission::create(['name' => 'view-testimonial_categories']);
            Permission::create(['name' => 'publish-testimonial_categories']);
        }

        if (Permission::where('name', 'testimonials')->first() == null) {
            Permission::create(['name' => 'testimonials', 'type' => 1]);
            Permission::create(['name' => 'add-testimonials']);
            Permission::create(['name' => 'edit-testimonials']);
            Permission::create(['name' => 'delete-testimonials']);
            Permission::create(['name' => 'view-testimonials']);
            Permission::create(['name' => 'publish-testimonials']);
        }

        if (Permission::where('name', 'statistics')->first() == null) {
            Permission::create(['name' => 'statistics', 'type' => 1]);
            Permission::create(['name' => 'add-statistics']);
            Permission::create(['name' => 'edit-statistics']);
            Permission::create(['name' => 'delete-statistics']);
            Permission::create(['name' => 'view-statistics']);
            Permission::create(['name' => 'publish-statistics']);
        }
        if (Permission::where('name', 'product_categories')->first() == null) {
            Permission::create(['name' => 'product_categories', 'type' => 1]);
            Permission::create(['name' => 'add-product_categories']);
            Permission::create(['name' => 'edit-product_categories']);
            Permission::create(['name' => 'delete-product_categories']);
            Permission::create(['name' => 'view-product_categories']);
            Permission::create(['name' => 'publish-product_categories']);
        }
        if (Permission::where('name', 'products')->first() == null) {
            Permission::create(['name' => 'products', 'type' => 1]);
            Permission::create(['name' => 'add-products']);
            Permission::create(['name' => 'edit-products']);
            Permission::create(['name' => 'delete-products']);
            Permission::create(['name' => 'view-products']);
            Permission::create(['name' => 'publish-products']);
        }

        if (Permission::where('name', 'team_categories')->first() == null) {
            Permission::create(['name' => 'team_categories', 'type' => 1]);
            Permission::create(['name' => 'add-team_categories']);
            Permission::create(['name' => 'edit-team_categories']);
            Permission::create(['name' => 'delete-team_categories']);
            Permission::create(['name' => 'view-team_categories']);
            Permission::create(['name' => 'publish-team_categories']);
        }

        if (Permission::where('name', 'teams')->first() == null) {
            Permission::create(['name' => 'teams', 'type' => 1]);
            Permission::create(['name' => 'add-teams']);
            Permission::create(['name' => 'edit-teams']);
            Permission::create(['name' => 'delete-teams']);
            Permission::create(['name' => 'view-teams']);
            Permission::create(['name' => 'publish-teams']);
        }

        if (Permission::where('name', 'faq_categories')->first() == null) {
            Permission::create(['name' => 'faq_categories', 'type' => 1]);
            Permission::create(['name' => 'add-faq_categories']);
            Permission::create(['name' => 'edit-faq_categories']);
            Permission::create(['name' => 'delete-faq_categories']);
            Permission::create(['name' => 'view-faq_categories']);
            Permission::create(['name' => 'publish-faq_categories']);
        }

        if (Permission::where('name', 'faqs')->first() == null) {
            Permission::create(['name' => 'faqs', 'type' => 1]);
            Permission::create(['name' => 'add-faqs']);
            Permission::create(['name' => 'edit-faqs']);
            Permission::create(['name' => 'delete-faqs']);
            Permission::create(['name' => 'view-faqs']);
            Permission::create(['name' => 'publish-faqs']);
        }

        // create roles and assign created permissions
        if (Role::where('name', 'Developer Admin')->first() == null) {
            $role = Role::create(['name' => 'Developer Admin']);
            $role->givePermissionTo(Permission::all());
        } else {
            $role = Role::where('name', 'Developer Admin')->first();
            $role->givePermissionTo(Permission::all());
        }
    }
}