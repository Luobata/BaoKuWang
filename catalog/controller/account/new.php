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
            'separator' => '&nbsp;>&nbsp;'
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

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/woyaojimai.css'
        );

        // 获取分类数据
        $this->load->model('catalog/category');
        $categories = $this->model_catalog_category->getSuperCategories();
        $this->data['categories'] = $categories;

        // 渲染页面
        $this->response->setOutput($this->render($styles));





        //$Helper = new Helper();
        //$form_output = $Helper->http_post( HTTP_SERVER . 'admin/index.php?route=catalog/product/insert_customer' ,
                                           //array( 'cid' => $this->customer->getId() ) );
        //echo $form_output;
    }
}
?>