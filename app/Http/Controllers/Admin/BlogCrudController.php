<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BlogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BlogCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Blog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/blog');
        CRUD::setEntityNameStrings('blog', 'blogs');
        CRUD::filters();
        CRUD::enableExportButtons();
        CRUD::enableResponsiveTable();
    }

    /**
     *  Show
     */
    protected function setupShowOperation() {
        CRUD::set('show.setFromDb', false);
        CRUD::addColumn([
          'label' => "User", 
          'name' => 'user_id',
          'entity' => 'user', 
          'attribute' => "name", 
          'model' => "App\Models\User",
        ]);
        CRUD::column('title');
        CRUD::column('title_ar');
        CRUD::column('body');
        CRUD::column('body_ar');
        CRUD::addColumn([
          'label' => 'Hashtags',
          'type' => 'json',
          'name' => 'hashtags'
        ]); 
        CRUD::addColumn([
          'label' => "Images", 
          'type' => "image",
          'name' => 'image.image',
          'entity' => 'images', 
          'suffix' => ' images'
        ]);
        CRUD::column('meta_title');
        CRUD::column('meta_description');
        CRUD::column('slug');
        CRUD::column('Reviewed')->type('boolean');
        CRUD::column('Featured')->type('boolean');
        CRUD::column('Active')->type('boolean');  
        CRUD::column('updated_at');
        CRUD::column('created_at');
    }
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
          'label' => "User", 
          'type' => "select",
          'name' => 'user_id',
          'entity' => 'user', 
          'attribute' => "name", 
          'model' => "App\Models\User",
        ]);
        CRUD::column('title');
        CRUD::column('body');
        CRUD::addColumn([
          'label' => 'Hashtags',
          'type' => 'json',
          'name' => 'hashtags'
        ]); 
        CRUD::addColumn([
          'label' => "Images", 
          'type' => "relationship_count",
          'name' => 'images',
          'entity' => 'images', 
          'attribute' => "image", 
          'model' => "App\Models\BlogImage",
          'ajax'          => true,
          'inline_create' => true,
          'suffix' =>  ' images'
        ]);
        CRUD::column('meta_title');
        CRUD::column('meta_description');
        CRUD::column('slug');
        CRUD::addColumn([
            'name'        => 'is_featured',
            'label'       => 'Featured',
            'type'        => 'radio',
            'options'     => [
                0 => 'No',
                1 => 'Yes'
            ]
        ]);
        CRUD::addColumn([
            'name'        => 'active',
            'label'       => 'Active',
            'type'        => 'radio',
            'options'     => [
                0 => 'No',
                1 => 'Yes'
            ]
        ]);
        CRUD::column('created_at');
        CRUD::column('updated_at');

        CRUD::addClause('where', 'is_reviewed', 1);
        CRUD::orderBy('created_at', 'desc');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(BlogRequest::class);

        CRUD::addField([
          'label' => "Added by", 
          'type' => "select2",
          'name' => 'user_id',
          'entity' => 'user', 
          'attribute' => "name", 
          'model' => "App\Models\User",
        ]);
        CRUD::addField([
          'tab'   => 'SEO',
          'label' => 'Page Title En',
          'name' => 'meta_title'
        ]);
        CRUD::addField([
          'tab'   => 'SEO',
          'label' => 'Page Title Ar',
          'name' => 'meta_title_ar'
        ]);
        CRUD::addField([
          'tab'   => 'SEO',
          'label' => 'Page Description En',
          'name' => 'meta_description',
          'type' => 'textarea',
          'attributes' => [
            'rows' => 10,
          ]
        ]);
        CRUD::addField([
          'tab'   => 'SEO',
          'label' => 'Page Description Ar',
          'name' => 'meta_description_ar',
          'type' => 'textarea',
          'attributes' => [
            'rows' => 10,
          ]
        ]);
        CRUD::addField([
          'tab'   => 'SEO',
          'label' => 'Slug En',
          'name' => 'slug'
        ]);
        CRUD::addField([
          'tab'   => 'SEO',
          'label' => 'Slug Ar',
          'name' => 'slug_ar'
        ]);
        CRUD::addField([
          'label' => 'Title in En',
          'name' => 'title'
        ]);
        CRUD::addField([
          'label' => 'Title in Ar',
          'name' => 'title_ar',
        ]);
        CRUD::addField([
          'label' => 'Body in En',
          'name' => 'body',
          'type' => 'ckeditor',
          'attributes' => [
            'rows' => 15,
          ]
        ]);
        CRUD::addField([
          'label' => 'Body in Ar',
          'name' => 'body_ar',
          'type' => 'ckeditor',
          'attributes' => [
            'rows' => 15,
          ]
        ]);
        CRUD::addField([
          'label' => 'Hashtags',
          'name' => 'hashtags',
          'columns' => [
            'en' => 'En',
            'ar' => 'Ar'
          ],
        ]); 
        // CRUD::addField([
        //   'label' => "Images", 
        //   'type' => "image",
        //   'name' => 'images',
        //   'entity' => 'images', 
        //   'attribute' => "image", 
        //   'model' => "\App\Models\BlogImage",
        //   'upload' => true,
        //   'crop'   => true,
        //   'multiple'   => true,
        //   'mime_types' => ['image'],
        //   'aspect_ratio' => 1,
        //   'disk'      => 'local',
        //   'prefix'    => 'public/images/blogs/'
        // ]);
        CRUD::addField([
          'label' => 'Approved',
          'name' => 'is_reviewed',
          'type' => 'checkbox',
          'default' => 1
        ]); 
        CRUD::addField([
          'label' => 'Featured on the slider',
          'name' => 'is_featured',
          'type' => 'checkbox',
          'default' => 0
        ]); 
        CRUD::addField([
          'label' => 'Active on the blog',
          'name' => 'active',
          'type' => 'checkbox',
          'default' => 1
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
