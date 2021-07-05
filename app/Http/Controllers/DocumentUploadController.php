<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class DocumentUploadController extends Controller
{
     public function index()
     {
        return view('file-upload');
     }

     public function store(Request $request)
     {

        $validatedData = $request->validate([
         'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
         'name' => 'required',

        ]);



            // calculate hash of a file
       $filehash = sha1_file( request()->file('file')->path() );

       if (Document::where('fileq', $filehash)->exists()) {
   // post with the same slug already exists
        }



        $path = $request->file('file')->store('documents');

        //dd( $path);

        $name = pathinfo('file', PATHINFO_FILENAME); // file

        $shortname = $request->input('name');








    //search for file in database and block same file upload (Files is Elequent model)
    // if( Document::where('hash', $fileHash)->firstOrNull() != null) {
    //     abort(400); // abort upload
    // }

    // do something with file and save hash to DB


        $filename = $request->file('file')->getClientOriginalName();

        $extension = $request->file('file')->getClientOriginalExtension();

        // $user_id = $request->user()->id;
        $user_id = 1;

        $metadata = new Document;



        $metadata->name = $shortname ;
        $metadata->path = $path;
        $metadata->user_id = $user_id;
        $metadata->extension = $extension;
        $metadata->filename = $filename;
        $metadata->version = 1.0 ;
        $metadata->fileq = $filehash;


        $a = $metadata->save();



        return redirect('file-upload')->with('success', 'File Has been uploaded successfully in laravel 8');

      }


}
