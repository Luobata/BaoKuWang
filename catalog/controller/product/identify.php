<?php
class ControllerProductIdentify extends Controller {
    public function index() {
        // 标题
        $this->document->setTitle('我要鉴定');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );

        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/identify.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/product/identify.tpl';
        } else {
            $this->template = 'default/template/product/identify.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/jianding.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }
}