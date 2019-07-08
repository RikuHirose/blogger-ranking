<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', __('Id'));
        $grid->column('image_id', __('Image id'));
        $grid->column('email', __('Email'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('last_mounth_sales', __('Last mounth sales'));
        $grid->column('last_mounth_pv', __('Last mounth pv'));
        $grid->column('blog_url', __('Blog url'));
        $grid->column('tw_url', __('Tw url'));
        $grid->column('ban', __('Ban'));
        $grid->column('first_login', __('First login'));
        $grid->column('remember_token', __('Remember token'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image_id', __('Image id'));
        $show->field('email', __('Email'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('last_mounth_sales', __('Last mounth sales'));
        $show->field('last_mounth_pv', __('Last mounth pv'));
        $show->field('blog_url', __('Blog url'));
        $show->field('tw_url', __('Tw url'));
        $show->field('ban', __('Ban'));
        $show->field('first_login', __('First login'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User);

        $form->number('image_id', __('Image id'));
        $form->email('email', __('Email'));
        $form->text('name', __('Name'));
        $form->text('description', __('Description'));
        $form->number('last_mounth_sales', __('Last mounth sales'));
        $form->number('last_mounth_pv', __('Last mounth pv'));
        $form->text('blog_url', __('Blog url'));
        $form->text('tw_url', __('Tw url'));
        $form->switch('ban', __('Ban'));
        $form->switch('first_login', __('First login'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
