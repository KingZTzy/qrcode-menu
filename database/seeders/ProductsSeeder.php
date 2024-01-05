<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([
            'name' => 'Monaka',
            'slug' => 'monaka',
            'category_id' => '3',
            'status' => '0',
            'description' => 'Monaka adalah cemilan Jepang yang terbuat dari pasta kacang merah yang diapit di antara mochi atau kulit tepung beras. Monaka memiliki aroma manis nasi yang samar, tetapi tidak menonjol, sehingga cocok dengan hidangan apa pun.',
            'image' => '1675919013.png',
            'price' => '17000'
        ]);

        DB::table('products')->insert([
            'name' => 'Kakigoori',
            'slug' => 'kakigoori',
            'category_id' => '2',
            'status' => '1',
            'description' => 'Kakigoori (かき氷), juga dikenal sebagai es serut Jepang, adalah manisan Jepang yang terbuat dari es serut dan sirup, biasanya susu kental manis, sebagai pemanis. Kakigoori dibuatnya dengan mencukur es menjadi potongan-potongan kecil dan diberi taburan sirup.',
            'image' => '1675919013.png',
            'price' => '22000'
        ]);

        DB::table('products')->insert([
            'name' => 'Kyoto Ramen',
            'slug' => 'kyoto-ramen',
            'category_id' => '1',
            'status' => '1',
            'description' => 'Ramen Kyoto (京都ラーメン) adalah istilah umum untuk ramen yang disediakan dan dikonsumsi terutama di Kota Kyoto, Prefektur Kyoto, Jepang. Hidangan ini terkenal dengan kuahnya yang kaya dan khas.',
            'image' => '1675919013.png',
            'price' => '43000'
        ]);

        DB::table('products')->insert([
            'name' => 'Nanakusa Gayu',
            'slug' => 'nanakusa-gayu',
            'category_id' => '1',
            'status' => '1',
            'description' => 'Nanakusa Gayu atau dikenal sebagai Tujuh Ramuan Nasi Bubur secara tradisional dimakan di Jepang pada Hari Tahun Baru, Jinjitsu-no Sekku (人日の節句). Ini adalah bubur asin yang dibuat dengan bahan-bahan seperti tujuh ramuan musim semi dan kue beras.',
            'image' => '1675919013.png',
            'price' => '42000'
        ]);

        DB::table('products')->insert([
            'name' => 'Amazake',
            'slug' => 'amazake',
            'category_id' => '2',
            'status' => '1',
            'description' => 'Amazake (Kanshu, Sake) adalah sejenis minuman fermentasi tradisional Jepang yang bentuknya keruh dan menyerupai Doburoku. Rasanya yang manis dan asam mengingatkan pada yogurt, sedangkan teksturnya berkisar antara susu dan yogurt yang berlemak.',
            'image' => '1675919013.png',
            'price' => '35000'
        ]);


        DB::table('products')->insert([
            'name' => 'Wakame Udon',
            'slug' => 'wakame-udon',
            'category_id' => '1',
            'status' => '1',
            'description' => 'Mie Udon dengan rasa gurih dan manis dari sup kakedashi. Dilengkapi dengan topping rumput laut, jagung, dan tenkatsu yang renyah. Semakin komplit dengan harumnya minyak wijen, serta taburan wijen dan daun bawang.',
            'image' => '1675919013.png',
            'price' => '41000'
        ]);

        DB::table('products')->insert([
            'name' => 'Yakisoba',
            'slug' => 'yakisoba',
            'category_id' => '1',
            'status' => '1',
            'description' => 'Yakisoba adalah mie goreng dengan daging dan sayuran. Ini adalah hidangan terkenal di Jepang dan memiliki beberapa variasi dari berbagai prefektur.',
            'image' => '1675919013.png',
            'price' => '45000'
        ]);

        DB::table('products')->insert([
            'name' => 'Umeshu',
            'slug' => 'umeshu',
            'category_id' => '2',
            'status' => '1',
            'description' => 'Plum Jepang mentah, atau ume, direndam dengan gula dalam minuman keras yang disuling untuk membuat umeshu, minuman keras beraroma shocu.',
            'image' => '1675919013.png',
            'price' => '24000'
        ]);

        DB::table('products')->insert([
            'name' => 'Kombucha',
            'slug' => 'kombucha',
            'category_id' => '2',
            'status' => '1',
            'description' => 'Kombucha adalah minuman teh hitam berfermentasi, berbuih ringan, manis dan asam yang biasa dikonsumsi karena manfaat kesehatannya.',
            'image' => '1675919013.png',
            'price' => '22000'
        ]);

        DB::table('products')->insert([
            'name' => 'Korokke',
            'slug' => 'korokke',
            'category_id' => '3',
            'status' => '1',
            'description' => 'Korokke atau kroket adalah makanan ringan yang terbuat dari kentang rebus yang dihaluskan, digulung menjadi bentuk bale atau lonjong, dilapisi tepung terigu, telur dan remah roti, serta digoreng dengan minyak goreng dalam jumlah banyak.',
            'image' => '1675919013.png',
            'price' => '19000'
        ]);

        DB::table('products')->insert([
            'name' => 'Sakura Ocha',
            'slug' => 'sakura-ocha',
            'category_id' => '2',
            'status' => '1',
            'description' => 'Sakurayu (Jepang: 桜湯), Sakura-cha (桜茶), secara harfiah "teh bunga sakura", adalah teh Jepang yang dibuat dengan menyeduh bunga sakura yang dipetik dengan air matang.',
            'image' => '1675919013.png',
            'price' => '20000'
        ]);

        DB::table('products')->insert([
            'name' => 'Dorayaki',
            'slug' => 'dorayaki',
            'category_id' => '3',
            'status' => '1',
            'description' => 'Dorayaki adalah makanan kembung dan gula-gula Jepang yang biasanya dibuat dengan mengapit pasta kacang merah di antara dua potongan adonan mirip castella berbentuk cakram yang agak kembung.',
            'image' => '1675919013.png',
            'price' => '14000'
        ]);

        DB::table('products')->insert([
            'name' => 'Anko Mochi',
            'slug' => 'anko-mochi',
            'category_id' => '3',
            'status' => '1',
            'description' => 'Anko mochi adalah mochi dengan bahan kacang adzuki (atau kacang merah). Ini adalah salah satu manisan Jepang yang sangat akrab dengan orang Jepang.',
            'image' => '1675919013.png',
            'price' => '14000'
        ]);

        DB::table('products')->insert([
            'name' => 'Action Figure',
            'slug' => 'action-figure',
            'category_id' => '4',
            'status' => '1',
            'description' => 'Action Figure Naruto Makan Ramen.',
            'image' => '1675919013.png',
            'price' => '35000'
        ]);

        DB::table('products')->insert([
            'name' => 'Oyako Don',
            'slug' => 'oyako-don',
            'category_id' => '1',
            'status' => '1',
            'description' => 'Oyako Don, juga dikenal sebagai mangkuk ayam dan telur, adalah donburi atau mangkuk nasi Jepang dengan ayam rebus di atasnya, seperti warishita, dan telur kocok. Orang Jepang sering merebusnya dengan daun bawang dan menghiasinya dengan mitsuba Jepang, kacang hijau, dan parutan rumput laut.',
            'image' => '1675919013.png',
            'price' => '40000'
        ]);

        DB::table('products')->insert([
            'name' => 'Gantungan Kunci',
            'slug' => 'gantungan-kunci',
            'category_id' => '4',
            'status' => '1',
            'description' => 'Gantungan Kunci Ramen.',
            'image' => '1675919013.png',
            'price' => '11000'
        ]);

        DB::table('products')->insert([
            'name' => 'Tsukune',
            'slug' => 'tsukune',
            'category_id' => '3',
            'status' => '1',
            'description' => 'Tsukune adalah bakso ayam Jepang yang paling sering dimasak dengan gaya yakitori dan terkadang dilapisi dengan kedelai manis atau yakitori tare. Daging giling (atau daging cincang) di Jepang bisa berupa ayam, babi, atau bahkan ikan.',
            'image' => '1675919013.png',
            'price' => '19000'
        ]);

        DB::table('products')->insert([
            'name' => 'Asuka Nabe',
            'slug' => 'asuka-nabe',
            'category_id' => '1',
            'status' => '1',
            'description' => 'Asuka nabe adalah hidangan hot pot atau nabemono dari wilayah Asuka dan Kashihara di Prefektur Nara di mana penduduk setempat menambahkan susu ke dalam kaldu ayam, dibumbui dengan miso putih, kecap, dan gula, serta ayam dan sayuran direbus.',
            'image' => '1675919013.png',
            'price' => '41000'
        ]);

        DB::table('products')->insert([
            'name' => 'Matcha',
            'slug' => 'matcha',
            'category_id' => '2',
            'status' => '1',
            'description' => 'Matcha (抹茶) adalah teh hijau Jepang yang dibuat dengan menggiling Tencha dengan gilingan batu atau menambahkan air dan mengaduknya hingga menjadi minuman.',
            'image' => '1675919013.png',
            'price' => '23000'
        ]);

        DB::table('products')->insert([
            'name' => 'Kibi Dango',
            'slug' => 'kibi-dango',
            'category_id' => '3',
            'status' => '1',
            'description' => 'Kibi Dango (juga dikenal sebagai pangsit jawawut) adalah jenis wagashi yang dibuat dari biji kibi (millet), yang ditandai dengan bentuknya yang bulat dan teksturnya yang kenyal.',
            'image' => '1675919013.png',
            'price' => '17000'
        ]);

        DB::table('products')->insert([
            'name' => 'Date Maki',
            'slug' => 'date-maki',
            'category_id' => '3',
            'status' => '1',
            'description' => 'Date Make seperti Tamagoyaki tapi rasanya lebih manis dan dimasak dengan kue ikan. Bahan yang biasa digunakan terdiri dari gula, mirin, dan madu.',
            'image' => '1675919013.png',
            'price' => '15000'
        ]);

    }
}
