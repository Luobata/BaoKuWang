<?php
class ControllerAccountNew extends Controller {
    public function index() {

        // 检测登录
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/account', '', 'SSL');

            $this->redirect($this->url->link('account/login', '', 'SSL'));
        }

        // 标题
        $this->document->setTitle('我要寄卖');

        // 面包屑
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '我要寄卖',
            'href'      => $this->url->link('account/new', '', 'SSL'),
            'separator' => $this->language->get('text_separator')
        );

        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/new.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/account/new.tpl';
        } else {
            $this->template = 'default/template/account/new.tpl';
        }

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );

        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/woyaojimai.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }
}
?>