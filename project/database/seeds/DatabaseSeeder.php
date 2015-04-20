<?php



use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('SnippetTableSeeder');
        $this->call('TopMenuTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('NewsTableSeeder');
        $this->call('FaqTableSeeder');
        $this->call('BlockTableSeeder');
        $this->call('URLTableSeeder');
        $this->call('Pivot');


	}

}
class SnippetTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('snippets')->truncate();
        DB::insert("
INSERT INTO snippets(Name_ar,Name_ru,Name_en,Description_ar,Description_ru,Description_en,img_url) VALUES
	('موثوق','Надежный','Reliable','العمل خدماتنا مع 99،9٪ الجهوزية','наш сервис работает круглосуточно','our service work with 99,9% uptime','/images/MergedLayers2.png'),
	('محمي','Защищенный','Protected','العمل خدماتنا مع 99،9٪ الجهوزية','наш сервис работает круглосуточно','our service work with 99,9% uptime','/images/MergedLayers3.png'),
	('24/7/365','24/7/365','24/7/365','العمل خدماتنا مع 99،9٪ الجهوزية','наш сервис работает круглосуточно','our service work with 99,9% uptime','/images/MergedLayers4.png'),
	('مناسب','Благоприятный','Favorable','العمل خدماتنا مع 99،9٪ الجهوزية','наш сервис работает круглосуточно','our service work with 99,9% uptime','/images/MergedLayers5.png');


");
    }



}
class TopMenuTableSeeder extends Seeder {
    public function run()
    {
        DB::table('top_menus')->truncate();
        DB::insert("INSERT INTO top_menus(Name_ru,Name_en,Name_ar,alias) VALUES
('FAQ','FAQ','التعليمات','faq'),
('Новости','News','أخبار','news'),
('Связаться','Contact us','اتصل بنا','contacts');");
    }

}

class NewsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('news_en')->truncate();
        DB::table('news_ru')->truncate();
        DB::table('news_ar')->truncate();

        $faker_en = \Faker\Factory::create('en_EN');
        \App::setLocale('en');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        for($i=0;$i<20;$i++){
            DB::table('news_'.\App::getLocale())->insert([
                'title'=>'dsfsdfsdfdsfs',
                'title_news'=>$faker_en->sentence(3),
                'metatitle'=>$faker_en->sentence(3),
                'metadescription'=>$faker_en->sentence(3),
                'metakeywords'=>$faker_en->sentence(3),
                'body'=>$faker_en->paragraph(20),
                'category_id'=>rand(1,5),
                'img_url'=>$faker_en->imageUrl(200,200),
                'slug'=>str_replace(' ','-',$faker_en->word(2)),
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()


            ]);
        }
        \App::setLocale('ru');
        for($i=0;$i<20;$i++){
            DB::table('news_'.\App::getLocale())->insert([
                'title'=>$faker_en->sentence(3),
                'title_news'=>$faker_en->sentence(3),
                'metatitle'=>$faker_en->sentence(3),
                'metadescription'=>$faker_en->sentence(3),
                'metakeywords'=>$faker_en->sentence(3),
                'body'=>$faker_en->paragraph(20),
                'category_id'=>rand(1,5),
                'img_url'=>$faker_en->imageUrl(200,200),
                'slug'=>str_replace(' ','-',$faker_en->word(2)),
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()


            ]);
        }
        \App::setLocale('ar');

