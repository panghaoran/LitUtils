<?php 

namespace lit\litool;

/**
 * liarray: litool PHP 数组部分
 * @author  litong
 * @since   1.0
 **/

class liarray {

    /** 
     * init
     * 测试调用
     * @access public
     * @since  1.0 
     * @return string
     **/
    public static function init (){
        $PreStr = __CLASS__.'::'.__FUNCTION__;
        if ( !function_exists('spl_autoload') ) {
            throw new \exception ($PreStr.' SPL extension not exist!');
        }
        return $PreStr.' success';
    }

    /** 
     * RegexArray
     * 通过正则表达式匹配一维数组的值,返回正则表达式匹配部分
     * @access public
     * @param  array  $array 要匹配的数组
     * @param  string $regex 要执行的这则表达式
     * @since  1.0 
     * @return array
     **/
    public static function RegexArray ( $array=array(),$regex='' ) {
        if ( empty($array) || !is_array ($array) || empty($regex) ) {
            return $array;
        }
        $ArrIter = new \ArrayIterator($array);
        $iterator = new \RegexIterator($ArrIter,$regex);
        return iterator_to_array($iterator);
    }
    
    /** 
     * ArrayReplace
     * 递归替换多维数中指定的字符串
     * @access public
     * @param  string $search  搜索被替换的字符串
     * @param  string $replace 替换成的字符串
     * @param  array  $array   被替换的数组
     * @since  1.0 
     * @return array
     **/
    public static function ArrayReplace( $search, $replace, $array ){
        if ( empty($search) || empty($replace) || empty($array) ) {
            return $array;
        }
        if ( is_array($array) ){
            foreach ($array as $key => &$val) {
                $array[$key] = self::ArrayReplace($search,$replace,$val);
            }
            return $array;
        }else{
            return str_replace ( $search , $replace , $array );
        }
    }


}
