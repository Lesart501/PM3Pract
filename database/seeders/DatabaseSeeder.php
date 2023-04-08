<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Accomodation;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Operator;
use App\Models\Country;
use App\Models\Meal;
use App\Models\Status;
use App\Models\Order;
use App\Models\RestType;
use App\Models\Tour;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userNames = ['Артём', 'Олег', 'Сергей', 'Анна', 'Константин', 'Ангелина', 'Владимир'];
        $userEmails = ['lesart@mail.ru', 'oleg@mail.ru', 'sergay@mail.ru', 'ana@mail.ru', 'bone@mail.ru', 'angel@mail.ru', 'vldmr@mail.ru'];
        $is_admin = [1, 0, 0, 0, 0, 0, 0];
        $password = Hash::make('users');
        $phones = ['89442585647', '89650255926', '89236036531', '89033956839', '89243683968', '89123557508', '89346564566'];
        for ($i = 0; $i < count($userNames); $i++){
            User::create([
                'name' => $userNames[$i],
                'email' => $userEmails[$i],
                'is_admin' => $is_admin[$i],
                'password' => $password,
                'phone' => $phones[$i]
            ]);
        }

        $operatorNames = ['Great Tour', 'The Traveller', 'Global Travel'];
        $operatorEmails = ['gt1917@mail.ru', 'traveller@mail.ru', 'globaltrt@mail.ru'];
        for ($i = 0; $i < count($operatorNames); $i++){
            Operator::create([
                'name' => $operatorNames[$i],
                'email' => $operatorEmails[$i]
            ]);
        }

        $statusNames = ['В обработке', 'Принята', 'Отклонена'];
        for ($i = 0; $i < count($statusNames); $i++){
            Status::create([
                'name' => $statusNames[$i]
            ]);
        }

        $countryNames = ['Турция', 'Россия', 'Египет', 'Италия', 'Тайланд',
        'Абхазия', 'Франция', 'Италия', 'Непал', 'Китай', 'Индия',
        'Великобритания', 'Германия', 'США', 'Канада', 'Швеция', 'Бразилия',
        'Швейцария', 'Норвегия', 'Австралия', 'Новая Зеландия', 'ОАЭ', 'Южная Корея',
        'Япония', 'Казахстан', 'Израиль', 'Нидерланды', 'Мексика', 'Бразилия',
        'Испания', 'Португалия', 'Чили', 'Гондурас', 'Польша', 'Аргентина'];
        for ($i = 0; $i < count($countryNames); $i++){
            Country::create([
                'name' => $countryNames[$i]
            ]);
        }

        $restTypes = ['Пляжный', 'Городской', 'Природный'];
        $restDescs = [
            'Для любителей размеренного отдыха на пляже', 'Посещение достопримечательностей и экскурсии','Для любителей природных красот'
        ];
        for ($i = 0; $i < count($restTypes); $i++){
            RestType::create([
                'name' => $restTypes[$i],
                'description' => $restDescs[$i]
            ]);
        }

        $accomodations = ['Отель', 'Хостел', 'Вилла', 'Бунгало', 'Гостевой дом'];
        for ($i = 0; $i < count($accomodations); $i++){
            Accomodation::create([
                'name' => $accomodations[$i]
            ]);
        }

        $meals = ['Всё включено', 'Завтрак, обед и ужин', 'Завтрак и обед', 'Завтрак', 'Нет'];
        for ($i = 0; $i < count($meals); $i++){
            Meal::create([
                'name' => $meals[$i]
            ]);
        }

        $tourNames = [
            'Отель Joker Side Hill Suite Hotel', 'Песочная Бухта', 'Отель Charmillion Sea Life Resort', 'Аквамарин', 'Selva Grande мини-отель',
            'Отель Fortuna Bangkok'
        ];
        $places = ['Сиде', 'Севастополь', 'Шарм-Эль-Шейх', 'Адлер', 'Рим', 'Бангкок'];
        $countries = [1, 2, 3, 2, 4, 5];
        $people = [2, 1, 1, 2, 2, 1];
        $nights = [6, 6, 4, 6, 14, 13];
        $images = ['side2.jpeg', 'crimea_is_our2.jpg', 'shesh1.jpg', 'adler1.jpg', 'rome1.jpg', 'bangkok.jpg'];
        $operators_id = [1, 2, 3, 3, 2, 1];
        $rest_types_id = [1, 1, 1, 1, 2, 2];
        $accomodations_id = [1, 2, 1, 1, 1, 1];
        $meals_id = [1, 2, 3, 4, 5, 1];
        $descriptions = [
            'Крупный трехзвездочный отель расположен в 15 минутах ходьбы от исторического центра Сиде. На приотельной территории оборудован мини-аквапарк и разбит небольшой сад. Рядом находится множество магазинов, кафе, пекарен, до пляжа можно дойти за 7 минут. Дружелюбный персонал организует бесплатный трансфер на пляж. Здесь любят отдыхать люди в возрасте и семейные пары с детьми.
            Гостям предлагаются апартаменты площадью 33-35 кв. м с видом на сад или море, рассчитанные на 4 человек. В номерах предусмотрены кухня, гостиная, балкон и ванная комната, есть кондиционер, сейф, холодильник и кофеварка. Туристы отмечают удачное расположение и отличный вид на море.',
            'Комфортабельный отельный комплекс находится в Севастополе среди зеленых аллей, прогулочных дорожек, беседок и фонтанов. На территории парка содержат экзотических птиц. Из уютных номеров открывается прекрасный вид на зеленые деревья и побережье Черного моря. До собственного галечного пляжа можно дойти за несколько минут. В ресторане подают блюда украинской кухни. Отель понравится семьям с детьми и парам, которые хотят провести отпуск на берегу Черного моря. Поблизости от отеля расположены рестораны и магазины. Всего за 10 минут можно дойти до Башни Зенона и заповедника «Херсонес Таврический».',
            'Отель расположен прямо на побережье залива Набк, ориентирован в первую очередь на семьи с детьми и любителей дайвинга. Широкая полоса мелководья позволяет детям безбоязненно играть в воде, а взрослые могут познакомиться поближе с удивительным коралловым рифом, освоив ныряние с аквалангом. На территории отеля работают рестораны с различными кухнями, проложены удобные дорожки для пеших прогулок. Стоит отдельно отметить ландшафтный дизайн отеля — он запомнится всем гостям необычной системой декоративных прудов и мостиков. В отеле представлено несколько анимационных программ для маленьких гостей. Корпуса выполнены в экзотическом стиле нубийской архитектуры. Имеет общую инфраструктуру с отелями Sea Club и Sea Garden, гости могут пользоваться услугами всех трех отелей комплекса.',
            'Пляжный отель располагается неподалеку от Адлера среди тихих улиц и раскидистых деревьев. Светлые здания образуют внутренний двор, в котором высажены кустарники и экзотические растения, из номеров, оборудованных кухней, видно зелень и соседние дома. До галечного пляжа можно дойти за 5 минут. Туры в отель Аквамарин заинтересуют семейные пары с детьми и людей в возрасте, предпочитающих отдыхать в тихих курортных городках. Для маленьких гостей имеется игровая площадка, а для взрослых есть все необходимое, чтобы устроить барбекю. Поблизости находятся кафе, продуктовый магазин, бары и супермаркет. За 15 минут можно дойти до Курортного городка, в котором имеются ночные клубы, отделения банков, аквапарк, дельфинарий и рестораны.',
            'Отель Selva Grande находится в регионе Лацио, в 30 км oт Рима. Отель расположен на зеленых холмaх, с которых открывается великолепная панорама. "Selva Grande" является идеальным местом для того, чтобы почувствовать себя в контакте с природой вдалеке от городского шумов, но всего лишь в 30 минутах езды от столицы Италии - в 5 минутах находится станция метро-поезда, который через 50 минут доставит Вас в Рим на Piazza del Popolo. "Selva Grande"- это уютный, комфортабельный дом с современной мебелью из дерева и паркетом; салон с камином, фортепиано, TB и Интернет; обширная библиотека и коллекция музыкальных произведений. Просторная тeрраса с великолепной панорамой является прекрасным местом для отдыха и завтраков, для которые готовятся из биологически чистых продуктов. Дом окружает парк с оливковыми и фруктовыми деревьями. К услугам гостей предлагаются стол для пинг-понга и прогулочные велосипеды. B 50 метрах находится открытый плавательный бассейн. Можно заказать ужин в отеле.',
            'Это предложение не в конкретный отель, а в один из отелей системы «Фортуна». По правилам «Фортуны» вы можете выбрать только «звездность» отеля, курорт, продолжительность тура и даты поездки. Название отеля становится известно по прилету.
            Туры по системе «Фортуна» дешевле обычных. Стоимость туров с размещением в отелях системы «Фортуна», как правило, на 15-20% ниже. Покупка тура по системе «Фортуна» гарантирует заселение в один из отелей выбранной вами «звездности». Размещение в отеле другой категории (выше или ниже) не предполагается.
            Туры в отели по системе «Фортуна» выбирают те, кому важен не бренд отеля, а курорт и возможность сэкономить.'
        ];
        $price = [21306, 17352, 42936, 19889, 67786, 49026];
        for ($i = 0; $i <  count($tourNames); $i++){
            Tour::create([
                'name' => $tourNames[$i],
                'place' => $places[$i],
                'countries_id' => $countries[$i],
                'people' => $people[$i],
                'nights' => $nights[$i],
                'image' => $images[$i],
                'operators_id' => $operators_id[$i],
                'rest_types_id' => $rest_types_id[$i],
                'accomodations_id' => $accomodations_id[$i],
                'meals_id' => $meals_id[$i],
                'description' => $descriptions[$i],
                'price' => $price[$i]
            ]);
        }

        $users_id = [2, 3, 4, 5, 6, 7];
        $tours_id = [6, 3, 2, 1, 5, 4];
        $out_date = ['02.03.2023', '05.04.2023', '23.05.2023', '30.04.2023', '14.06.2023', '17.05.2023'];
        $return_date = ['14.03.2023', '11.04.2023', '30.05.2023', '05.05.2023', '22.06.2023', '29.05.2023'];
        for ($i = 0; $i < count($users_id); $i++){
            Order::create([
                'statuses_id' => 1,
                'users_id' => $users_id[$i],
                'tours_id' => $tours_id[$i],
                'out_date' => $out_date[$i],
                'return_date'=> $return_date[$i]
            ]);
        }
    }
}
