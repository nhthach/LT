<?php

namespace App\Library;
use Illuminate\Support\Facades\Input;

class Library 
{
	 public static function convertBoolData($value){
        return $result =  $value == 1 || $value ==true ? 1:0;
    }

    public static function uploadFile($nameFile, $action,$linkStore,$model){
    	if(Input::hasFile($nameFile)){
    		$path = '/img/'.$linkStore.'/';
                $file = Input::file($nameFile);
                $destinationPath = public_path().''.$path;
                $imageName = time().'.'.$file->extension();
                $file->move($destinationPath, $imageName);
                $imgpath = $path.''.$imageName;
                if($action=='update'){
                	$image_path = public_path().'/'.$model->$nameFile;
                	if(!filter_var($model->$nameFile, FILTER_VALIDATE_URL)&&file_exists($image_path)){
                		 unlink($image_path);
                	}
                }  
                $model->$nameFile  = $imgpath;
         }
    }

     public static function getMenuOption($model){
       
       $arrOption = [];
        foreach ($model as $obj) {
          if(!$obj->parent_id){
             $arrOption[$obj->id] =$obj->name;
               if(count($obj->children))
               {
                  $arrOption = Library::getChildMenu($obj, $arrOption);
              }
            
        }
    }
       return $arrOption;
}

    public static function getChildMenu ($obj, $arr){
        foreach($obj->children as $child){
                $arr[$child->id] = "--".$child->name;     
                 if(count($child->children)){
                      Library::getChildMenu($child,$arr);
                 }
      }

                  return $arr;
                 
    }

    public  static function stripUnicode($str){
        if(!$str) return false;
         $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
         );
      foreach($unicode as $nonUnicode=>$uni) 
        $str = preg_replace("/($uni)/i",$nonUnicode,$str);
      return strtolower(str_replace(" ","-",$str));
    }
}