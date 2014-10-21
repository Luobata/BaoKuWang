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

        // 获取地区数据
        $this->load->model('localisation/zone');
        $this->data['zones'] = $this->model_localisation_zone->getZonesByCountryId(44);
        //var_dump($this->data['zones']);

        // 渲染页面
        $this->response->setOutput($this->render($styles));

        //$Helper = new Helper();
        //$form_output = $Helper->http_post( HTTP_SERVER . 'admin/index.php?route=catalog/product/insert_customer' ,
                                           //array( 'cid' => $this->customer->getId() ) );
        //echo $form_output;
    }

    public function insert() {

        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            $data = $_POST;
            $data['cid'] = $this->customer->getId();
            $data['secret'] = SECRET;

            //var_dump($data);
            //exit();

            // POST 转换
            $post_split = '#split#';
            $product_image = '';
            foreach( $data['product_image'] as $image ) {
                if($image['image']){
                    $product_image .= ( $post_split . $image['image'] . $post_split . $image['sort_order'] );
                } else {
                    continue;
                }
            }
            if( $product_image ) {
                $data['product_image'] = substr($product_image,strlen($post_split));
            } else {
                unset($data['product_image']);
            }

            // DO POST
            $Helper = new Helper();
            $Helper->http_post(HTTP_SERVER.'admin/index.php?route=catalog/product/insert_customer',$data);
            //echo $Helper->http_post(HTTP_SERVER.'admin/index.php?route=catalog/product/insert_customer',$data);
            //exit();
        }

        $this->redirect(HTTP_SERVER.'index.php?route=account/new');

    }
}
?>