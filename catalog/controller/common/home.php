<?php  
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
		}

		// 获取分类数据
        $this->load->model('catalog/category');
        $categories = $this->model_catalog_category->getSuperCategories();
        $this->data['categories'] = $categories;
        //var_dump($categories);

        // 获取广告横图
        $Helper = new Helper();
        $banner_images = $Helper->http_post( HTTP_SERVER . '/admin/index.php?route=design/banner/getBanner_shop' , array( 'secret'=>SECRET , 'bid'=>'9' ));
        if( $banner_images ) {
            // 字符串 - 数组 回转
            $split = '#split#';
            $banner_images = (string)($banner_images);
            //var_dump($product_image);
            $banner_images = explode($split,$banner_images);
            //var_dump($product_image);
            $images = array();
            $banner_counts = count($banner_images)/2;
            foreach( $banner_images as $key => $val ) {
                if( $key < $banner_counts ) {
                    $images[] = array( 'image' => $banner_images[(2*$key)] ,
                                       'link' => $banner_images[(2*$key+1)] );
                }
            }
            $this->data['banner_images'] = $images;
        }   //var_dump($images);

        // 获取某一级分类的相关商品数据
        $limit = 8;
        $parent_category_id = 63;
        $this->load->model('catalog/product');
        // children
        $children_category_id = $this->model_catalog_category->getCategoriesIdByParent($parent_category_id);
        $children_polular_product = array();
        foreach( $children_category_id as $child ) {
            $children_polular_product[$child['id']] = $this->model_catalog_product->getPopularProducts($child['id'],$limit);
        }
        $this->data['children_polular_product'] = $children_polular_product;
        // parent
        //$parent_polular_product = $this->model_catalog_product->getPopularProducts($parent_category_id,$limit);
        $parent_polular_product = array();
        foreach( $children_polular_product as $child ) {
            foreach( $child as $product_id => $product_info ) {
                $parent_polular_product[$product_id] = $product_info;
            }
        }
        $this->data['parent_polular_product'] = $parent_polular_product;
        //var_dump($parent_polular_product,$children_polular_product);

        // 子页面
		$this->children = array(
			//'common/column_left',
			//'common/column_right',
			//'common/content_top',
			//'common/content_bottom',
			'common/footer',
			'common/header'
		);

		// 文件加载
        $styles = array(
            '/catalog/view/theme/default/stylesheet/baoku/index.css'
        );

		$this->response->setOutput($this->render($styles));

        //var_dump($this->config->get('banner_module'));
	}
}
?>