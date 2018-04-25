<?php
    class libraryString{
        public $id;
       public function convertUtf8ToLatin($text) {
            $text = str_replace(
                array(' ','&quot;','%',"/"," - ",":",'<','>','?',"#","^","`","'","=","!",":",".","..","*","&","__","- "," -","  ",',','`','“','”','"'),
                array(' ','','' ,''," "," "," ","","","",""," ",""," "," "," ","","","","",""," "," "," ",'','','','',''),
                $text);

            $chars = array("a","A","e","E","o","O","u","U","i","I","d", "D","y","Y");

            $uni[0] = array("á","à","ạ","ả","ã","â","ấ","ầ","ậ","ẩ","ẫ","ă","ắ","ằ","ặ","ẳ","ẵ");
            $uni[1] = array("Á","À","Ạ","Ả","Ã","Â","Ấ","Ầ","Ậ","Ẩ","Ẫ","Ă","Ắ","Ằ","Ặ","Ẳ","Ẵ");
            $uni[2] = array("é","è","ẹ","ẻ","ẽ","ê","ế","ề","ệ","ể","ễ");
            $uni[3] = array("É","È","Ẹ","Ẻ","Ẽ","Ê","Ế","Ề","Ệ","Ể","Ễ");
            $uni[4] = array("ó","ò","ọ","ỏ","õ","ô","ố","ồ","ộ","ổ","ỗ","ơ","ớ","ờ","ợ","ở","ỡ");
            $uni[5] = array("Ó","Ò","Ọ","Ỏ","Õ","Ô","Ố","Ồ","Ộ","Ổ","Ỗ","Ơ","Ớ","Ờ","Ợ","Ở","Ỡ");
            $uni[6] = array("ú","ù","ụ","ủ","ũ","ư","ứ","ừ","ự","ử","ữ");
            $uni[7] = array("Ú","Ù","Ụ","Ủ","Ũ","Ư","Ứ","Ừ","Ự","Ử","Ữ");
            $uni[8] = array("í","ì","ị","ỉ","ĩ");
            $uni[9] = array("Í","Ì","Ị","Ỉ","Ĩ");
            $uni[10] = array("đ");
            $uni[11] = array("Đ");
            $uni[12] = array("ý","ỳ","ỵ","ỷ","ỹ");
            $uni[13] = array("Ý","Ỳ","Ỵ","Ỷ","Ỹ");

            for($i=0; $i<=13; $i++) {
                $text = str_replace($uni[$i],$chars[$i],$text);
            }

            $text = str_replace(' ', '-', $text);
            $text = strtolower($text);

            return $text;
        }
        function summary($str, $limit=100, $dot = null, $strip = false) {
            $str = ($strip == true)?strip_tags($str):$str;
            if (strlen ($str) > $limit) {
                $str = substr ($str, 0, $limit - 3);
                return (substr ($str, 0, strrpos ($str, ' ')).$dot);
            }
            return trim($str);
        }
        function getSefUrlFromName($name, $length = 60,$id, $duoi){
            $this->id=$id;
            $sef_url = STVString::convertUtf8ToLatin($name);
            $sef_url = str_replace(array(" ","--","---"),array("-","-","-"),trim($sef_url));
            $sef_url = substr($sef_url, 0, $length);
            return $sef_url;
        }
    }

?>