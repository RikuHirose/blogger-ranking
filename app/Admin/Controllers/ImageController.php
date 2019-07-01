<?php

namespace App\Admin\Controllers;

use App\Models\Image;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ImageController extends Controller
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
        $grid = new Grid(new Image);

        $grid->id('Id');
        $grid->url('Url');
        $grid->title('Title');
        $grid->entity_type('Entity type');
        $grid->s3_key('S3 key');
        $grid->s3_bucket('S3 bucket');
        $grid->s3_region('S3 region');
        $grid->s3_extension('S3 extension');
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
        $show = new Show(Image::findOrFail($id));

        $show->id('Id');
        $show->url('Url');
        $show->title('Title');
        $show->entity_type('Entity type');
        $show->s3_key('S3 key');
        $show->s3_bucket('S3 bucket');
        $show->s3_region('S3 region');
        $show->s3_extension('S3 extension');
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
        $form = new Form(new Image);

        $form->image('url')->uniqueName();

        $form->text('title', 'Title')->placeholder('Please input image title ex) ウダガワ 成ル_1');
        $form->text('entity_type', 'Entity type')->default('');
        $form->text('s3_key', 'S3 key')->default(config('filesystems.disks.s3.key'))->attribute(['readOnly'=>'true']);
        $form->text('s3_bucket', 'S3 bucket')->default(config('filesystems.disks.s3.bucket'))->attribute(['readOnly'=>'true']);
        $form->text('s3_region', 'S3 region')->default(config('filesystems.disks.s3.region'))->attribute(['readOnly'=>'true']);
        $form->text('s3_extension', 'S3 extension');

        return $form;
    }
}
