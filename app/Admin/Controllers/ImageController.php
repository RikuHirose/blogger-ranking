<?php

namespace App\Admin\Controllers;

use App\Models\Image;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ImageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Image';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Image);

        $grid->column('id', __('Id'));
        $grid->column('url', __('Url'));
        $grid->column('title', __('Title'));
        $grid->column('entity_type', __('Entity type'));
        $grid->column('s3_key', __('S3 key'));
        $grid->column('s3_bucket', __('S3 bucket'));
        $grid->column('s3_region', __('S3 region'));
        $grid->column('s3_extension', __('S3 extension'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Image::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('url', __('Url'));
        $show->field('title', __('Title'));
        $show->field('entity_type', __('Entity type'));
        $show->field('s3_key', __('S3 key'));
        $show->field('s3_bucket', __('S3 bucket'));
        $show->field('s3_region', __('S3 region'));
        $show->field('s3_extension', __('S3 extension'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Image);

        $form->url('url', __('Url'));
        $form->textarea('title', __('Title'));
        $form->text('entity_type', __('Entity type'));
        $form->text('s3_key', __('S3 key'));
        $form->text('s3_bucket', __('S3 bucket'));
        $form->text('s3_region', __('S3 region'));
        $form->text('s3_extension', __('S3 extension'));

        return $form;
    }
}
