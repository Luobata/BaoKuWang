<?php
class ControllerAccountNew extends Controller {
    public function index() {

        // 检测登录
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/account', '', 'SSL');

            $this->redirect($this->url->link('account/login', '', 'SSL'));
        }

        $this->data['form_action'] = '/index.php?route=account/new/insert';

        // 获取商品信息
        if( $this->request->server['REQUEST_METHOD'] == 'GET' && isset($this->request->get['product_id']) ) {

            $this->load->model('catalog/product');

            if( !$this->model_catalog_product->check_product_to_customer( $this->request->get['product_id'] , $this->customer->getId() ) ) {
                exit('Error');
            }

            $product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
            $this->data['product_image'] = $this->model_catalog_product->getProductImages($this->request->get['product_id']);
            $this->data['form_action'] = '/index.php?route=account/new/update';
            $this->data['product_id'] = $this->request->get['product_id'];
            //var_dump($product_info);
            //exit();
        }

        // 设置商品信息

        if( isset($product_info['category']) ) {
            $this->load->model('catalog/category');
            $this->data['category'] = $product_info['category'];
            $this->data['category_pid'] = $this->model_catalog_category->getParentId($product_info['category']);
        } else {
            $this->data['category'] = '';
        }

        if( isset($product_info['title']) ) {
            $this->data['title'] = $product_info['title'];
        } else {
            $this->data['title'] = '';
        }

        if( isset($product_info['price']) ) {
            $this->data['price'] = $product_info['price'];
        } else {
            $this->data['price'] = '';
        }

        if( isset($product_info['image']) ) {
            $this->data['image'] = $product_info['image'];
        } else {
            $this->data['image'] = '';
        }

        if( isset($product_info['detail']) ) {
            $this->data['detail'] = $product_info['detail'];
        } else {
            $this->data['detail'] = '联系我时，请说明是在宝库网看到的。';
        }

        if( isset($product_info['place']) ) {
            $this->data['place'] = $product_info['place'];
        } else {
            $this->data['place'] = $this->customer->getZone();
        }

        if( isset($product_info['owner']) ) {
            $this->data['owner'] = $product_info['owner'];
        } else {
            $this->data['owner'] = $this->customer->getName();
        }

        if( isset($product_info['mobile']) ) {
            $this->data['mobile'] = $product_info['mobile'];
        } else {
            $this->data['mobile'] = $this->customer->getTelephone();
        }

        if( isset($product_info['qq']) ) {
            $this->data['qq'] = $product_info['qq'];
        } else {
            $this->data['qq'] = $this->customer->getQQ();
        }

        if( isset($product_info['wechat']) ) {
            $this->data['wechat'] = $product_info['wechat'];
        } else {
            $this->data['wechat'] = $this->customer->getWechat();
        }

        // 获取分类数据
        $this->load->model('catalog/category');
        $categories = $this->model_catalog_category->getSuperCategories();
        $this->data['categories'] = $categories;

        // 获取地区数据
        $this->load->model('localisation/zone');
        $this->data['zones'] = $this->model_localisation_zone->getZonesByCountryId(44);
        //var_dump($this->data['zones']);

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

            //var_dump($data['detail'],htmlspecialchars_decode($data['detail']));
            //exit();
            $data['detail'] = htmlspecialchars_decode($data['detail']);

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
            $product_id = $Helper->http_post(HTTP_SERVER.'adminbaocoolove25/index.php?route=catalog/product/insert_customer',$data);
            //echo $Helper->http_post(HTTP_SERVER.'admin/index.php?route=catalog/product/insert_customer',$data);
            //exit();
        }

        if( $product_id ) {
            //详细说明
            $this->load->model('catalog/product');
            $this->model_catalog_product->updateDetail($data['detail'],$product_id);
            //跳转
            $this->redirect(HTTP_SERVER.'index.php?route=product/product&product_id='.$product_id);
        }
        else
            $this->redirect(HTTP_SERVER.'index.php?route=account/new');

    }


    public function update() {

        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            $data = $_POST;
            $data['cid'] = $this->customer->getId();
            $data['secret'] = SECRET;

            //var_dump($data['detail'],htmlspecialchars_decode($data['detail']));
            //exit();
            $data['detail'] = htmlspecialchars_decode($data['detail']);

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

            //var_dump($data);
            //exit();

            // DO POST
            $Helper = new Helper();
            $Helper->http_post(HTTP_SERVER.'adminbaocoolove25/index.php?route=catalog/product/update_customer',$data);
            //echo $Helper->http_post(HTTP_SERVER.'admin/index.php?route=catalog/product/insert_customer',$data);
            //exit();

            //跳转
            $this->redirect(HTTP_SERVER.'index.php?route=product/product&product_id='.$data['product_id']);
        }

        exit('Error');
    }

    public function delete() {
        if (($this->request->server['REQUEST_METHOD'] == 'GET')) {
            // DO POST
            $Helper = new Helper();
            $data = array( 'product_id' => $_GET['product_id'] , 'secret' => SECRET );
            $Helper->http_post(HTTP_SERVER.'adminbaocoolove25/index.php?route=catalog/product/delete_customer',$data);
            $this->redirect(HTTP_SERVER.'index.php?route=account/wishlist/postgoods&type='.$_GET['type'].'&action=success');
        }
    }
}
?>