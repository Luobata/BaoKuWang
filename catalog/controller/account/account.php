<?php 
class ControllerAccountAccount extends Controller { 
	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/account', '', 'SSL');

			$this->redirect($this->url->link('account/login', '', 'SSL'));
		}

		$cid=$_SESSION['customer_id'];
		$this->load->model('catalog/product');
		//获取已发布 已下架 未鉴定 已鉴定 收藏的数目
		//收藏宝贝数
		//$postnum['wishlist']=count($this->session->data['wishlist']);
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
		$this->language->load('account/account');

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

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		$this->load->model('account/customer');
		$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());
		$this->data['customer_info']=$customer_info;
		//var_dump($customer_info);
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_my_account'] = $this->language->get('text_my_account');
		$this->data['text_my_orders'] = $this->language->get('text_my_orders');
		$this->data['text_my_newsletter'] = $this->language->get('text_my_newsletter');
		$this->data['text_edit'] = $this->language->get('text_edit');
		$this->data['text_password'] = $this->language->get('text_password');
		$this->data['text_address'] = $this->language->get('text_address');
		$this->data['text_wishlist'] = $this->language->get('text_wishlist');
		$this->data['text_order'] = $this->language->get('text_order');
		$this->data['text_download'] = $this->language->get('text_download');
		$this->data['text_reward'] = $this->language->get('text_reward');
		$this->data['text_return'] = $this->language->get('text_return');
		$this->data['text_transaction'] = $this->language->get('text_transaction');
		$this->data['text_newsletter'] = $this->language->get('text_newsletter');
		$this->data['text_recurring'] = $this->language->get('text_recurring');

		$this->data['edit'] = $this->url->link('account/edit', '', 'SSL');
		$this->data['password'] = $this->url->link('account/password', '', 'SSL');
		$this->data['address'] = $this->url->link('account/address', '', 'SSL');
		$this->data['wishlist'] = $this->url->link('account/wishlist');
		$this->data['order'] = $this->url->link('account/order', '', 'SSL');
		$this->data['download'] = $this->url->link('account/download', '', 'SSL');
		$this->data['return'] = $this->url->link('account/return', '', 'SSL');
		$this->data['transaction'] = $this->url->link('account/transaction', '', 'SSL');
		$this->data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');
		$this->data['recurring'] = $this->url->link('account/recurring', '', 'SSL');

		if ($this->config->get('reward_status')) {
			$this->data['reward'] = $this->url->link('account/reward', '', 'SSL');
		} else {
			$this->data['reward'] = '';
		}

		$this->document->addStyle('catalog/view/theme/default/stylesheet/baoku/userinfo.css');
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/account.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/account.tpl';
		} else {
			$this->template = 'default/template/account/account.tpl';
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
}
?>