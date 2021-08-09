<?php

namespace App\Http\Controllers;

use App\Field;
use App\Form;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Field::all();
        return view('fields.index',compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $form_id = $request->input('form_id');


        return view('fields.create',compact('form_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

                        'form_id' => 'required',
                        'name' => 'required',
                        'label' => 'required',
                        'input_type' => 'required',
                        'variable_name' => 'required',
                        'variable_type' => 'required',


        ]);


        $form_id = $request->input('form_id');
        $name = strtolower($request->input('name'));
        $label = ucfirst($request->input('label'));
        $input_type = strtolower($request->input('input_type'));
        $variable_name = strtolower($request->input('variable_name'));
        $variable_type = strtolower($request->input('variable_type'));
        $variable_length = $request->input('variable_length');


        $field = new Field;

        $field->form_id = $form_id;
        $field->name = $name;
        $field->label = $label;
        $field->input_type = $input_type;
        $field->variable_name = $variable_name;
        $field->variable_type = $variable_type;
        $field->variable_length = $variable_length;

        $field->save();


        return redirect('forms')->with('status', 'Form has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        //
    }
}
