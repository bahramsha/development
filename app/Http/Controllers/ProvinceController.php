<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Province;
use Session;


class ProvinceController extends Controller
{


    public function province(){
         $id = 0;
        $provinces = Province::paginate(5);
        return view('backend.province' ,  compact("provinces","id"));


      }
   
    public function add_province(){
    	return view('backend.add_province');

    }


    public function save_province(Request $request){

         $this->validate($request,[
          'province_name' =>'required|max:255|alpha|unique:provinces'
      ]);

        Province::create($request->all());

        Session::flash('success','You are successfully save the province');

     	 return redirect('province');

     }

       public function get_province($id){
       $i = decrypt($id);
      $provinces=Province::find($i);
      return view('backend.update_province' , compact("provinces"));


     }
      public function update_province(Request $request,$id){
          $this->validate($request,[
          'province_name' =>'required|max:255|alpha|unique:provinces'
      ]);

        $provinceId = decrypt($id);
        $provinces = Province::find($provinceId);

        $provinces->id = $provinceId;
        $provinces->province_name=$request->get('province_name');
        $provinces->update();
      return redirect()->route('province')
      ->with('message','Province updated successfully');


     }


      public function delete_province($id){
       $provinces=Province::find(decrypt($id));
       $provinces->delete();
        Session::flash('success','You are successfully deleted the province');
      return redirect()->route('province')
          ->with('message','provinces deleted successfully');
     }


}
