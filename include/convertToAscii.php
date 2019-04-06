<?php
/**
 * Normalize non-ASCII characters to ASCII counterparts where possible.
 *
 * https://gist.github.com/pjdietz/7342772
 * 
 * @param string $str
 * @return string
 */
function convertCharacters($str)
{
    static $normalizeChars = null;
    if ($normalizeChars === null) {
        $normalizeChars = array(
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'Ae',
            'Ç'=>'C',
            'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E',
            'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I',
            'Ð'=>'Dj',
            'Ñ'=>'N',
            'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O',
            'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U',
            'Ý'=>'Y',
            'Þ'=>'B',
            'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'ae','ầ'=>'a','ạ'=>'a','ẫ'=>'a','ặ'=>'a','ả'=>'a','ấ'=>'a',
            'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ể'=>'e','ë'=>'e','ệ'=>'e','ề'=>'e','ễ'=>'e',
            'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i','ị'=>'i',
            'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ộ'=>'o','ồ'=>'o','ơ'=>'o','ố'=>'o',
            'ù'=>'u', 'ú'=>'u', 'û'=>'u','ư'=>'u','ụ'=>'u','ự'=>'u','ũ'=>'u','ử'=>'u','ứ'=>'u',
            'ý'=>'y',
            'þ'=>'b',
            'ÿ'=>'y','ỳ'=>'y','ỹ'=>'y',
            'Š'=>'S', 'š'=>'s', 'ś' => 's',
            'Ž'=>'Z', 'ž'=>'z',
            'ƒ'=>'f'
        );
    }
    return strtr($str, $normalizeChars);
}
