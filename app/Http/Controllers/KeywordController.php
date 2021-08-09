<?php

namespace App\Http\Controllers;

use App\Keyword;
use App\Objekt;
use App\User;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\PdfToImage\Pdf;


class KeywordController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $group_id  =User::where('id',Auth::id())->first()->group_id;

        $group = Group::where('id', $group_id)->first();

        $group_name = $group->name;

        $data = DB::table('objekts')
            ->join('keywords', 'objekts.id', '=', 'keywords.object_id')
            ->join('users', 'objekts.user_id', '=', 'users.id')
            ->select('objekts.*', 'keywords.pages','users.name as username')
            ->get();





        // $data = Keyword::orderBy('id','DESC')->paginate(5);
            return view('keywords.index',compact('data','group_name'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $group_id  =User::where('id',Auth::id())->first()->group_id;

        $group = Group::where('id', $group_id)->first();

        $group_name = $group->name;



        $files = Storage::disk('public')->files('pdf2/'.$group->name);

        if (count($files) > 0) {
            foreach (Storage::disk('public')->files('pdf2/'.$group->name) as $filename) {
            // $file = Storage::disk('public')->get('/pdf2/2c8rG8cZzH8o0GLUSa3zB5oeKB5e3DYgHCaNWAmv.pdf');
            // do whatever with $file;
                 return view('keywords.create', compact('filename'));
        }

        }else{

         $data = DB::table('objekts')
            ->join('keywords', 'objekts.id', '=', 'keywords.object_id')

                       ->join('users', 'objekts.user_id', '=', 'users.id')
            ->select('objekts.*', 'keywords.pages','users.name as username')
            ->get();
                // $data = Keyword::orderBy('id','DESC')->paginate(5);
                return view('keywords.index',compact('data', 'group_name'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
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
        $name = $request->input('name');

        $path = ($request->input('filename'));

        $pdf = new Pdf('storage/'.$path);

       //File info

        $extension = pathinfo(storage_path('/storage/'.$path), PATHINFO_EXTENSION);


        $filesize = File::size(public_path('/storage/'.$path));


        $filename = pathinfo(storage_path('/storage/'.$path), PATHINFO_FILENAME);

        $filehash = sha1_file('storage/'.$path);

        // $path = public_path().'/images';
        // File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        $type = (File::isDirectory($path))?2:1;




        $pages_count = $pdf->getNumberOfPages();


        $object_id = $request->input('object');

                           //Group
        $group_id  = User::where('id',Auth::id())->first()->group_id;

        $group = Group::where('id', $group_id)->first();



        DB::transaction(function() use ($name,$object_id,$pages_count,$extension,$filename,$filehash,$group,$filesize,$type) {

            //User
            $user_id = Auth::id();

            $objekt = Objekt::create([
                'name' => $name ,
                'path' => 'processed/'.$group->name.'/'.$name.'_'.$object_id.'_'.$pages_count.'.pdf',
                'user_id' => $user_id,
                'extension' => $extension,
                'filename' => $filename.'.'. $extension,
                'version' => 1.0,
                'fileq' => $filehash,
                'uid' => Str::orderedUuid()->toString(),
                'type' => $type,
                'filesize' => $filesize,


            ]);

            $keyword = Keyword::create([
                'object_id' => $objekt->id,
                'name' => $name,
                'pages' => $pages_count,

            ]);
        });





        if (Storage::disk('public')->move($path , 'processed/'.$group->name.'/'.$name.'_'.$object_id.'_'.$pages_count.'.pdf')){



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
        // $keyword = Keyword::find($keyword->id)->first();

       $objekt = Objekt::where('id',$keyword->object_id)->first();







        return view('keywords.show',compact('objekt'));
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
