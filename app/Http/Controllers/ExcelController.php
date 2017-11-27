<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Report;
use Excel;
use Input;
use Illuminate\Support\Facades\Lang;
use Akeneo\Component\SpreadsheetParser\SpreadsheetParser;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    //
    public function showUpload()
    {
    	return view('excel.import');
    }
    static $mappingIndex = array(
        0 => 'madvi',
        1 => 'makhoi',
        2 => 'tendvi',
        3 => 'mavung',
        4 => 'tgbhyt',
        5 => 'diachi',
        6 => 'dienthoai',
        7 => 'nguoilh',
        8 => 'ma_quan',
        9 => 'dsnv',
        10 => 'thang',
        11 => 'ghichu',
        12 => 'du_dk',
        13 => '_dk_bhxh',
        14 => '_dk_bhyt',
        15 => '_dk_bhtn',
        16 => '_dk_lai',
        17 => '_tien_dk',
        18 => '_ps_bh',
        19 => '_ps_yt',
        20 => '_ps_tn',
        21 => '_bst_bh',
        22 => '_bst_yt',
        23 => '_bst_tn',
        24 => '_bsg_bh',
        25 => '_bsg_yt',
        26 => '_bsg_tn',
        27 => 'sopn',
        28 => '_dc01_bh',
        29 => '_dc01_yt',
        30 => '_dc01_tn',
        31 => '_tql',
        32 => '_tqlyt',
        33 => '_tqltn',
        34 => 'sld',
        35 => 'sldtn',
        36 => 'pst',
        37 => 'pstTn',
        38 => 'pt1',
        39 => 'pt2',
        40 => 'pt3',
        41 => 'thanght',
        42 => 'thanghttn',
        43 => 'sothang',
        44 => 'sothangtn',
        45 => 'tyleno',
        46 => 'tylenotn',
        47 => '_pt_tudv',
        48 => '_qt_tudv',
        49 => '_thu_tudv',
        50 => '_lk_tudv',
        51 => '_tien_unc',
        52 => '_dc_unc',
        53 => '_dc_qtc',
        54 => '_dc_lai',
        55 => 'nopthem',
        56 => '_dt_bhxh',
        57 => '_dt_bhyt',
        58 => '_dt_bhtn',
        59 => '_noqh',
        60 => '_laiqh',
        61 => '_dcbst_lai',
        62 => '_dcbsg_lai',
        63 => '_dt_lai',
        64 => 'du_ck',
        65 => '_ck_bhxh',
        66 => '_ck_bhyt',
        67 => '_ck_bhtn',
        68 => '_ck_lai',
        69 => '_tien_ck',
        70 => 'lktql',
        71 => 'lktqlyt',
        72 => 'lktqltn',
        73 => 'lkpt_bhxh',
        74 => 'lkpt_bhyt',
        75 => 'lkpt_bhtn',
        76 => 'sld_dk',
        77 => 'sldtn_dk',
        78 => '_sldtang',
        79 => '_sldgiam',
        80 => '_sldtntang',
        81 => '_sldtngiam',
        82 => '_pst_bh',
        83 => '_psg_bh',
        84 => '_pst_yt',
        85 => '_psg_yt',
        86 => '_pst_tn',
        87 => '_psg_tn',
        88 => '_lsbh',
        89 => '_lsyt',
        90 => '_lstn',
        91 => '_tientlbh',
        92 => '_tientlyt',
        93 => '_tientltn',
        94 => '_lai1_ps',
        95 => '_lai2_ps',
        96 => '_lai3_ps',
        97 => '_lai1_dt',
        98 => '_lai2_dt',
        99 => '_lai3_dt',
        100 => '_dk_lai1',
        101 => '_dk_lai2',
        102 => '_dk_lai3',
        103 => '_ck_lai1',
        104 => '_ck_lai2',
        105 => '_ck_lai3',
        106 => 'thanghtyt',
        107 => 'sothangyt',
        108 => 'tylenoyt'
    );
    static $mappingIndex_old = array(
        0 => 'madvi',
        1 => 'makhoi',
        2 => 'tendvi',
        3 => 'mavung',
        4 => 'tgbhyt',
        5 => 'diachi',
        6 => 'dienthoai',
        7 => 'nguoilh',
        8 => 'ma_quan',
        9 => 'chon',
        10 => 'dsnv',
        11 => 'thang',
        12 => 'ghichu',
        13 => 'du_dk',
        14 => '_dk_bhxh',
        15 => '_dk_bhyt',
        16 => '_dk_bhtn',
        17 => '_dk_lai',
        18 => '_tien_dk',
        19 => '_ps_bh',
        20 => '_ps_yt',
        21 => '_ps_tn',
        22 => '_bst_bh',
        23 => '_bst_yt',
        24 => '_bst_tn',
        25 => '_bsg_bh',
        26 => '_bsg_yt',
        27 => '_bsg_tn',
        28 => 'sopn',
        29 => '_dc01_bh',
        30 => '_dc01_yt',
        31 => '_dc01_tn',
        32 => '_tql',
        33 => '_tqlyt',
        34 => '_tqltn',
        35 => 'sld',
        36 => 'sldtn',
        37 => 'pst',
        38 => 'psttn',
        39 => 'pt1',
        40 => 'pt2',
        41 => 'pt3',
        42 => 'thanght',
        43 => 'thanghttn',
        44 => 'sothang',
        45 => 'sothangtn',
        46 => 'tyleno',
        47 => 'tylenotn',
        48 => '_pt_tudv',
        49 => '_qt_tudv',
        50 => '_thu_tudv',
        51 => '_lk_tudv',
        52 => '_tien_unc',
        53 => '_dc_unc',
        54 => '_dc_qtc',
        55 => '_dc_lai',
        56 => 'nopthem',
        57 => '_dt_bhxh',
        58 => '_dt_bhyt',
        59 => '_dt_bhtn',
        60 => '_noqh',
        61 => '_laiqh',
        62 => '_dcbst_lai',
        63 => '_dcbsg_lai',
        64 => '_dt_lai',
        65 => 'du_ck',
        66 => '_ck_bhxh',
        67 => '_ck_bhyt',
        68 => '_ck_bhtn',
        69 => '_ck_lai',
        70 => '_tien_ck',
        71 => 'lktql',
        72 => 'lktqlyt',
        73 => 'lktqltn',
        74 => 'lkpt_bhxh',
        75 => 'lkpt_bhyt',
        76 => 'lkpt_bhtn',
        77 => 'sld_dk',
        78 => 'sldtn_dk',
        79 => '_sldtang',
        80 => '_sldgiam',
        81 => '_sldtntang',
        82 => '_sldtngiam',
        83 => '_pst_bh',
        84 => '_psg_bh',
        85 => '_pst_yt',
        86 => '_psg_yt',
        87 => '_pst_tn',
        88 => '_psg_tn',
        89 => '_lsbh',
        90 => '_lsyt',
        91 => '_lstn',
        92 => '_tientlbh',
        93 => '_tientlyt',
        94 => '_tientltn',
        95 => '_lai1_ps',
        96 => '_lai2_ps',
        97 => '_lai3_ps',
        98 => '_lai1_dt',
        99 => '_lai2_dt',
        100 => '_lai3_dt',
        101 => '_dk_lai1',
        102 => '_dk_lai2',
        103 => '_dk_lai3',
        104 => '_ck_lai1',
        105 => '_ck_lai2',
        106 => '_ck_lai3',
        107 => 'thanghtyt',
        108 => 'sothangyt',
        109 => 'tylenoyt'
    );
    private function getMaquanByMdvi($madvi)
    {
        $lastChar = strtoupper(substr($madvi, -1));
        switch ($lastChar) {
            case 'Z':
                return 9; //BHXH TP Đà Nẵng
                break;
            case 'A':
                return 1; //Quận Liên Chiểu
                break;
            case 'B':
                return 2; //Quận Thanh Khê
                break;
            case 'C':
                return 3; //Quận Hải Châu
                break;
            case 'D':
                return 4; //Quận Sơn Trà
                break;
            case 'E':
                return 5; //Quận Ngũ Hành Sơn
                break;
            case 'F':
                return 6; //Huyện Hòa Vang
                break;
            case 'G':
                return 7; //Huyện Hoàng Sa
                break;
            case 'H':
                return 8; //Quận Cẩm Lệ
                break;
            
            default:
                return -1;
                break;
        }
    }
    public function upload(Request $request)
    {
        $attributes = [
            'data_excel' => Lang::get('attr.excel.data_excel'),
        ];
        $this->validate(
            $request, 
            [
                'data_excel' => 'required',
            ],
            [],
            $attributes
        );
        $response = array();
        if($file = $request->hasFile('data_excel')) {
            
            $file = $request->file('data_excel') ;
            
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            if('xlsx' != $extension)
            {
                $response['error'] = "Upload không thành công: Chỉ chấp nhận định dạng file xlsx";
                return response()->json($response);
            }

            $destinationPath = public_path().'/upload/' ;
            $file->move($destinationPath, $fileName);
            
            $target_file = $destinationPath.$fileName;
            $workbook = SpreadsheetParser::open($target_file);
            $myWorksheetIndex = $workbook->getWorksheetIndex('Sheet0');

            $date = new \DateTime('now');
            $created_at = $date->format('Y-m-d H:i:s');
            $password =  "$2a$10$72b8f174942af3825792cutaprYbqIDwLvbn7CSXZBp1lmuhbz/YS";

            $insertReport = array();
            $insertsUser = array();

            $numberOfRecord = 0;

            foreach ($workbook->createRowIterator($myWorksheetIndex) as $rowIndex => $values) 
            {
                if($rowIndex <= 2)
                    continue;
                $madvi = $values[array_search("madvi", self::$mappingIndex)];
                $ma_quan = intval($values[array_search("ma_quan", self::$mappingIndex)]);
                if($ma_quan == -1)
                {
                    $response['error'] = "Upload không thành công: dữ liệu quận không đúng";
                    return response()->json($response);
                }
                // var_dump($values);
                $insertReport[] =
                    "('" . $madvi . "', " . // String
                    "'" . $values[array_search("tendvi", self::$mappingIndex)] . "', " . // String 
                    "'" . $values[array_search("diachi", self::$mappingIndex)] . "', " . // String
                    $ma_quan .",".
                    "'" . $values[array_search("thang", self::$mappingIndex)] . "', " . // String
                    intval( $values[array_search("du_dk", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dk_bhxh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dk_bhyt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dk_bhtn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_tien_dk", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ps_bh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ps_yt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ps_tn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_bst_bh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_bst_yt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_bst_tn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_bsg_bh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_bsg_yt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_bsg_tn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("sld", self::$mappingIndex)]) .",".
                    intval( $values[array_search("sldtn", self::$mappingIndex)]) .",".
                    "'" . $values[array_search("thanght", self::$mappingIndex)] . "', " . // String
                    intval( $values[array_search("_tien_unc", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dt_bhxh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dt_bhyt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dt_bhtn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dt_lai", self::$mappingIndex)]) .",".
                    intval( $values[array_search("du_ck", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ck_bhxh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ck_bhyt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ck_bhtn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_tien_ck", self::$mappingIndex)]) .",".
                    intval( $values[array_search("sld_dk", self::$mappingIndex)]) .",".
                    intval( $values[array_search("sldtn_dk", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_sldtang", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_sldgiam", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_sldtntang", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_sldtngiam", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_pst_bh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_psg_bh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_pst_yt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_psg_yt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_pst_tn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_psg_tn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_tientlbh", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_tientlyt", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_tientltn", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_lai1_ps", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_lai2_ps", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_lai3_ps", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dk_lai1", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dk_lai2", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_dk_lai3", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ck_lai1", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ck_lai2", self::$mappingIndex)]) .",".
                    intval( $values[array_search("_ck_lai3", self::$mappingIndex)]) .",".
                    "'" . $values[array_search("thanghtyt", self::$mappingIndex)] . "', ". // String
                    "'" . $created_at . "')";// String

                $insertsUser[] = "('".$values[0]."', '".$password."', '".$values[2]."', '".$values[5]."', '".$values[6]."', '".$values[7]."', '".$created_at."')";
                if(++$numberOfRecord % 1000 == 0)
                {
                    $queryInfo = "INSERT INTO tbl_full_informations(`madvi`, `tendvi`, `diachi`, `ma_quan`, `thang`, `du_dk`, `_dk_bhxh`, `_dk_bhyt`, `_dk_bhtn`, `_tien_dk`, `_ps_bh`, `_ps_yt`, `_ps_tn`, `_bst_bh`, `_bst_yt`, `_bst_tn`, `_bsg_bh`, `_bsg_yt`, `_bsg_tn`, `sld`, `sldtn`, `thanght`, `_tien_unc`, `_dt_bhxh`, `_dt_bhyt`, `_dt_bhtn`, `_dt_lai`, `du_ck`, `_ck_bhxh`, `_ck_bhyt`, `_ck_bhtn`, `_tien_ck`, `sld_dk`, `sldtn_dk`, `_sldtang`, `_sldgiam`, `_sldtntang`, `_sldtngiam`, `_pst_bh`, `_psg_bh`, `_pst_yt`, `_psg_yt`, `_pst_tn`, `_psg_tn`, `_tientlbh`, `_tientlyt`, `_tientltn`, `_lai1_ps`, `_lai2_ps`, `_lai3_ps`, `_dk_lai1`, `_dk_lai2`, `_dk_lai3`, `_ck_lai1`, `_ck_lai2`, `_ck_lai3`, `thanghtyt`, `created_at`) VALUES ".implode(",", $insertReport);
                    // On duplicate
                    $queryInfo .= " ON DUPLICATE KEY UPDATE `madvi` = VALUES(`madvi`), `tendvi` = VALUES(`tendvi`), `diachi` = VALUES(`diachi`), `ma_quan` = VALUES(`ma_quan`), `thang` = VALUES(`thang`), `du_dk` = VALUES(`du_dk`),`_dk_bhxh` = VALUES(`_dk_bhxh`), `_dk_bhyt` = VALUES(`_dk_bhyt`), `_dk_bhtn` = VALUES(`_dk_bhtn`), `_tien_dk` = VALUES(`_tien_dk`), `_ps_bh` = VALUES(`_ps_bh`), `_ps_yt` = VALUES(`_ps_yt`), `_ps_tn` = VALUES(`_ps_tn`), `_bst_bh` = VALUES(`_bst_bh`), `_bst_yt` = VALUES(`_bst_yt`), `_bst_tn` = VALUES(`_bst_tn`), `_bsg_bh` = VALUES(`_bsg_bh`), `_bsg_yt` = VALUES(`_bsg_yt`), `_bsg_tn` = VALUES(`_bsg_tn`), `sld` = VALUES(`sld`), `sldtn` = VALUES(`sldtn`), `thanght` = VALUES(`thanght`), `_tien_unc` = VALUES(`_tien_unc`), `_dt_bhxh` = VALUES(`_dt_bhxh`), `_dt_bhyt` = VALUES(`_dt_bhyt`), `_dt_bhtn` = VALUES(`_dt_bhtn`), `_dt_lai` = VALUES(`_dt_lai`), `du_ck` = VALUES(`du_ck`), `_ck_bhxh` = VALUES(`_ck_bhxh`), `_ck_bhyt` = VALUES(`_ck_bhyt`), `_ck_bhtn` = VALUES(`_ck_bhtn`), `_tien_ck` = VALUES(`_tien_ck`), `sld_dk` = VALUES(`sld_dk`), `sldtn_dk` = VALUES(`sldtn_dk`), `_sldtang` = VALUES(`_sldtang`), `_sldgiam` = VALUES(`_sldgiam`), `_sldtntang` = VALUES(`_sldtntang`), `_sldtngiam` = VALUES(`_sldtngiam`), `_pst_bh` = VALUES(`_pst_bh`), `_psg_bh` = VALUES(`_psg_bh`), `_pst_yt` = VALUES(`_pst_yt`), `_psg_yt` = VALUES(`_psg_yt`), `_pst_tn` = VALUES(`_pst_tn`), `_psg_tn` = VALUES(`_psg_tn`), `_tientlbh` = VALUES(`_tientlbh`), `_tientlyt` = VALUES(`_tientlyt`), `_tientltn` = VALUES(`_tientltn`), `_lai1_ps` = VALUES(`_lai1_ps`), `_lai2_ps` = VALUES(`_lai2_ps`), `_lai3_ps` = VALUES(`_lai3_ps`), `_dk_lai1` = VALUES(`_dk_lai1`), `_dk_lai2` = VALUES(`_dk_lai2`), `_dk_lai3` = VALUES(`_dk_lai3`), `_ck_lai1` = VALUES(`_ck_lai1`), `_ck_lai2` = VALUES(`_ck_lai2`), `_ck_lai3` = VALUES(`_ck_lai3`), `thanghtyt` = VALUES(`thanghtyt`), updated_at = '".$created_at."'"; 
                    \DB::statement($queryInfo);
                    $insertReport = array(); 

                    $queryUser = "INSERT INTO tbl_user(username, password, name, address, phone, contact, created_at) VALUES ".implode(",", $insertsUser);
                    $queryUser .= "ON DUPLICATE KEY UPDATE name = VALUES(`name`), address = VALUES(`address`), phone = VALUES(`phone`), contact = VALUES(`contact`), updated_at = '".$created_at."'";

                    \DB::statement($queryUser);
                    $insertsUser = array(); 
                }  // end if
            } // End of for each

            $queryInfo = "INSERT INTO tbl_full_informations(`madvi`, `tendvi`, `diachi`, `ma_quan`, `thang`, `du_dk`, `_dk_bhxh`, `_dk_bhyt`, `_dk_bhtn`, `_tien_dk`, `_ps_bh`, `_ps_yt`, `_ps_tn`, `_bst_bh`, `_bst_yt`, `_bst_tn`, `_bsg_bh`, `_bsg_yt`, `_bsg_tn`, `sld`, `sldtn`, `thanght`, `_tien_unc`, `_dt_bhxh`, `_dt_bhyt`, `_dt_bhtn`, `_dt_lai`, `du_ck`, `_ck_bhxh`, `_ck_bhyt`, `_ck_bhtn`, `_tien_ck`,`sld_dk`, `sldtn_dk`, `_sldtang`, `_sldgiam`, `_sldtntang`, `_sldtngiam`, `_pst_bh`, `_psg_bh`, `_pst_yt`, `_psg_yt`, `_pst_tn`, `_psg_tn`, `_tientlbh`, `_tientlyt`, `_tientltn`, `_lai1_ps`, `_lai2_ps`, `_lai3_ps`, `_dk_lai1`, `_dk_lai2`, `_dk_lai3`, `_ck_lai1`, `_ck_lai2`, `_ck_lai3`, `thanghtyt`, `created_at`) VALUES ".implode(",", $insertReport);
                            // On duplicate
            $queryInfo .= " ON DUPLICATE KEY UPDATE `madvi` = VALUES(`madvi`), `tendvi` = VALUES(`tendvi`), `diachi` = VALUES(`diachi`), `ma_quan` = VALUES(`ma_quan`), `thang` = VALUES(`thang`), `du_dk` = VALUES(`du_dk`), `_dk_bhxh` = VALUES(`_dk_bhxh`), `_dk_bhyt` = VALUES(`_dk_bhyt`), `_dk_bhtn` = VALUES(`_dk_bhtn`), `_tien_dk` = VALUES(`_tien_dk`), `_ps_bh` = VALUES(`_ps_bh`), `_ps_yt` = VALUES(`_ps_yt`), `_ps_tn` = VALUES(`_ps_tn`), `_bst_bh` = VALUES(`_bst_bh`), `_bst_yt` = VALUES(`_bst_yt`), `_bst_tn` = VALUES(`_bst_tn`), `_bsg_bh` = VALUES(`_bsg_bh`), `_bsg_yt` = VALUES(`_bsg_yt`), `_bsg_tn` = VALUES(`_bsg_tn`), `sld` = VALUES(`sld`), `sldtn` = VALUES(`sldtn`), `thanght` = VALUES(`thanght`), `_tien_unc` = VALUES(`_tien_unc`), `_dt_bhxh` = VALUES(`_dt_bhxh`), `_dt_bhyt` = VALUES(`_dt_bhyt`), `_dt_bhtn` = VALUES(`_dt_bhtn`), `_dt_lai` = VALUES(`_dt_lai`), `du_ck` = VALUES(`du_ck`), `_ck_bhxh` = VALUES(`_ck_bhxh`), `_ck_bhyt` = VALUES(`_ck_bhyt`), `_ck_bhtn` = VALUES(`_ck_bhtn`), `_tien_ck` = VALUES(`_tien_ck`), `sld_dk` = VALUES(`sld_dk`), `sldtn_dk` = VALUES(`sldtn_dk`), `_sldtang` = VALUES(`_sldtang`), `_sldgiam` = VALUES(`_sldgiam`), `_sldtntang` = VALUES(`_sldtntang`), `_sldtngiam` = VALUES(`_sldtngiam`), `_pst_bh` = VALUES(`_pst_bh`), `_psg_bh` = VALUES(`_psg_bh`), `_pst_yt` = VALUES(`_pst_yt`), `_psg_yt` = VALUES(`_psg_yt`), `_pst_tn` = VALUES(`_pst_tn`), `_psg_tn` = VALUES(`_psg_tn`), `_tientlbh` = VALUES(`_tientlbh`), `_tientlyt` = VALUES(`_tientlyt`), `_tientltn` = VALUES(`_tientltn`), `_lai1_ps` = VALUES(`_lai1_ps`), `_lai2_ps` = VALUES(`_lai2_ps`), `_lai3_ps` = VALUES(`_lai3_ps`), `_dk_lai1` = VALUES(`_dk_lai1`), `_dk_lai2` = VALUES(`_dk_lai2`), `_dk_lai3` = VALUES(`_dk_lai3`), `_ck_lai1` = VALUES(`_ck_lai1`), `_ck_lai2` = VALUES(`_ck_lai2`), `_ck_lai3` = VALUES(`_ck_lai3`), `thanghtyt` = VALUES(`thanghtyt`), updated_at = '".$created_at."'";
                \DB::statement($queryInfo);

            $queryUser = "INSERT INTO tbl_user(username, password, name, address, phone, contact, created_at) VALUES ".implode(",", $insertsUser);
            $queryUser .= "ON DUPLICATE KEY UPDATE name = VALUES(`name`), address = VALUES(`address`), phone = VALUES(`phone`), contact = VALUES(`contact`), updated_at = '".$created_at."'";
            
            \DB::statement($queryUser);
            $insertsUser = array();
            unlink($target_file);
            return response()->json($response);

        } 
        else
        {
            $response['error'] = "Upload không thành công: lỗi chưa xác định!!!";
            return response()->json($response);
        }
    }

}
