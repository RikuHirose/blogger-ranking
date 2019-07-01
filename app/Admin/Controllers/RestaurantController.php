<?php

namespace App\Admin\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RestaurantController extends Controller
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
        $grid = new Grid(new Restaurant);

        $grid->id('Id');

        $grid->category('カテゴリ')->display(function ($category) {
            return $category['name'];
        });

        $grid->name('Name');
        $grid->description_title('Description title');
        $grid->description('Description');
        $grid->lunch_price_zone('Lunch price zone');
        $grid->dinner_price_zone('Dinner price zone');
        $grid->address('Address');
        $grid->nearest_station('Nearest station');
        $grid->nearest_station_minutes('Nearest station minutes');
        $grid->lat('Lat');
        $grid->lng('Lng');
        $grid->access('Access');
        $grid->opening_hours('Opening hours');
        $grid->regular_holiday('Regular holiday');
        $grid->seating_capacity('Seating capacity');
        $grid->hp_url('Hp url');
        $grid->fb_url('Fb url');
        $grid->tw_url('Tw url');
        $grid->ig_url('Ig url');
        $grid->tel('Tel');
        $grid->remarks('Remarks');
        $grid->admin_evaluate('Admin evaluate');
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
        $show = new Show(Restaurant::findOrFail($id));

        $show->id('Id');
        $show->category_id('Category id');
        $show->name('Name');
        $show->description_title('Description title');
        $show->description('Description');
        $show->lunch_price_zone('Lunch price zone');
        $show->dinner_price_zone('Dinner price zone');
        $show->address('Address');
        $show->nearest_station('Nearest station');
        $show->nearest_station_minutes('Nearest station minutes');
        $show->lat('Lat');
        $show->lng('Lng');
        $show->access('Access');
        $show->opening_hours('Opening hours');
        $show->regular_holiday('Regular holiday');
        $show->seating_capacity('Seating capacity');
        $show->hp_url('Hp url');
        $show->fb_url('Fb url');
        $show->tw_url('Tw url');
        $show->ig_url('Ig url');
        $show->tel('Tel');
        $show->remarks('Remarks');
        $show->admin_evaluate('Admin evaluate');
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
        $form = new Form(new Restaurant);

        $category_id_options = [];
        $tmp = Category::orderBy('id')->get(['id', 'name']);
        if ($tmp->isNotEmpty()) {
            $list = $tmp->all();
            foreach ($list as $v) {
                $category_id_options[$v->id] = $v->name;
            }
        }
        $form->select('category_id', 'カテゴリ')->options($category_id_options)->rules('required');

        $form->text('name', 'Name');
        $form->text('description_title', 'Description title');
        $form->textarea('description', 'Description');
        $form->text('lunch_price_zone', 'Lunch price zone');
        $form->text('dinner_price_zone', 'Dinner price zone');
        $form->text('address', 'Address');
        $form->text('nearest_station', 'Nearest station');
        $form->text('nearest_station_minutes', 'Nearest station minutes');
        $form->decimal('lat', 'Lat');
        $form->decimal('lng', 'Lng');
        $form->text('access', 'Access');
        $form->text('opening_hours', 'Opening hours');
        $form->text('regular_holiday', 'Regular holiday');
        $form->number('seating_capacity', 'Seating capacity');
        $form->url('hp_url', 'Hp url');
        $form->url('fb_url', 'Fb url');
        $form->url('tw_url', 'Tw url');
        $form->url('ig_url', 'Ig url');
        $form->mobile('tel', 'Tel');
        $form->text('remarks', 'Remarks');
        $form->number('admin_evaluate', 'admin_evaluate(0~5)')->min(0)->max(5);


        return $form;
    }
}
