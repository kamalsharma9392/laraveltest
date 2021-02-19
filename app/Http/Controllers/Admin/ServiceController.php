<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = Service::paginate();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $service  = new Service;
        $categories = Category::all();
        return view('admin.services._form',compact('service','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required|unique:services,slug',
            'categories' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->only(['title','slug','categories','description','price','image','status']);
        if ($request->has('image')) {
            $params['image'] = $this->uploadOne($params['image'], 'services');
        }

        $service = new Service($params);
        $service->save();

        if ($request->has('categories')) {
            $service->categories()->sync($params['categories']);
        }
        Session::flash('status','Service has been created successfully');
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Service $service)
    {
        if($service->status=='Active') {
            $service->status = '0';
        }else{
            $service->status = '1';
        }
        $service->save();
        Session::flash('status','Service has been updated successfully');
        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services._form',compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required|unique:services,slug,'.$service->id,
            'categories' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->only(['title','slug','categories','description','price','image','status']);
        if ($request->has('image')) {
            $params['image'] = $this->uploadOne($params['image'], 'services');
        }else{
            $params['image'] = $service->image;
        }

        $service->update($params);

        if ($request->has('categories')) {
            $service->categories()->sync($params['categories']);
        }
        Session::flash('status','Service has been updated successfully');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->categories()->detach();
        $service->delete();

        Session::flash('status','Service has been removed successfully');
        return redirect()->route('services.index');
    }

    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : Str::random(25);
        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            $disk
        );
    }

    /**
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($path = null, $disk = 'public'){
        Storage::disk($disk)->delete($path);
    }
}
