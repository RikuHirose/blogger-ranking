<?php

namespace App\Admin\Controllers;

use App\Models\SocialProvider;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SocialProviderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\SocialProvider';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SocialProvider);

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('provider_id', __('Provider id'));
        $grid->column('provider', __('Provider'));
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
        $show = new Show(SocialProvider::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('provider_id', __('Provider id'));
        $show->field('provider', __('Provider'));
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
        $form = new Form(new SocialProvider);

        $form->number('user_id', __('User id'));
        $form->text('provider_id', __('Provider id'));
        $form->text('provider', __('Provider'));

        return $form;
    }
}