        for($i=0;$i<20;$i++){
            DB::table('news_'.\App::getLocale())->insert([
                'title'=>$faker_en->sentence(3),
                'title_news'=>$faker_en->sentence(3),
                'metatitle'=>$faker_en->sentence(3),
                'metadescription'=>$faker_en->sentence(3),
                'metakeywords'=>$faker_en->sentence(3),
                'body'=>$faker_en->paragraph(20),
                'category_id'=>rand(1,5),
                'img_url'=>$faker_en->imageUrl(200,200),
                'slug'=>str_replace(' ','-',$faker_en->word(2)),
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()


            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');




    }
}
class CategoriesTableSeeder extends Seeder {

    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories_en')->truncate();
        DB::table('categories_ru')->truncate();
        DB::table('categories_ar')->truncate();

        $faker_ru = \Faker\Factory::create('ru_RU');
        $faker_en = \Faker\Factory::create('en_EN');
        \App::setLocale('en');
        for($i=0;$i<5;$i++){
            DB::table('categories_'.\App::getLocale())->insert([
                'name'=>$faker_ru->word(2),
                'slug'=>str_replace(' ','-',$faker_en->word(2)),
                'metatitle'=>$faker_en->sentence(3),
                'title'=>$faker_en->sentence(3),
                'metadescription'=>$faker_en->sentence(3),
                'metakeywords'=>$faker_en->sentence(3),



            ]);

        }
        \App::setLocale('ru');
        for($i=0;$i<5;$i++){
            DB::table('categories_'.\App::getLocale())->insert([
                'name'=>$faker_ru->word(2),
                'slug'=>str_replace(' ','-',$faker_en->word(2)),
                'metatitle'=>$faker_en->sentence(3),
                'title'=>$faker_en->sentence(3),
                'metadescription'=>$faker_en->sentence(3),
                'metakeywords'=>$faker_en->sentence(3),



            ]);

        }
        \App::setLocale('ar');
        for($i=0;$i<5;$i++){
            DB::table('categories_'.\App::getLocale())->insert([
                'name'=>$faker_ru->word(2),
                'slug'=>str_replace(' ','-',$faker_en->word(2)),
                'metatitle'=>$faker_en->sentence(3),
                'title'=>$faker_en->sentence(3),
                'metadescription'=>$faker_en->sentence(3),
                'metakeywords'=>$faker_en->sentence(3),



            ]);

        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }

}
class CommentsTableSeeder extends Seeder {

    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('comments_ru')->truncate();
        DB::table('comments_en')->truncate();
        DB::table('comments_ar')->truncate();
        \App::setLocale('en');
        $faker = \Faker\Factory::create('en_EN');
        for($i=0;$i<5;$i++){
            DB::table('comments_'.\App::getLocale())->insert([
                'id_news'=>rand(1,19),
                'comment_body'=>$faker->sentence(2),
                'author'=>$faker->firstName,
                'validation'=>rand(0,1),


            ]);

        }
        \App::setLocale('ru');
        for($i=0;$i<5;$i++){
            DB::table('comments_'.\App::getLocale())->insert([
                'id_news'=>rand(1,19),
                'comment_body'=>$faker->sentence(2),
                'author'=>$faker->firstName,
                'validation'=>rand(0,1),


            ]);

        }
        \App::setLocale('ar');
        for($i=0;$i<5;$i++){
            DB::table('comments_'.\App::getLocale())->insert([
                'id_news'=>rand(1,19),
                'comment_body'=>$faker->sentence(2),
                'author'=>$faker->firstName,
                'validation'=>rand(0,1),


            ]);

        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }

}
class FaqTableSeeder extends Seeder {

    public function run(){
        DB::table('faqs_en')->truncate();
        DB::table('faqs_ru')->truncate();
        DB::table('faqs_ar')->truncate();
        $faker = \Faker\Factory::create('en_EN');
        \App::setLocale('en');
        for($i=0;$i<5;$i++){
            DB::table('faqs_'.\App::getLocale())->insert([
                'question'=>$faker->sentence(10),
                'answer'=>$faker->sentence(10),
            ]);

        }
        \App::setLocale('ru');
        for($i=0;$i<5;$i++){
            DB::table('faqs_'.\App::getLocale())->insert([
                'question'=>$faker->sentence(10),
                'answer'=>$faker->sentence(10),
            ]);

        }
        \App::setLocale('ar');
        for($i=0;$i<5;$i++){
            DB::table('faqs_'.\App::getLocale())->insert([
                'question'=>$faker->sentence(10),
                'answer'=>$faker->sentence(10),
            ]);

        }



    }

}
class URLTableSeeder extends Seeder {

    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('urls_en')->truncate();
        DB::table('urls_ru')->truncate();
        DB::table('urls_ar')->truncate();

//        $faker = \Faker\Factory::create('en_EN');
//        \App::setLocale('en');
//        for($i=0;$i<5;$i++){
//            DB::table('urls_'.\App::getLocale())->insert([
//                'alias'=>$faker->sentence(3)
//            ]);
//            // etc etc
//        }
//        \App::setLocale('ru');
//        for($i=0;$i<5;$i++){
//            DB::table('urls_'.\App::getLocale())->insert([
//                'alias'=>$faker->sentence(3)
//            ]);
//            // etc etc
//        }
//        \App::setLocale('ar');
//        for($i=0;$i<5;$i++){
//            DB::table('urls_'.\App::getLocale())->insert([
//                'alias'=>$faker->sentence(3)
//            ]);
//            // etc etc
//        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

}
class BlockTableSeeder extends Seeder {

    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('blocks_en')->truncate();
        DB::table('blocks_ru')->truncate();
        DB::table('blocks_ar')->truncate();

        \App::setLocale('en');
        if (($handle = fopen(__DIR__."/Blocks-2.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                foreach($data as $block){
                    DB::table('blocks_'.\App::getLocale())->insert([
                        "text"=>$block
                    ]);
                }
            }
            fclose($handle);
        }
        \App::setLocale('ru');
        if (($handle = fopen(__DIR__."/Blocks-2.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                foreach($data as $block){
                    DB::table('blocks_'.\App::getLocale())->insert([
                        "text"=>$block
                    ]);
                }
            }
            fclose($handle);
        }
        \App::setLocale('ar');
        if (($handle = fopen(__DIR__."/Blocks-2.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                foreach($data as $block){
                    DB::table('blocks_'.\App::getLocale())->insert([
                        "text"=>$block
                    ]);
                }
            }
            fclose($handle);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

}
class Pivot extends Seeder{
//    public function run(){
//        DB::table('block_url')->delete();
//        $blocks=\App\Block::all();
//        foreach($blocks as $block){
//            $block->urls()->sync([$block->id]);
//        }
//    }
}