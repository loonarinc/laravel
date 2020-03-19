<?php

namespace App\Http\Controllers\Admin;
use App\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    public function index()
    {
        $rss = Resources::all();
        return view('admin.resources', ['links' => $rss]);
    }
    public function edit(Resources $resource)
    {
        return view('admin.resourceEdit', [
            'resource' => $resource,
        ]);
    }
    public function destroy(Resources $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно удалён!');
    }

    public function update(Request $request, Resources $resources)
    {
        $this->saveData($request, $resources);
        return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно изменен!');
    }

    public function store(Request $request)
    {
        $this->saveData($request, new Resources());
        return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно создан!');
    }
    private function saveData(Request $request, Resources $resource)
    {
        $this->validate($request, Resources::rules(), [], Resources::attributeNames());
        $resource->fill($request->all());
        $resource->save();
    }
    public function create(Resources $resource)
    {
        return view('admin.resourceEdit', [
            'resource' => $resource,
        ]);
    }
}
