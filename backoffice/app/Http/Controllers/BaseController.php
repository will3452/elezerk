<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller {
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function setLoadRelations($relations) {
        $this->relations = $relations;
    }

    public function setValidators($validator) {
        $this->validators = $validator;
    }

    public function setUrlAfterCreate($url) {
        $this->url_after_create = $url;
    }

    public function setUrlAfterUpdate($url) {
        $this->url_after_update = $url;
    }

    public function index (Request $request) {
        $records = ($this->model)::get();

        if (isset($this->relations)) {
            $records->load($this->relations);
        }

        return view("$this->view".".index", compact('records'));
    }

    public function create(Request $request) {
        return view("$this->view" . ".create");
    }

    public function edit(Request $request, $id) {
        $record = ($this->model)::findOrFail($id);
        return view("$this->view" . ".edit", compact("record"));
    }

    public function store(Request $request) {
        $data = $request->all();

        if (isset($this->validators)) {
            $data = $request->validate($this->validators);
        }

        $record = ($this->model)::create($data);


        return isset($this->url_after_create) ? redirect($this->url_after_create) : back();
    }

    public function update(Request $request, $id) {
        $data = $request->all();

        if (isset($this->validators)) {
            $data = $request->validate($this->validators);
        }

        $record = ($this->model)::find($id)->update($data);

        return isset($this->url_after_update) ? redirect($this->url_after_update) : back();
    }
}
