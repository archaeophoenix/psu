<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Village::insert([
            [
                "district_id" => 640801,
                "id" => 6408012001,
                "name" => "Senyiur",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.537415563 0.303469575)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012002,
                "name" => "Kelinjau Ilir",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.4884930397 0.4459452573)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012003,
                "name" => "Kelinjau Ulu",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.4791832648 0.5363124154)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012004,
                "name" => "Long Nah",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6152505485 0.5534272116)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012006,
                "name" => "Long Tesak",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.5468675006 0.62748052)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012009,
                "name" => "Gemar Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6137092088 0.5876061926)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012012,
                "name" => "Long Poq Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.4886139011 0.6796228411)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012013,
                "name" => "Muara Dun",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6698526027 0.6462705359)')")
            ],
            [
                "district_id" => 640801,
                "id" => 6408012014,
                "name" => "Teluk Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.564428279 0.5548982749)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022001,
                "name" => "Jak Luay",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9893260111 1.0002777483)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022002,
                "name" => "Nehes Liah Bing",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7207672151 1.4690666363)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022003,
                "name" => "Muara Wahau",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8387185995 1.0543702018)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022004,
                "name" => "Dabeq",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7621093517 1.01457299)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022005,
                "name" => "Diaq Lay",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7760164816 1.061936974)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022006,
                "name" => "Benhes",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.421034036 1.4621108747)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022007,
                "name" => "Wanasari",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8997814339 1.0992086256)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022008,
                "name" => "Wahau Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8903541584 1.0736555384)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022009,
                "name" => "Karya Bhakti",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9104627326 1.0416651063)')")
            ],
            [
                "district_id" => 640802,
                "id" => 6408022010,
                "name" => "Long Wehea",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8389696508 1.011848459)')")
            ],
            [
                "district_id" => 640803,
                "id" => 6408032001,
                "name" => "Senambah",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7776922324 0.3359355741)')")
            ],
            [
                "district_id" => 640803,
                "id" => 6408032002,
                "name" => "Ngayau",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8001487088 0.3980365809)')")
            ],
            [
                "district_id" => 640803,
                "id" => 6408032003,
                "name" => "Muara Bengkal Ilir",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8093710193 0.4263916155)')")
            ],
            [
                "district_id" => 640803,
                "id" => 6408032004,
                "name" => "Muara Bengkal Ulu",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8214902827 0.4406858614)')")
            ],
            [
                "district_id" => 640803,
                "id" => 6408032005,
                "name" => "Benua Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8362165711 0.4756535756)')")
            ],
            [
                "district_id" => 640803,
                "id" => 6408032013,
                "name" => "Mulupan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7637892657 0.2485041344)')")
            ],
            [
                "district_id" => 640803,
                "id" => 6408032014,
                "name" => "Batu Balai",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8165719958 0.5197991458)')")
            ],
            [
                "district_id" => 640804,
                "id" => 6408041010,
                "name" => "Teluk Lingga",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5867092438 0.5229903045)')")
            ],
            [
                "district_id" => 640804,
                "id" => 6408042001,
                "name" => "Sangatta Utara",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5736829431 0.4860698529)')")
            ],
            [
                "district_id" => 640804,
                "id" => 6408042011,
                "name" => "Singa Gembara",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.6044760848 0.5578607342)')")
            ],
            [
                "district_id" => 640804,
                "id" => 6408042012,
                "name" => "Swarga Bara",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.4806762009 0.5854335996)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052001,
                "name" => "Kerayaan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.2074014128 1.0895353505)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052002,
                "name" => "Tanjung Manis",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.0902347863 0.9648553941)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052003,
                "name" => "Peridan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.0329418995 0.9992913684)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052004,
                "name" => "Saka",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.1137523495 1.1092393191)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052005,
                "name" => "Mandu Dalam",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.0070749508 1.1325053131)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052006,
                "name" => "Benua Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.9285766488 0.9566947685)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052011,
                "name" => "Sempayau",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8606072705 1.1366510605)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052012,
                "name" => "Pelawan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8929663695 1.2077678136)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052013,
                "name" => "Tepian Terap",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.9417841752 1.2349154908)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052015,
                "name" => "Maloy",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.9848889459 0.8519011787)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052016,
                "name" => "Benua Baru Ulu",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.9612262872 1.0218901039)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052017,
                "name" => "Kolek",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.9159980041 1.0106108775)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052018,
                "name" => "Pulau Miang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.0105424851 0.7288741879)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052019,
                "name" => "Perupuk",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.141299871 0.9247992051)')")
            ],
            [
                "district_id" => 640805,
                "id" => 6408052020,
                "name" => "Mandu Pantai Sejahtera",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.0283370002 1.0811108604)')")
            ],
            [
                "district_id" => 640806,
                "id" => 6408062001,
                "name" => "Long Bentuq",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6186490568 0.7431771284)')")
            ],
            [
                "district_id" => 640806,
                "id" => 6408062002,
                "name" => "Long Pejeng",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.5851422966 0.7962842753)')")
            ],
            [
                "district_id" => 640806,
                "id" => 6408062003,
                "name" => "Long Lees",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.5029830401 0.7848549999)')")
            ],
            [
                "district_id" => 640806,
                "id" => 6408062004,
                "name" => "Mekar Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.2395526996 1.0474667548)')")
            ],
            [
                "district_id" => 640806,
                "id" => 6408062005,
                "name" => "Rantau Sentosa",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6204211883 0.7732104899)')")
            ],
            [
                "district_id" => 640806,
                "id" => 6408062006,
                "name" => "Long Nyelong",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.4273109807 0.7655907388)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072001,
                "name" => "Marah Haloq",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6209460588 1.0723412192)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072002,
                "name" => "Lung Melah",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.5945755869 0.9853575129)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072003,
                "name" => "Juk Ayaq",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.0989833426 0.923574838)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072004,
                "name" => "Long Segar",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.0041679944 0.8454220541)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072005,
                "name" => "Long Noran",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8911554632 0.7836626958)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072006,
                "name" => "Muara Pantun",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9186906374 0.9186413764)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072007,
                "name" => "Rantau Panjang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8563885081 0.9352870059)')")
            ],
            [
                "district_id" => 640807,
                "id" => 6408072008,
                "name" => "Kernyanyan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8463977457 0.8016956413)')")
            ],
            [
                "district_id" => 640808,
                "id" => 6408082001,
                "name" => "Makmur Jaya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9998030623 1.1226779632)')")
            ],
            [
                "district_id" => 640808,
                "id" => 6408082002,
                "name" => "Marga Mulya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9223966913 1.0889568396)')")
            ],
            [
                "district_id" => 640808,
                "id" => 6408082003,
                "name" => "Sukamaju",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.03693977 1.0914507489)')")
            ],
            [
                "district_id" => 640808,
                "id" => 6408082004,
                "name" => "Sidomulyo",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9409276903 1.0565786552)')")
            ],
            [
                "district_id" => 640808,
                "id" => 6408082005,
                "name" => "Sri Pantun",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9672707493 1.0546791686)')")
            ],
            [
                "district_id" => 640808,
                "id" => 6408082006,
                "name" => "Kombeng Indah",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.0057767483 1.056971673)')")
            ],
            [
                "district_id" => 640808,
                "id" => 6408082007,
                "name" => "Miau Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.0368038875 1.3099258079)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092001,
                "name" => "Sepaso",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5653350617 0.7678936228)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092002,
                "name" => "Sekerat",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7083174697 0.8307162643)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092003,
                "name" => "Keraitan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5716553631 0.9107783847)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092004,
                "name" => "Tepian Langsat",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3033399254 0.9806345143)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092005,
                "name" => "Tebangan Lembak",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.4649030952 0.8945220799)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092006,
                "name" => "Sepaso Timur",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.6237019839 0.7833397466)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092007,
                "name" => "Sepaso Selatan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5469692684 0.6667767204)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092008,
                "name" => "Muara Bengalon",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.6655649411 0.6505125234)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092009,
                "name" => "Tepian Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.253743993 0.7311829177)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092010,
                "name" => "Tepian Indah",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3087372523 0.6786305099)')")
            ],
            [
                "district_id" => 640809,
                "id" => 6408092011,
                "name" => "Sepaso Barat",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5368641544 0.7645290726)')")
            ],
            [
                "district_id" => 640810,
                "id" => 6408102001,
                "name" => "Kaliorang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.9184608132 0.8389404403)')")
            ],
            [
                "district_id" => 640810,
                "id" => 6408102006,
                "name" => "Bukit Makmur",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8383461877 0.9089522581)')")
            ],
            [
                "district_id" => 640810,
                "id" => 6408102007,
                "name" => "Bukit Harapan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8419153079 0.8625739523)')")
            ],
            [
                "district_id" => 640810,
                "id" => 6408102008,
                "name" => "Citra Manunggal Jaya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8806163871 0.9010888126)')")
            ],
            [
                "district_id" => 640810,
                "id" => 6408102009,
                "name" => "Bangun Jaya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8726980599 0.8708780168)')")
            ],
            [
                "district_id" => 640810,
                "id" => 6408102010,
                "name" => "Bumi Sejahtera",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.9217662124 0.9042337337)')")
            ],
            [
                "district_id" => 640810,
                "id" => 6408102013,
                "name" => "Selangkau",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8153434585 0.8433682978)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112001,
                "name" => "Sandaran",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.782616849 0.9445768121)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112002,
                "name" => "Manubar",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.5944876146 0.8937674858)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112003,
                "name" => "Tadoan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.5596656383 1.0719206803)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112004,
                "name" => "Marukangan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.3779881506 1.0605327853)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112005,
                "name" => "Susuk Luar",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.2171931665 0.882755988)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112006,
                "name" => "Susuk Dalam",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.2379213605 1.0111827888)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112007,
                "name" => "Tanjung Mangkaliat",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.9321743402 0.9843809081)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112008,
                "name" => "Manubar Dalam",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.491201903 0.9390187396)')")
            ],
            [
                "district_id" => 640811,
                "id" => 6408112009,
                "name" => "Susuk Tengah",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.2105273242 0.9262810047)')")
            ],
            [
                "district_id" => 640812,
                "id" => 6408121002,
                "name" => "Singa Geweh",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5656167593 0.437655693)')")
            ],
            [
                "district_id" => 640812,
                "id" => 6408122001,
                "name" => "Sangatta Selatan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.2828459612 0.4931458251)')")
            ],
            [
                "district_id" => 640812,
                "id" => 6408122003,
                "name" => "Sangkima",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.332051018 0.3981482351)')")
            ],
            [
                "district_id" => 640812,
                "id" => 6408122004,
                "name" => "Teluk Singkama",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3811108083 0.3368622621)')")
            ],
            [
                "district_id" => 640813,
                "id" => 6408132001,
                "name" => "Teluk Pandan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(3477127414  0.2384295864)')")
            ],
            [
                "district_id" => 640813,
                "id" => 6408132002,
                "name" => "Suka Rahmat",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(3425241386  0.1477446657)')")
            ],
            [
                "district_id" => 640813,
                "id" => 6408132003,
                "name" => "Suka Damai",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(2961422802  0.1110003513)')")
            ],
            [
                "district_id" => 640813,
                "id" => 6408132004,
                "name" => "Kandolo",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(3567929787  0.2922650329)')")
            ],
            [
                "district_id" => 640813,
                "id" => 6408132005,
                "name" => "Danau Redan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(3231871907  0.0560228019)')")
            ],
            [
                "district_id" => 640813,
                "id" => 6408132006,
                "name" => "Martadinata",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(3285300497  0.1846622063)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142001,
                "name" => "Mukti Jaya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3435867164 0.6063075521)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142002,
                "name" => "Pulung Sari",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3168976419 0.647045099)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142003,
                "name" => "Margo Mulyo",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3340466816 0.6298394998)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142004,
                "name" => "Rantau Makmur",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.280682356 0.5409114323)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142005,
                "name" => "Manunggal Jaya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.1701913263 0.6493966041)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142006,
                "name" => "Tanjung Labu",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.1397711975 0.6036885201)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142007,
                "name" => "Kebon Agung",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.1920911769 0.5544565268)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142008,
                "name" => "Tepian Makmur",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.1444498102 0.7336213686)')")
            ],
            [
                "district_id" => 640814,
                "id" => 6408142009,
                "name" => "Masalap Raya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3360769697 0.5863444844)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152001,
                "name" => "Bumi Etam",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8517647268 1.0898193343)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152002,
                "name" => "Bumi Rapak",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8366141304 1.0444258062)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152003,
                "name" => "Bumi Jaya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8013502773 1.0040864411)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152004,
                "name" => "Cipta Graha",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7698689428 0.9674863709)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152005,
                "name" => "Kadungan Jaya",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8320363255 1.1703055764)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152006,
                "name" => "Pengadan Baru",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7960961658 1.2053289902)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152007,
                "name" => "Mata Air",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7922674399 1.082133238)')")
            ],
            [
                "district_id" => 640815,
                "id" => 6408152008,
                "name" => "Bukit Permata",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7325358796 1.064613614)')")
            ],
            [
                "district_id" => 640816,
                "id" => 6408162001,
                "name" => "Karangan Dalam",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.4500166007 1.4174917843)')")
            ],
            [
                "district_id" => 640816,
                "id" => 6408162002,
                "name" => "Batu Lepoq",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7733949613 1.4822750521)')")
            ],
            [
                "district_id" => 640816,
                "id" => 6408162003,
                "name" => "Pengadan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.6840284399 1.1646488463)')")
            ],
            [
                "district_id" => 640816,
                "id" => 6408162004,
                "name" => "Baay",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.4815041126 1.1351620068)')")
            ],
            [
                "district_id" => 640816,
                "id" => 6408162005,
                "name" => "Mukti Lestari",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7789680815 1.3239756104)')")
            ],
            [
                "district_id" => 640816,
                "id" => 6408162006,
                "name" => "Karangan Seberang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.6405870131 1.3260976525)')")
            ],
            [
                "district_id" => 640816,
                "id" => 6408162007,
                "name" => "Karangan Hilir",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.6510096625 1.5198045533)')")
            ],
            [
                "district_id" => 640817,
                "id" => 6408172001,
                "name" => "Batu Timbau",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8387446248 0.6383516136)')")
            ],
            [
                "district_id" => 640817,
                "id" => 6408172002,
                "name" => "Beno Harapan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9218132111 0.6593537811)')")
            ],
            [
                "district_id" => 640817,
                "id" => 6408172003,
                "name" => "Mugi Rahayu",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8862450145 0.7503334907)')")
            ],
            [
                "district_id" => 640817,
                "id" => 6408172004,
                "name" => "Mawai Indah",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9084617954 0.5635921665)')")
            ],
            [
                "district_id" => 640817,
                "id" => 6408172005,
                "name" => "Himba Lestari",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.9604658161 0.6758293288)')")
            ],
            [
                "district_id" => 640817,
                "id" => 6408172006,
                "name" => "Telaga",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7912389411 0.6206174888)')")
            ],
            [
                "district_id" => 640817,
                "id" => 6408172007,
                "name" => "Batu Timbau Ulu",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7991277367 0.6879381164)')")
            ],
            [
                "district_id" => 640818,
                "id" => 6408182001,
                "name" => "Sika Makmur",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7083171988 0.6714297647)')")
            ],
            [
                "district_id" => 640818,
                "id" => 6408182002,
                "name" => "Segoy Makmur",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7177758614 0.637730236)')")
            ],
            [
                "district_id" => 640818,
                "id" => 6408182003,
                "name" => "Mukti Utama",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6878212258 0.6000041181)')")
            ],
            [
                "district_id" => 640818,
                "id" => 6408182004,
                "name" => "Sumber Sari",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7061091589 0.5822438285)')")
            ],
            [
                "district_id" => 640818,
                "id" => 6408182005,
                "name" => "Melan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.6861927119 0.705654357)')")
            ],
            [
                "district_id" => 640818,
                "id" => 6408182006,
                "name" => "Tanah Abang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7177564022 0.5313148968)')")
            ],
            [
                "district_id" => 640818,
                "id" => 6408182007,
                "name" => "Sumber Agung",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7554149596 0.5555096562)')")]
        ]);
    }
}
