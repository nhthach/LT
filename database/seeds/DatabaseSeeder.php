<?php

use Illuminate\Database\Seeder;
use App\LicenseType;
use App\LicenseRank;
use App\QuestionType;
use App\Configsystem;
use App\Category;
use App\Exam;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 // Role comes before User seeder here.
		  $this->call(RoleTableSeeder::class);
		  // User seeder will use the roles above created.
		  $this->call(AdminTableSeeder::class);
      $this->call(DatabaseSeeder::createDateDefault());
    }

    public function createDateDefault(){

        $arrLicenseType =['Xe Hai Bánh','Xe Bốn Bánh'];
        $arrLicenseRank =[['key'=>'1','value'=>['A1','A2','A3','A4']],
                          ['key'=>'2','value'=>['B1','B2']],
                          ['key'=>'2','value'=>['C']],
                          ['key'=>'2','value'=>['D']]];
        $arQuestionType=['Câu hỏi hình','Câu hỏi biển báo','Câu hỏi xa hình'];

        for ($i=0;$i<count($arrLicenseType) ; $i++) {
           $type = new LicenseType();
           $type->name= $arrLicenseType[$i];
           $type->save(); 
        }

        foreach ($arrLicenseRank as $value) {
            if(is_array($value['value'])){
                  foreach ($value['value'] as $val) {
                     $class=  new LicenseRank();
                     $class->licensetype_id  = $value['key'];
                     $class->name  =  $val;
                     $class->nbquestion =20;
                     $class->nbcorrect =18;
                     $class->qt_type_text =10;
                     $class->qt_type_icon =5;
                     $class->qt_type_pic=5;
                     $class->timework =15;
                     $class ->save();
                  }
            }
        }

        for ($i=0; $i <count($arQuestionType) ; $i++) { 
           $QuestionType = new QuestionType();
           $QuestionType->name = $arQuestionType[$i];
           $QuestionType->save();
        }

        $config =  new Configsystem();
        $config ->id  = now()->getTimestamp();
        $config ->title = "Học Lái Xe";
        $config->icon   ="img/page/icon.png";
        $config->imgpage   ="img/page/icon.png";
        $config->metacontent =" Chuyên cung cấp các loại đề thi";
        $config->description ="Thi bằng lái xe máy tại, học bằng lái xe máy A1 , đơn giản, nhanh chóng, đăng ký thi ngay, đảm bảo đỗ 99%.";
        $config->save();

        $arrCategory =['Trang chủ', 'Tin Tức','Bộ Đề','Thi Thử','Mẹo Thi','Liên Hệ'];
       
        foreach ($arrCategory as $value) {
           $category = new Category();
           $category->name= $value;
           $category->url = 'home';
           $category->save();
        }
        $arr = ['Đề số 1','Đề số 2','Đề số 3','Đề số 4','Đề số 5','Đề số 6','Đề số 7','Đề số 8'];
        $rank = LicenseRank::get();
        foreach ($rank as $key => $value) {
          foreach ($arr as  $val) {
           $exam = new Exam ();
           $exam->licenserank_id = $value->id;
           $exam->name = $val;
           $exam->save();
          }
           
        }
    }
}
