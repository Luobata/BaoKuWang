<?php 
class ControllerAccountWishList extends Controller {
	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/wishlist', '', 'SSL');

			$this->redirect($this->url->link('account/login', '', 'SSL'));
		}

		$this->language->load('account/wishlist');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (!isset($this->session->data['wishlist'])) {
			$this->session->data['wishlist'] = array();
		}

		if (isset($this->request->get['remove'])) {
			$key = array_search($this->request->get['remove'], $this->session->data['wishlist']);

			if ($key !== false) {
				unset($this->session->data['wishlist'][$key]);
			}

			$this->session->data['success'] = $this->language->get('text_remove');

			$this->redirect($this->url->link('account/wishlist'));
		}

		$this->document->setTitle($this->language->get('heading_title'));	

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_account'),
			'href'      => $this->url->link('account/account', '', 'SSL'),
			'separator' => $this->language->get('text_separator')
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('account/wishlist'),
			'separator' => $this->language->get('text_separator')
		);

		$this->data['heading_title'] = $this->language->get('heading_title');	

		$this->data['text_empty'] = $this->language->get('text_empty');

		$this->data['column_image'] = $this->language->get('column_image');
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_model'] = $this->language->get('column_model');
		$this->data['column_stock'] = $this->language->get('column_stock');
		$this->data['column_price'] = $this->language->get('column_price');
		$this->data['column_action'] = $this->language->get('column_action');

		$this->data['button_continue'] = $this->language->get('button_continue');
		$this->data['button_cart'] = $this->language->get('button_cart');
		$this->data['button_remove'] = $this->language->get('button_remove');

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		$this->data['products'] = array();
		//var_dump($this->session->data['wishlist']);
		foreach ($this->session->data['wishlist'] as $key => $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);
			//var_dump($product_info);
			if ($product_info) { 
				if ($product_info['image']) {
					$image = $this->model_tool_image->resize($product_info['image'], $this->config->get('config_image_wishlist_width'), $this->config->get('config_image_wishlist_height'));
				} else {
					$image = false;
				}

				if ($product_info['quantity'] <= 0) {
					$stock = $product_info['stock_status'];
				} elseif ($this->config->get('config_stock_display')) {
					$stock = $product_info['quantity'];
				} else {
					$stock = $this->language->get('text_instock');
				}

				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$price = false;
				}

				if ((float)$product_info['special']) {
					$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = false;
				}

				$this->data['products'][] = array(
					'product_id' => $product_info['product_id'],
					'thumb'      => $image,
					'name'       => $product_info['title'],
					'model'      => $product_info['model'],
					'stock'      => $stock,
					'price'      => $price,		
					'special'    => $special,
					'href'       => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
					'remove'     => $this->url->link('account/wishlist', 'remove=' . $product_info['product_id']),
					'date_added' => $product_info['date_added'],
					'identify'   => $product_info['identify']==0?'未鉴定':'已鉴定'
				);
			} else {
				unset($this->session->data['wishlist'][$key]);
			}
		}

		$cid=$_SESSION['customer_id'];
		//获取已发布 已下架 未鉴定 已鉴定 收藏的数目
		//收藏宝贝数
