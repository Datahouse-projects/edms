<?php

namespace App\Http\Controllers;

use App\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToImage\Pdf;


class KeywordController extends Controller
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

        foreach (Storage::disk('public')->files('pdf2') as $filename) {
            // $file = Storage::disk('public')->get('/pdf2/2c8rG8cZzH8o0GLUSa3zB5oeKB5e3DYgHCaNWAmv.pdf');
            // do whatever with $file;

            return view('keywords.create', compact('filename'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        $keyword = new Keyword();

        $name = $request->input('name');

        $path = ($request->input('filename'));


        $pdf = new Pdf('storage/'.$path);

        // dd($pdf->getNumberOfPages());


        $pages_count = $pdf->getNumberOfPages();


        $object_id = $request->input('object');

        $keyword->name = $name;

        $keyword->pages =  $pages_count;

        $keyword->object_id = $object_id;

        $a = $keyword->save();

        if (Storage::disk('public')->move($path , 'processed/'.$name.'_'.$object_id.'_'.$pages_count.'.pdf')){

        }



        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function show(Keyword $keyword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyword $keyword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keyword $keyword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $keyword)
    {
        //
    }


}
