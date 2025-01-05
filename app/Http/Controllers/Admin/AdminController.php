<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{

    protected $model;
    protected $controller_name;
    protected $module_name;
    protected $module_title;
    protected $method_name;
    protected $method_title;
    protected $module_actions = [];
    protected $admin_view = 'admin.pages';
    protected $method_view;
    protected $components_view;
    protected $uploads_folder;

    protected $image_width;
    protected $image_height;
    protected $image_ratio;

    protected $image_width1;
    protected $image_height1;
    protected $image_ratio1;

    protected $image_width2;
    protected $image_height2;
    protected $image_ratio2;

    protected $image_width3;
    protected $image_height3;
    protected $image_ratio3;
    
    protected $image_width4;
    protected $image_height4;
    protected $image_ratio4;

    protected $image_width5;
    protected $image_height5;
    protected $image_ratio5;



    protected $study_years;

    protected $index_route;

    protected $created_successfully;
    protected $updated_successfully;
    protected $deleted_successfully;
    protected $restored_successfully;
    protected $active_successfully;
    protected $inactive_successfully;
    protected $set_order_successfully;
    protected $save_successfully;

    protected $set_new_successfully;
    protected $set_not_new_successfully;
    protected $fail_set_new;
    protected $fail_set_not_new;

    protected $fail_created;
    protected $fail_updated;
    protected $fail_deleted;
    protected $fail_inactive;
    protected $fail_active;
    protected $fail_set_order;
    protected $fail_save;



    
    protected $not_in_nav_successfully;
    protected $in_nav_successfully;
    protected $fail_not_in_nav;
    protected $fail_in_nav;

    
    public function __construct(Model $model = null)
    {
        app()->setLocale('ar');
        $this->model = $model;
        $this->controller_name = $this->getControllerName();
        $this->module_name =  Str::snake(Str::plural($this->controller_name));
        $this->method_name = request()->route()->getActionMethod();
        $this->method_view = $this->admin_view . '.' . $this->module_name . '.' . $this->method_name;
        $this->components_view = 'admin.components';
        $this->uploads_folder = 'uploads';
        $this->module_actions = ['delete', 'create', 'active', 'edit',/*'delete','pdf','print','import','export'*/];

        $this->index_route = route($this->module_name . '.index');

        $this->module_title = trans($this->module_name . '.module_title');
        $this->method_title = $this->method_name == 'index' ? trans($this->module_name . '.module_title') : trans('admin.' . $this->method_name) . ' ' . trans($this->module_name . '.single');

        $this->created_successfully = trans('admin.created_successfully');
        $this->updated_successfully = trans('admin.updated_successfully');
        $this->deleted_successfully = trans('admin.deleted_successfully');
        $this->restored_successfully = trans('admin.restored_successfully');
        $this->active_successfully = trans('admin.active_successfully');
        $this->inactive_successfully = trans('admin.inactive_successfully');
        $this->set_order_successfully = trans('admin.set_order_successfully');
        $this->save_successfully = trans('admin.save_successfully');

        $this->fail_created = trans('admin.fail_created');
        $this->fail_updated = trans('admin.fail_updated');
        $this->fail_deleted = trans('admin.fail_deleted');
        $this->fail_inactive = trans('admin.fail_inactive');
        $this->fail_inactive = trans('admin.fail_inactive');
        $this->fail_inactive = trans('admin.fail_inactive');
        $this->fail_inactive = trans('admin.fail_inactive');
        $this->fail_set_order = trans('admin.fail_set_order');
        $this->fail_save = trans('admin.fail_save');

        $this->set_new_successfully = trans('admin.set_new_successfully');
        $this->set_not_new_successfully = trans('admin.set_not_new_successfully');
        $this->fail_set_new = trans('admin.fail_set_new');
        $this->fail_set_not_new = trans('admin.fail_set_not_new');

       

        // $menus = Menu::orderByRaw('-item_order DESC')->get();
        view()->share([
            'module_name' => $this->module_name,
            'module_title' => $this->module_title,
            'method_name' => $this->method_name,
            'method_title' => $this->method_title,
            'uploads_folder' => $this->uploads_folder,
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'image_ratio' => $this->image_ratio,
            'module_actions' => $this->module_actions,
            // 'menus' => $menus,

        ]);
    }

    public function index()
    {
    }


    public function create()
    {
        if (request()->ajax()) {
            $this->method_view = $this->admin_view . '.' . $this->module_name . '.form_modal';
        } else {
            $this->method_view = $this->admin_view . '.' . $this->module_name . '.form';
        }
        return view($this->method_view);
    }


    public function show(Request $request, $id)
    {
        $item = $this->model->withTrashed()->findOrFail($id);
        if ($request->ajax()) {
            return view($this->method_view . '.show_modal', compact('item'))->render();
        }
        return view($this->method_view, compact('item'));
    }

    public function edit($id)
    {

        if (request()->ajax()) {
            $this->method_view = $this->admin_view . '.' . $this->module_name . '.form_modal';
        } else {
            $this->method_view = $this->admin_view . '.' . $this->module_name . '.form';
        }
        $item = $this->model->withTrashed()->findOrFail($id);
        return view($this->method_view, compact('item'));
    }

    public function active(Request $request, $id)
    {
        if ($request->ajax()) {
            $save = false;
            $item = $this->model->withTrashed()->findOrFail($id);
            $item->status = !$item->status;

            $save = $item->save();

            if ($save) {
                //session()->flash('success', $item->status == 0 ? $this->inactive_successfully : $this->active_successfully);
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => $item->status == 0 ? $this->inactive_successfully : $this->active_successfully,
                        'item' => $item,
                    ]
                );
            } else {
                return response()->json(['status' => 'error', 'message' => $item->status == 0 ? $this->fail_inactive : $this->fail_active]);
                //session()->flash('success', $item->status == 0 ? $this->infail_active : $this->fail_active);
            }
        }
        return redirect($this->index_route);
    }

    public function set_order(Request $request, $id)
    {
        if ($request->ajax()) {
            $item = $this->model->withTrashed()->findOrFail($id);
            $item->item_order = $request->item_order;
            $save = $item->save();
            if ($save) {
                return response()->json(
                    [
                        'status' => 'success',
                        'message' =>  $this->set_order_successfully,
                        'item' => $item,
                    ]
                );
            } else {
                return response()->json(['status' => 'error', 'message' =>  $this->fail_set_order]);
            }
        }

        return redirect($this->index_route);
    }


    public function setAtHome(Request $request, $id)
    {
        if ($request->ajax()) {
            $save = false;
            $item = $this->model->withTrashed()->findOrFail($id);
            $item->at_home = !$item->at_home;

            $save = $item->save();

            if ($save) {
                //session()->flash('success', $item->status == 0 ? $this->inactive_successfully : $this->active_successfully);
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => $item->at_home == 0 ? $this->set_not_at_home_successfully : $this->set_at_home_successfully,
                        'item' => $item,
                    ]
                );
            } else {
                return response()->json(['status' => 'error', 'message' => $item->at_home == 0 ? $this->fail_set_at_home : $this->fail_set_not_at_home]);
                //session()->flash('success', $item->status == 0 ? $this->infail_active : $this->fail_active);
            }
        }
        return redirect($this->index_route);
    }
    public function destroy(Request $request, $id)
    {

        
        if ($request->ajax()) {
            
            if ($request->has('soft_delete')) {
                $item = $this->model::findOrFail($id);
                $item->timestamps = false;
                $deleted = $item->delete();
                if ($deleted) {
                    $item->deleted_by = 1; //auth()->user()->id;

                    $item->save();
                    $message = __($this->deleted_successfully);
                }
            } else {
                $item = $this->model::withTrashed()->find($id);
                $deleted = $item->forceDelete();
                if ($deleted) {
                    $this->delete_file('public_uploads', $this->module_name . '/' . $item->image);
                    $this->delete_file('public_uploads', $this->module_name . '/thumbs/' . $item->image);
                }
                $message = __($this->deleted_successfully);
            }
            if ($deleted) {
                return response()->json(['status' => 'success', 'message' => $message]);
            } else {
                return response()->json(['status' => 'error', 'message' => __($this->deleted_successfully)]);
            }
        }
        return redirect($this->index_route);
    }

    public function force_delete(Request $request, $id)
    {
        if ($request->ajax()) {

            $item = $this->model::findOrFail($id);
            $deleted = $item->delete();
            if ($deleted) {
                $this->delete_file('public_uploads', $this->module_name . '/' . $item->image);
                $this->delete_file('public_uploads', $this->module_name . '/thumbs/' . $item->image);
            }
            $message = __($this->deleted_successfully);

            if ($deleted) {
                return response()->json(['status' => 'success', 'message' => $message]);
            } else {
                return response()->json(['status' => 'error', 'message' => __($this->deleted_successfully)]);
            }
        }
        return redirect($this->index_route);
    }

    public function restore(Request $request, $id)
    {
        if ($request->ajax()) {
            $item = $this->model::withTrashed()->find($id);
            $item->deleted_by = null;
            $item->timestamps = false;
            $item->save();
            $restore = $item->restore();

            $message = __($this->restored_successfully);

            if ($restore) {
                $item->deleted_by = null;
                $item->save();
                return response()->json(['status' => 'success', 'message' => $message]);
            } else {
                return response()->json(['status' => 'error', 'message' => __($this->fail_deleted)]);
            }
        }
        return redirect($this->index_route);
    }

    public function delete_image(Request $request, $id)
    {

        if ($request->ajax()) {
            $item = $this->model::withTrashed()->findOrFail($id);

            $deleted = $deleted_thumb = false;

            if (Storage::disk('public_uploads')->has($this->module_name . '/' . $item->image)) {
                $deleted = Storage::disk('public_uploads')->delete($this->module_name . '/' . $item->image);
            }
            if (Storage::disk('public_uploads')->has($this->module_name . '/thumbs/' . $item->image)) {
                $deleted_thumb = Storage::disk('public_uploads')->delete($this->module_name . '/thumbs/' . $item->image);
            }
            if ($deleted || $deleted_thumb) {
                $item->update(['image' => null]);
                return response()->json(['status' => 'success', 'message' => __('admin.deleted_successfully')]);
            } else {
                return response()->json(['status' => 'error', 'message' => __('admin.fail_deleted')]);
            }
        }
        return redirect($this->index_route);
    }

    protected function upload_crop_image($item = null, $img = null)
    {
        $image = $img ?? request('image');
        if ($image) {
            //get file extension
            $extension = $image->getClientOriginalExtension();
            //filename to store
            $filenametostore = $this->module_name . '_' . time() . '.' . $extension;

            if (!file_exists(public_path($this->uploads_folder))) {
                mkdir(public_path($this->uploads_folder), 0755);
            }

            if (!file_exists(public_path($this->uploads_folder . '/' . $this->module_name))) {
                mkdir(public_path($this->uploads_folder . '/' . $this->module_name), 0755);
            }

            $img = Image::make($image)->save(public_path($this->uploads_folder . '/' . $this->module_name . '/' . $filenametostore));
            $crop_path = public_path($this->uploads_folder . '/' . $this->module_name . '/' . $filenametostore);
            $img->crop(intval(request()->input('w')), intval(request()->input('h')), intval(request()->input('x1')), intval(request()->input('y1')));
            $img->save($crop_path);

            if ($img) {
                if (!file_exists(public_path($this->uploads_folder . '/' . $this->module_name . '/thumbs'))) {
                    mkdir(public_path($this->uploads_folder . '/' . $this->module_name . '/thumbs'), 0755);
                }
                // crop image
                $thumb_path = public_path($this->uploads_folder . '/' . $this->module_name . '/thumbs/' . $filenametostore);
                Image::make($img)->resize($this->image_width, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($thumb_path);

                if ($item) {
                    $this->delete_file('public_uploads', $this->module_name . '/' . $item->image);
                    $this->delete_file('public_uploads', $this->module_name . '/thumbs/' . $item->image);
                }
                return $filenametostore;
            }
        }
        return false;
    }

    protected function delete_file($disk, $file)
    {
        if (Storage::disk($disk)->has($file)) {
            return Storage::disk($disk)->delete($file);
        }
        return false;
    }

    protected function getControllerName()
    {
        return str_replace('Controller', '', class_basename($this));
    }

    /* Other Images */
    public function create_other_image($id)
    {
        $item = $this->model::find($id);
        return view('admin.images.create_image', compact('item'));
    }


    public function delete_other_image(Request $request, $id)
    {

        if ($request->ajax()) {
            $item = \App\Models\Image::find($id);

            $deleted = $deleted_thumb = false;

            if (Storage::disk('public_uploads')->has($this->module_name . '/' . $item->image)) {
                $deleted = Storage::disk('public_uploads')->delete($this->module_name . '/' . $item->image);
            }
            if (Storage::disk('public_uploads')->has($this->module_name . '/thumbs/' . $item->image)) {
                $deleted_thumb = Storage::disk('public_uploads')->delete($this->module_name . '/thumbs/' . $item->image);
            }

            $item->forceDelete();
            return response()->json(['status' => 'success', 'message' => __('admin.deleted_successfully')]);

        }
        return redirect($this->index_route);
    }

    public function store_other_image()
    {
        $item_id = request('item_id');
        $item = $this->model::find($item_id);
        $data['created_by'] = auth()->user()->id;
        $img_name = $this->upload_crop_image();
        if ($img_name) {
            $data['image'] = $img_name;
        }

        $item->imageable()->create($data);
        session()->flash('success', $this->created_successfully);
        return redirect($this->index_route);
    }

    public function show_other_images($id)
    {

        $item = $this->model::find($id);
        $this->method_title = 'صور : ' . $item->title;

        return view('admin.images.show_images', compact('item'))
            ->with('method_title', $this->method_title);
    }
}
