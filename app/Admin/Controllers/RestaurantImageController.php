<?php

namespace App\Admin\Controllers;

use App\Models\RestaurantImage;
use App\Models\Image;
use App\Models\Restaurant;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RestaurantImageController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RestaurantImage);

        $grid->id('Id');
        $grid->image_id('Image id');
        $grid->restaurant_id('Restaurant id');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(RestaurantImage::findOrFail($id));

        $show->id('Id');
        $show->image_id('Image id');
        $show->restaurant_id('Restaurant id');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RestaurantImage);

        $image_id_options = [];
        $tmp = Image::orderBy('id')->get(['id', 'title']);
        if ($tmp->isNotEmpty()) {
            $list = $tmp->all();
            foreach ($list as $v) {
                if ($v->title == null) {
                    $image_id_options[$v->id] = $v->id;
                } else {
                    $image_id_options[$v->id] = $v->title;
                }
            }
        }
        $form->select('image_id', 'Image id')->options($image_id_options)->rules('required');

        $restaurant_id_options = [];
        $tmp = Restaurant::orderBy('id')->get(['id', 'name']);
        if ($tmp->isNotEmpty()) {
            $list = $tmp->all();
            foreach ($list as $v) {
                $restaurant_id_options[$v->id] = $v->name;
            }
        }
        $form->select('restaurant_id', 'Restaurant id')->options($restaurant_id_options)->rules('required');


        return $form;
    }
}
