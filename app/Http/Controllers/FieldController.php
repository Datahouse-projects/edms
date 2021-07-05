<?php

namespace App\Http\Controllers;

use App\Field;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                        'label' => 'required',
                        'input_type' => 'required',
                        'variable_name' => 'required',
                        'variable_type' => 'required',


        ]);



        $form_id = $request->input('form_id');
        $label = strtolower($request->input('label'));
        $input_type = strtolower($request->input('label'));
        $variable_name = strtolower($request->input('label'));
        $variable_type = strtolower($request->input('label'));


        $field = new Field;

        $field->form_id = $form_id;

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
