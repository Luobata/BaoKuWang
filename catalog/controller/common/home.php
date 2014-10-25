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

        /*
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
        */

        // 获取广告横图
        $Helper = new Helper();
        $banner_images = $Helper->http_post( HTTP_SERVER . '/admin/index.php?route=design/banner/getBanner_shop' , array( 'secret'=>SECRET , 'bid'=>'9' ));
        $this->data['banner_images'] = $Helper->string_to_array($banner_images,'#split#','image','link');

        // 获取宝贝推荐
        $Helper = new Helper();
        $recommend_images = $Helper->http_post( HTTP_SERVER . '/admin/index.php?route=design/banner/getBanner_shop' , array( 'secret'=>SECRET , 'bid'=>'10' ));
        $this->data['recommend_images'] = $Helper->string_to_array($recommend_images,'#split#','image','link');
        //var_dump($recommend_images,$this->data['recommend_images']);

        // 获取最热宝贝
        $Helper = new Helper();
        $hot_images = $Helper->http_post( HTTP_SERVER . '/admin/index.php?route=design/banner/getBanner_shop' , array( 'secret'=>SECRET , 'bid'=>'11' ));
        $this->data['hot_images'] = $Helper->string_to_array($hot_images,'#split#','image','link');
        //var_dump($this->data['hot_images']);

        // 获取按分类的商品展示数据
        $this->load->model('catalog/product');
        $limit = 8;
        $parent_category_id_list = array(63,59);
        $this->data['parent_category_id_list'] = $parent_category_id_list;
        $this->data['children_polular_product'] = array();
        $this->data['parent_polular_product'] = array();
        foreach( $parent_category_id_list as $parent_category_id ) {
            // children
            $children_category_id = $this->model_catalog_category->getCategoriesIdByParent($parent_category_id);
            $children_polular_product = array();
            foreach( $children_category_id as $child ) {
                $children_polular_product[$child['id']] = $this->model_catalog_product->getPopularProducts($child['id'],$limit);
            }
            $this->data['children_polular_product'][$parent_category_id] = $children_polular_product;
            // parent
            $parent_polular_product = array();
            foreach( $children_polular_product as $child ) {
                foreach( $child as $product_id => $product_info ) {
                    $parent_polular_product[$product_id] = $product_info;
                }
            }
            $this->data['parent_polular_product'][$parent_category_id] = $parent_polular_product;
        }
        //var_dump($this->data['parent_polular_product']);

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