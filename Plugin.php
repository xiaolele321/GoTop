<?php
/**
 * 页面顶部出现悬挂喵~点击触发至顶功能
 *
 * @package GoTop
 * @author Zero
 * @version 1.1.0
 * @link https://www.lolicm.com
 */

class GoTop_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->header = array('GoTop_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('GoTop_Plugin', 'footer');
    }

   /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate() {

    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form) {
        $jquery = new Typecho_Widget_Helper_Form_Element_Checkbox('jquery', array('jquery' => '禁止加载jQuery'), null, _t('Js设置'), _t('插件需要加载jQuery，如果主题模板已经引用加载JQuery，则可以勾选。'));
        $form->addInput($jquery);
    }
    

   /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form) {

    }

    
    /**
     * 页头输出相关代码
     *
     * @access public
     * @param unknown header
     * @return unknown
     */
    public static function header() {
        $Path = Helper::options()->pluginUrl . '/GoTop/';
        echo '<link rel="stylesheet" type="text/css" href="' . $Path . 'css/szgotop.css" />';
    }


    /**
     * 页脚输出相关代码
     *
     * @access public
     * @param unknown footer
     * @return unknown
     */
    public static function footer() {
        $Options = Helper::options()->plugin('GoTop');
        $Path = Helper::options()->pluginUrl . '/GoTop/';
        echo '<div class="back-to-top" style="top: -900px;"></div>';
        if (!$Options->jquery && !in_array('jquery', $Options->jquery)) {
            echo '<script type="text/javascript" src="' . $Path . 'js/jquery.min.js"></script>';
        }
        echo '<script type="text/javascript" src="' . $Path . 'js/szgotop.js"></script>';
    }
}