//		$postnum['wishlist']=count($this->data['products']);
        $postnum['wishlist'] = (isset($this->session->data['wishlist']))?count($this->session->data['wishlist']):'0';

        //发布宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,1)->rows;
		$postnum['up']=count($product_info_num);
		//下架宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,2)->rows;
		$postnum['down']=count($product_info_num);
		//鉴定宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,4)->rows;
		$postnum['iden']=count($product_info_num);
		//未鉴定宝贝数量
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,3)->rows;
		$postnum['uniden']=count($product_info_num);

		$this->data['postnum']=$postnum;
		//var_dump($postnum);
		//var_dump($this->data['products']);

		//加载css
		$this->document->addStyle('catalog/view/theme/default/stylesheet/baoku/userhome.css');
		$this->data['continue'] = $this->url->link('account/account', '', 'SSL');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/wishlist.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/wishlist.tpl';
		} else {
			$this->template = 'default/template/account/wishlist.tpl';
		}

		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'	
		);

		$this->response->setOutput($this->render());		
	}

	public function postgoods(){

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/wishlist', '', 'SSL');

			$this->redirect($this->url->link('account/login', '', 'SSL'));
		}


		$this->language->load('account/wishlist');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');
		//var_dump($_SESSION);
		$cid=$_SESSION['customer_id'];
		//判断搜索类型
		$type= $this->request->get['type'];
		$product_info = $this->model_catalog_product->getProductsBycidnoli($cid,$type)->rows;
		//var_dump($product_info);
		$this->data['type']=$type;
		for ($i=0; $i <sizeof($product_info) ; $i++) { 
        			$product_info[$i]['identify']=($product_info[$i]['identify']==0)?'未鉴定':'已鉴定';
        }
		// switch ($type) {
		// 	case '1':{
  //       		//已发布
  //       		for ($i=0; $i <sizeof($product_info) ; $i++) { 
  //       			$product_info[$i]['identify']="已发布";
  //       		}
        		
  //       		break;}
  //       	case '2':{
  //       		//已下架
  //       		for ($i=0; $i <sizeof($product_info) ; $i++) { 
  //       			$product_info[$i]['identify']="已下架";
  //       		}
  //       		break;}
  //       	case '3':{
  //       		//已鉴定
  //       		for ($i=0; $i <sizeof($product_info) ; $i++) { 
  //       			$product_info[$i]['identify']="未鉴定";
  //       		}
  //       		break;}
  //       	case '4':{
  //       		//未鉴定
  //       		for ($i=0; $i <sizeof($product_info) ; $i++) { 
  //       			$product_info[$i]['identify']="已鉴定";
  //       		}
  //       		break;}
		// }
		// foreach ($variable as $key => $value) {
		// 	# code...
		// }
		// foreach ($product_info as $product) {
			
		// 	$product["href"]="/index.php?route=product/product&product_id=".$product['product_id'];
		// 	;
		// }
		// foreach ($product_info as $key => $value) {
		// 	// var_dump($key);
		// 	// var_dump($value);
		// 	$product_info[$key]['href']="/index.php?route=product/product&product_id=".$value['product_id'];
		// }
		//echo($product_info[0]['href']);
		$this->data['product']=$product_info;
		//var_dump($this->data['product']);	
		//加载css
		$this->document->addStyle('catalog/view/theme/default/stylesheet/baoku/userhome.css');
		$this->data['continue'] = $this->url->link('account/account', '', 'SSL');


		//获取已发布 已下架 未鉴定 已鉴定 收藏的数目
		//收藏宝贝数
		$postnum['wishlist']=count($this->session->data['wishlist']);
		//发布宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,1)->rows;
		$postnum['up']=count($product_info_num);
		//下架宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,2)->rows;
		$postnum['down']=count($product_info_num);
		//鉴定宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,4)->rows;
		$postnum['iden']=count($product_info_num);
		//未鉴定宝贝数量
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,3)->rows;
		$postnum['uniden']=count($product_info_num);

		$this->data['postnum']=$postnum;
		//var_dump($postnum);





		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/wishlist.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/wishlist.tpl';
		} else {
			$this->template = 'default/template/account/wishlist.tpl';
		}

		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'	
		);

		$this->response->setOutput($this->render());
		


	}
	public function changestatus(){
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/wishlist', '', 'SSL');

			$this->redirect($this->url->link('account/login', '', 'SSL'));
		}

		$this->language->load('account/wishlist');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');
		//var_dump($_SESSION);
		$cid=$_SESSION['customer_id'];
		//判断搜索类型
		$type= $this->request->get['type'];
		$product_id=$this->request->get['product_id'];

		//改变status
		$this->model_catalog_product->updateStatus($product_id,$type);
		$product_info = $this->model_catalog_product->getProductsBycidnoli($cid,$type)->rows;
		//var_dump($product_info);
		$this->data['type']=$type;
		switch ($type) {
			case '1':{
        		//已发布
        		for ($i=0; $i <sizeof($product_info) ; $i++) { 
        			$product_info[$i]['identify']="已发布";
        		}
        		
        		break;}
        	case '2':{
        		//已下架
        		for ($i=0; $i <sizeof($product_info) ; $i++) { 
        			$product_info[$i]['identify']="已下架";
        		}
        		break;}
        	case '3':{
        		//已鉴定
        		for ($i=0; $i <sizeof($product_info) ; $i++) { 
        			$product_info[$i]['identify']="已鉴定";
        		}
        		break;}
        	case '4':{
        		//未鉴定
        		for ($i=0; $i <sizeof($product_info) ; $i++) { 
        			$product_info[$i]['identify']="未鉴定";
        		}
        		break;}
		}
		$this->data['product']=$product_info;
		//var_dump($this->data['product']);
		//加载css
		$this->document->addStyle('catalog/view/theme/default/stylesheet/baoku/userhome.css');
		$this->data['continue'] = $this->url->link('account/account', '', 'SSL');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/wishlist.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/wishlist.tpl';
		} else {
			$this->template = 'default/template/account/wishlist.tpl';
		}

		//获取已发布 已下架 未鉴定 已鉴定 收藏的数目
		//收藏宝贝数
		$postnum['wishlist']=count($this->session->data['wishlist']);
		//发布宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,1)->rows;
		$postnum['up']=count($product_info_num);
		//下架宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,2)->rows;
		$postnum['down']=count($product_info_num);
		//鉴定宝贝数
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,4)->rows;
		$postnum['iden']=count($product_info_num);
		//未鉴定宝贝数量
		$product_info_num = $this->model_catalog_product->getProductsBycidnoli($cid,3)->rows;
		$postnum['uniden']=count($product_info_num);

		$this->data['postnum']=$postnum;



		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'	
		);

		$this->response->setOutput($this->render());
		


	}
	public function add() {

        $json = array();

        if (!$this->customer->isLogged()) {
            $json['success'] = false;
        } else {
            $this->language->load('account/wishlist');

            if (!isset($this->session->data['wishlist'])) {
                $this->session->data['wishlist'] = array();
            }

            if (isset($this->request->post['product_id'])) {
                $product_id = $this->request->post['product_id'];
            } else {
                $product_id = 0;
            }

            $this->load->model('catalog/product');

            $product_info = $this->model_catalog_product->getProduct($product_id);

            if ($product_info) {
                if (!in_array($this->request->post['product_id'], $this->session->data['wishlist'])) {
                    $this->session->data['wishlist'][] = $this->request->post['product_id'];
                }

                if ($this->customer->isLogged()) {
                    $json['success'] = sprintf($this->language->get('text_success'), $this->url->link('product/product', 'product_id=' . $this->request->post['product_id']), $product_info['name'], $this->url->link('account/wishlist'));
                } else {
                    $json['success'] = sprintf($this->language->get('text_login'), $this->url->link('account/login', '', 'SSL'), $this->url->link('account/register', '', 'SSL'), $this->url->link('product/product', 'product_id=' . $this->request->post['product_id']), $product_info['name'], $this->url->link('account/wishlist'));
                }

                $json['total'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
            }
        }

		$this->response->setOutput(json_encode($json));
	}	

}
?>