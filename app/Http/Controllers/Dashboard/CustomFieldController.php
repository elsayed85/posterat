<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomField;
use Illuminate\Http\Request;

class CustomFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//         $customfields = CustomField::with(['category' => function ($query) {
//             $query->where('id', '<>',1);
//    }])->latest()->paginate(20);
         $customfields = CustomField::latest()->paginate(20);
//        dd($customfields);
        return view('dashboard.customfields.index',compact('customfields') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = Category::where('id', '<>',1)->get(['id','title_ar','title_en']);
        //$input_types =$this->inputOptions;
        $input_types = config('customfields.fields'); //dd($input_types);
        return view('dashboard.customfields.create',compact('input_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->merge(['user_id' => auth()->user()->id]);

//        if($request->has('input_options') && $request->input_options != ''){
//            $input_options = explode(',',$request->input_options);
//            $request = $request->merge(['input_options' => $input_options]);
//        }
if($request->has('mytext_ar') && $request->has('mytext_en') && $request->mytext_ar != '' && $request->mytext_en != ''){
    $input_options=[];

    for ($i = 0; $i < count($request->mytext_ar) ;$i++){
        $input_options[$i+1] = ['ar'=>$request->mytext_ar[$i],'en'=>$request->mytext_en[$i]];
    }
    //dd($input_options);

            $request = $request->merge(['input_options' => $input_options]);
        }

        CustomField::create($request->all());

        return redirect()->route('dashboard.customfields.index')
            ->with('status','created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customfield =CustomField::findOrFail($id);
  $categories = Category::where('id', '<>',1)->get(['id','title_ar','title_en']);

        return view('dashboard.customfields.show',compact('customfield','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customfield = CustomField::findOrFail($id);
//        $categories = Category::where('id', '<>',1)->get(['id','title_ar','title_en']);
       // $input_types =$this->inputOptions;
        $input_types = config('customfields.fields');
        return view('dashboard.customfields.edit',compact('customfield','input_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = $request->merge(['user_id' => auth()->user()->id]);
//        if($request->has('input_options') && $request->input_options != ''){
//            $input_options = explode(',',$request->input_options);
//            $request = $request->merge(['input_options' => $input_options]);
//        }
        if($request->has('mytext_ar') && $request->has('mytext_en') && $request->mytext_ar != '' && $request->mytext_en != ''){
            $input_options=[];
            //dd( count($request->mytext_ar));
            for ($i = 0; $i < count($request->mytext_ar) ;$i++){
                $input_options[$i+1] = ['ar'=>$request->mytext_ar[$i],'en'=>$request->mytext_en[$i]];
            }
            //dd($input_options);

            $request = $request->merge(['input_options' => $input_options]);
        }
        $customfield = CustomField::findOrFail($id);
        $customfield->update($request->all());

        return redirect()->route('dashboard.customfields.index')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customfield = CustomField::findOrFail($id);
        $customfield->delete();
        return redirect()->route('dashboard.customfields.index')->with('status','deleted successfully');
    }
  //  private $inputOptions=['checkbox','select','textarea','text'];
    public function to_category($id,Request $request)
    {
        $customfield = CustomField::findOrFail($id);
//        dump($customfield);
//        dump($customfield->categories());
        $customfield->categories()->syncWithoutDetaching($request->category_id);
//        dd($customfield->categories());
        return redirect()->route('dashboard.customfields.show',$id)->with('status','updated successfully');
    }

}
