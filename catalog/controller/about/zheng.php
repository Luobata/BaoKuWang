<?php
class ControllerAboutZheng extends Controller {
    public function index() {
        // 标题
        $this->document->setTitle('正品保证');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/zheng.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/zheng.tpl';
        } else {
            $this->template = 'default/template/about/zheng.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function zhuanjia(){
        // 标题
        $this->document->setTitle('专家评估');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/zhuanjia.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/zhuanjia.tpl';
        } else {
            $this->template = 'default/template/about/zhuanjia.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function quanwei(){
        // 标题
        $this->document->setTitle('权威评估');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/quanwei.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/quanwei.tpl';
        } else {
            $this->template = 'default/template/about/quanwei.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

     public function qitian(){
        // 标题
        $this->document->setTitle('7天退货');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/qitian.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/qitian.tpl';
        } else {
            $this->template = 'default/template/about/qitian.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function wuxing(){
        // 标题
        $this->document->setTitle('五星服务流程');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/wuxing.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/wuxing.tpl';
        } else {
            $this->template = 'default/template/about/wuxing.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function gouwu(){
        // 标题
        $this->document->setTitle('购物流程');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/gouwu.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/gouwu.tpl';
        } else {
            $this->template = 'default/template/about/gouwu.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function changjian(){
        // 标题
        $this->document->setTitle('常见问题');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/changjian.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/changjian.tpl';
        } else {
            $this->template = 'default/template/about/changjian.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function liansuo(){
        // 标题
        $this->document->setTitle('连锁查询');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/liansuo.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/liansuo.tpl';
        } else {
            $this->template = 'default/template/about/liansuo.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function mianze(){
        // 标题
        $this->document->setTitle('免责声明');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/mianze.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/mianze.tpl';
        } else {
            $this->template = 'default/template/about/mianze.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function tuihuo(){
        // 标题
        $this->document->setTitle('退货说明');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/tuihuo.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/tuihuo.tpl';
        } else {
            $this->template = 'default/template/about/tuihuo.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

    public function guanyu(){
        // 标题
        $this->document->setTitle('关于我们');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );
        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/about/guanyu.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/about/guanyu.tpl';
        } else {
            $this->template = 'default/template/about/guanyu.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }

}