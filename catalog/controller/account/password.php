<?php
class ControllerAccountPassword extends Controller {
	private $error = array();

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/password', '', 'SSL');

			$this->redirect($this->url->link('account/login', '', 'SSL'));
		}

		$cid=$_SESSION['customer_id'];
		$this->load->model('catalog/product');
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
		$this->language->load('account/password');
		
		$this->document->setTitle($this->language->get('heading_title'));
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('account/customer');

			$this->model_account_customer->editPassword($this->customer->getEmail(), $this->request->post['password']);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('account/account', '', 'SSL'));
		}


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
			'href'      => $this->url->link('account/password', '', 'SSL'),
			'separator' => $this->language->get('text_separator')
		);

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_password'] = $this->language->get('text_password');

		$this->data['entry_password'] = $this->language->get('entry_password');
		$this->data['entry_confirm'] = $this->language->get('entry_confirm');

		$this->data['button_continue'] = $this->language->get('button_continue');
		$this->data['button_back'] = $this->language->get('button_back');

		if (isset($this->error['password'])) { 
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}

		if (isset($this->error['confirm'])) { 
			$this->data['error_confirm'] = $this->error['confirm'];
		} else {
			$this->data['error_confirm'] = '';
		}
		if (isset($this->error['oldpassword'])) { 
			$this->data['error_oldpassword'] = $this->error['oldpassword'];
		} else {
			$this->data['error_oldpassword'] = '';
		}

		$this->data['action'] = $this->url->link('account/password', '', 'SSL');

		if (isset($this->request->post['password'])) {
			$this->data['password'] = $this->request->post['password'];
		} else {
			$this->data['password'] = '';
		}

		if (isset($this->request->post['confirm'])) {
			$this->data['confirm'] = $this->request->post['confirm'];
		} else {
			$this->data['confirm'] = '';
		}
		if (isset($this->request->post['oldpassword'])) {
			$this->data['oldpassword'] = $this->request->post['oldpassword'];
		} else {
			$this->data['oldpassword'] = '';
		}

		$this->data['back'] = $this->url->link('account/account', '', 'SSL');
		$this->document->addStyle('catalog/view/theme/default/stylesheet/baoku/userinfo.css');
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/password.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/password.tpl';
		} else {
			$this->template = 'default/template/account/password.tpl';
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

	protected function validate() {
		if ((utf8_strlen($this->request->post['password']) < 4) || (utf8_strlen($this->request->post['password']) > 20)) {
			$this->error['password'] = $this->language->get('error_password');
		}

		if ($this->request->post['confirm'] != $this->request->post['password']) {
			$this->error['confirm'] = $this->language->get('error_confirm');
		}
		//获取旧密码的加密值
		$this->load->model('account/customer');
		$op=$this->model_account_customer->getCustomerByEmail($this->customer->getEmail())['password'];
		$salt=$this->model_account_customer->getCustomerByEmail($this->customer->getEmail())['salt'];
		//echo($op);
		//echo(sha1($salt . sha1($salt . sha1($this->request->post['oldpassword']))));
		if (sha1($salt . sha1($salt . sha1($this->request->post['oldpassword'])))!=$op) {
			$this->error['oldpassword'] = '旧密码不正确';
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>
