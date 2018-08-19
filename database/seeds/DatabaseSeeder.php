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

        $arrLicenseType =[['Xe Hai Bánh','img/page/moto.png'],['Xe Bốn Bánh','img/page/oto.png']];

        $arrLicenseRank =[['key'=>'1','value'=>[['A1','20','18','10','5','5','15'],
                                                ['A2','20','18','10','5','5','15'],
                                                ['A3','20','18','10','5','5','15'],
                                                ['A4','20','18','10','5','5','15']
                                              ]],
                          ['key'=>'2','value'=>[['B1','30','26','15','7','5','30'],
                                               ['B2','30','26','15','7','5','30']]],

                          ['key'=>'2','value'=>[['C','30','28','15','7','5','30']]],

                          ['key'=>'2','value'=>[['D','30','28','15','7','5','30']]],

                          ['key'=>'2','value'=>[['E','30','28','15','7','5','30']]],
                          
                          ['key'=>'2','value'=>[['F','30','28','15','7','5','30']]],
                        ];

        $arQuestionType=['Câu hỏi kiến thức','Câu hỏi biển báo','Câu hỏi xa hình'];

        for ($i=0;$i<count($arrLicenseType) ; $i++) {
           $type = new LicenseType();
           $type->name= $arrLicenseType[$i][0];
           $type->img =$arrLicenseType[$i][1];
           $type->save(); 
        }

        foreach ($arrLicenseRank as $value) {
            if(is_array($value['value'])){
                  foreach ($value['value'] as $val) {
                     $class=  new LicenseRank();
                     $class->licensetype_id  = $value['key'];
                     $class->name  =  $val[0];
                     $class->nbquestion =$val[1];
                     $class->nbcorrect =$val[2];
                     $class->qt_type_text =$val[3];
                     $class->qt_type_icon =$val[4];
                     $class->qt_type_pic=$val[5];
                     $class->timework =$val[6];
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

        $arrCategory =[['Trang chủ','trang-chu','1'], ['Tin Tức','tin-tuc','2'],['Bộ Đề','bo-de','3'],['Thi Thử','thi-thu','4'],['Mẹo Thi','ky-nang','5'],['Liên Hệ','lien-he','6']];
       
        foreach ($arrCategory as $value) {
           $category = new Category();
           $category->name= $value[0];
           $category->url = $value[1];
           $category->sort = $value[2];
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
