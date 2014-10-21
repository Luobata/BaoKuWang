<?php
class ControllerProductList extends Controller {

    public function index() {

        // 获取搜索参数
        if (isset($this->request->get['search'])) {
            $this->data['search'] = $this->request->get['search'];
        }

        // 获取分页参数
        if (isset($this->request->get['page'])) {
            $this->data['page'] = $this->request->get['page'];
        }

        // 获取排序参数
        $this->data['order_hot'] = false;
        $this->data['order_price'] = false;
        $this->data['order_price_desc'] = false;
        if (isset($this->request->get['order'])) {
            $this->data['order'] = $this->request->get['order'];
            // 设置页面变量
            if( strpos($this->data['order'],'hot') != false ) {
                $this->data['order_hot'] = true;
            } elseif ( strpos($this->data['order'],'price') != false ) {
                $this->data['order_price'] = true;
                if( strpos($this->data['order'],'desc') != false ) {
                    $this->data['order_price_desc'] = true;
                }
            }
        }

        // 获取过滤参数
        if (isset($this->request->get['filter_category'])) {
            $this->data['filter_category'] = $this->request->get['filter_category'];
        }
        if (isset($this->request->get['filter_place'])) {
            $this->data['filter_place'] = $this->request->get['filter_place'];
        }
        if (isset($this->request->get['filter_identify'])) {
            $this->data['filter_identify'] = $this->request->get['filter_identify'];
        }
        if (isset($this->request->get['filter_price'])) {
            $this->data['filter_price'] = $this->request->get['filter_price'];
        }

        // 获取商品信息
        $this->load->model('catalog/product');

        // 获取各类链接
        $this->data['url'] = $this->getUrl($this->data);

        // 获取分类数据
        $this->load->model('catalog/category');
        $categories = $this->model_catalog_category->getSuperCategories();
        $this->data['categories'] = $categories;

        // 标题
        $this->document->setTitle('我要寻宝');

        // 元素设置
        $this->children = array(
            'common/footer',
            'common/header'
        );

        // 页面文件
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/list.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/product/list.tpl';
        } else {
            $this->template = 'default/template/product/list.tpl';
        }

        // 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/woyaoxunbao.css'
        );

        // 渲染页面
        $this->response->setOutput($this->render($styles));
    }


    public function getUrl($data) {

        $url = array();
        $url['search'] = '';
        $url['category'] = '';
        $url['place'] = '';
        $url['identify'] = '';
        $url['price'] = '';
        $url['order'] = '';
        $url['page'] = '');

        if( isset($data['search']) ) {
            $url['category'] .= ('&search='.$data['search']);
            $url['place'] .= ('&search='.$data['search']);
            $url['identify'] .= ('&search='.$data['search']);
            $url['price'] .= ('&search='.$data['search']);
            $url['order'] .= ('&search='.$data['search']);
            $url['page'] .= ('&search='.$data['search']);
        }

        if( isset($data['filter_category']) ) {
            $url['search'] .= ('&filter_category='.$data['filter_category']);
            $url['place'] .= ('&filter_category='.$data['filter_category']);
            $url['identify'] .= ('&filter_category='.$data['filter_category']);
            $url['price'] .= ('&filter_category='.$data['filter_category']);
            $url['order'] .= ('&filter_category='.$data['filter_category']);
            $url['page'] .= ('&filter_category='.$data['filter_category']);
        }

        if( isset($data['filter_place']) ) {
            $url['search'] .= ('&filter_place='.$data['filter_place']);
            $url['category'] .= ('&filter_place='.$data['filter_place']);
            $url['identify'] .= ('&filter_place='.$data['filter_place']);
            $url['price'] .= ('&filter_place='.$data['filter_place']);
            $url['order'] .= ('&filter_place='.$data['filter_place']);
            $url['page'] .= ('&filter_place='.$data['filter_place']);
        }

        if( isset($data['filter_identify']) ) {
            $url['search'] .= ('&filter_identify='.$data['filter_identify']);
            $url['category'] .= ('&filter_identify='.$data['filter_identify']);
            $url['place'] .= ('&filter_identify='.$data['filter_identify']);
            $url['price'] .= ('&filter_identify='.$data['filter_identify']);
            $url['order'] .= ('&filter_identify='.$data['filter_identify']);
            $url['page'] .= ('&filter_identify='.$data['filter_identify']);
        }

        if( isset($data['filter_price']) ) {
            $url['search'] .= ('&filter_price='.$data['filter_price']);
            $url['category'] .= ('&filter_price='.$data['filter_price']);
            $url['place'] .= ('&filter_price='.$data['filter_price']);
            $url['identify'] .= ('&filter_price='.$data['filter_price']);
            $url['order'] .= ('&filter_price='.$data['filter_price']);
            $url['page'] .= ('&filter_price='.$data['filter_price']);
        }

        if( isset($data['order']) ) {
            $url['search'] .= ('&order='.$data['order']);
            $url['category'] .= ('&order='.$data['order']);
            $url['place'] .= ('&order='.$data['order']);
            $url['identify'] .= ('&order='.$data['order']);
            $url['price'] .= ('&order='.$data['order']);
            $url['page'] .= ('&order='.$data['order']);
        }

        if( isset($data['page']) ) {
            $url['search'] .= ('&page='.$data['page']);
            $url['category'] .= ('&page='.$data['page']);
            $url['place'] .= ('&page='.$data['page']);
            $url['identify'] .= ('&page='.$data['page']);
            $url['price'] .= ('&page='.$data['page']);
            $url['order'] .= ('&page='.$data['page']);
        }

        return $url;
    }
}