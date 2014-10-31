<?php
class ControllerAccountEdit extends Controller {
	private $error = array();

	public function index() {
        //echo 'aa';
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/edit', '', 'SSL');

			$this->redirect($this->url->link('account/login', '', 'SSL'));
		}

		$this->language->load('account/edit');

		$cid = $this->customer->getId();//$_SESSION['customer_id'];
        //echo $cid.'aaaa';
		$this->load->model('catalog/product');
		//获取已发布 已下架 未鉴定 已鉴定 收藏的数目
		//收藏宝贝数
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
		//var_dump($postnum);

		$this->data['postnum']=$postnum;

		$this->document->setTitle($this->language->get('编辑资料'));
		$this->load->model('localisation/zone');
		$this->data['zones']=$this->model_localisation_zone->getZonesByCountryId(44);
		//var_dump($this->data['zones']);
		$this->load->model('account/customer');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_account_customer->editCustomer($this->request->post);

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
			'text'      => $this->language->get('text_edit'),
			'href'      => $this->url->link('account/edit', '', 'SSL'),       	
			'separator' => $this->language->get('text_separator')
		);

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_your_details'] = $this->language->get('text_your_details');

		$this->data['entry_firstname'] = $this->language->get('entry_firstname');
		$this->data['entry_lastname'] = $this->language->get('entry_lastname');
		$this->data['entry_email'] = $this->language->get('entry_email');
		$this->data['entry_telephone'] = $this->language->get('entry_telephone');
		$this->data['entry_fax'] = $this->language->get('entry_fax');
		//$this->data['entry_name']=$this->language->get('entry_name');
		//var_dump($this->data);
		$this->data['button_continue'] = $this->language->get('button_continue');
		$this->data['button_back'] = $this->language->get('button_back');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['firstname'])) {
			$this->data['error_firstname'] = $this->error['firstname'];
		} else {
			$this->data['error_firstname'] = '';
		}

		if (isset($this->error['lastname'])) {
			$this->data['error_lastname'] = $this->error['lastname'];
		} else {
			$this->data['error_lastname'] = '';
		}

		if (isset($this->error['email'])) {
			$this->data['error_email'] = $this->error['email'];
		} else {
			$this->data['error_email'] = '';
		}	

		if (isset($this->error['telephone'])) {
			$this->data['error_telephone'] = $this->error['telephone'];
		} else {
			$this->data['error_telephone'] = '';
		}
		if (isset($this->error['qq'])) {
			$this->data['error_qq'] = $this->error['qq'];
		} else {
			$this->data['error_qq'] = '';
		}
		if (isset($this->error['wechat'])) {
			$this->data['error_wechat'] = $this->error['wechat'];
		} else {
			$this->data['error_wechat'] = '';
		}
		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = '';
		}
        if (isset($this->error['nickname'])) {
            $this->data['error_nickname'] = $this->error['nickname'];
        } else {
            $this->data['error_nickname'] = '';
        }

		if (isset($this->error['place'])) {
			$this->data['error_place'] = $this->error['place'];
		} else {
			$this->data['error_place'] = '';
		}	

		$this->data['action'] = $this->url->link('account/edit', '', 'SSL');

		if ($this->request->server['REQUEST_METHOD'] != 'POST') {
			$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());
		}

		if (isset($this->request->post['firstname'])) {
			$this->data['firstname'] = $this->request->post['firstname'];
		} elseif (isset($customer_info)) {
			$this->data['firstname'] = $customer_info['firstname'];
		} else {
			$this->data['firstname'] = '';
		}

		if (isset($this->request->post['lastname'])) {
			$this->data['lastname'] = $this->request->post['lastname'];
		} elseif (isset($customer_info)) {
			$this->data['lastname'] = $customer_info['lastname'];
		} else {
			$this->data['lastname'] = '';
		}

		if (isset($this->request->post['email'])) {
		 	$this->data['email'] = $this->request->post['email'];
		} elseif (isset($customer_info)) {
			$this->data['email'] = $customer_info['email'];
		} else {
			$this->data['email'] = '';
		}

		if (isset($this->request->post['telephone'])) {
			$this->data['telephone'] = $this->request->post['telephone'];
		} elseif (isset($customer_info)) {
			$this->data['telephone'] = $customer_info['telephone'];
		} else {
			$this->data['telephone'] = '';
		}

		if (isset($this->request->post['fax'])) {
			$this->data['fax'] = $this->request->post['fax'];
		} elseif (isset($customer_info)) {
			$this->data['fax'] = $customer_info['fax'];
		} else {
			$this->data['fax'] = '';
		}
		if (isset($this->request->post['name'])) {
			$this->data['name'] = $this->request->post['name'];
		} elseif (isset($customer_info)) {
			$this->data['name'] = $customer_info['name'];
		} else {
			$this->data['name'] = '';
		}
        if (isset($this->request->post['nickname'])) {
            $this->data['nickname'] = $this->request->post['nickname'];
        } elseif (isset($customer_info)) {
            $this->data['nickname'] = $customer_info['nickname'];
        } else {
            $this->data['nickname'] = '';
        }
		if (isset($this->request->post['place'])) {
			$this->data['place'] = $this->request->post['place'];
		} elseif (isset($customer_info)) {
			$this->data['place'] = $customer_info['place'];
		} else {
			$this->data['place'] = '';
		}
		if (isset($this->request->post['qq'])) {
			$this->data['qq'] = $this->request->post['qq'];
		} elseif (isset($customer_info)) {
			$this->data['qq'] = $customer_info['qq'];
		} else {
			$this->data['qq'] = '';
		}
		if (isset($this->request->post['wechat'])) {
			$this->data['wechat'] = $this->request->post['wechat'];
		} elseif (isset($customer_info)) {
			$this->data['wechat'] = $customer_info['wechat'];
		} else {
			$this->data['wechat'] = '';
		}
		if (isset($this->request->post['sex'])) {
			$this->data['sex'] = $this->request->post['sex'];
		} elseif (isset($customer_info)) {
			$this->data['sex'] = $customer_info['sex'];
		} else {
			$this->data['sex'] = 0;
		}
		if (isset($this->request->post['zone'])) {
			$this->data['zone'] = $this->request->post['zone'];
		} elseif (isset($customer_info)) {
			$this->data['zone'] = $customer_info['zone'];
		} else {
			$this->data['zone'] = '省份';
		}
		//var_dump($customer_info);
		$this->data['back'] = $this->url->link('account/account', '', 'SSL');
		$this->document->addStyle('catalog/view/theme/default/stylesheet/baoku/userinfo.css');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/edit.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/edit.tpl';
		} else {
			$this->template = 'default/template/account/edit.tpl';
		}

		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'	
		);
	//var_dump($this->$error);
		$this->response->setOutput($this->render());
	}

	protected function validate() {
		// if ((utf8_strlen($this->request->post['firstname']) < 1) || (utf8_strlen($this->request->post['firstname']) > 32)) {
		// 	$this->error['firstname'] = $this->language->get('error_firstname');
		// }

		// if ((utf8_strlen($this->request->post['lastname']) < 1) || (utf8_strlen($this->request->post['lastname']) > 32)) {
		// 	$this->error['lastname'] = $this->language->get('error_lastname');
		// }

		// if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $this->request->post['email'])) {
		// 	$this->error['email'] = $this->language->get('error_email');
		// }

		// if (($this->customer->getEmail() != $this->request->post['email']) && $this->model_account_customer->getTotalCustomersByEmail($this->request->post['email'])) {
		// 	$this->error['warning'] = $this->language->get('error_exists');
		// }

        if ( (utf8_strlen($this->request->post['name']) > 4) ) {
            $this->error['name'] = '姓名不能大于4个字';
        }

        if ( utf8_strlen($this->request->post['nickname']) > 6 ) {
            $this->error['nickname'] = '昵称不能大于6个字';
        } else {
            $myid = $this->customer->getId();
            $customer = $this->model_account_customer->getCustomerByNickname($this->request->post['nickname'],$myid);
            if( !empty($customer) ) {
                $this->error['nickname'] = '此昵称已被使用';
            }
        }

        if ( ( utf8_strlen($this->request->post['wechat']) > 0 ) && ( (utf8_strlen($this->request->post['wechat']) < 3) || (utf8_strlen($this->request->post['wechat']) > 20) ) ) {
			$this->error['wechat'] = '微信号必须为3-20个字符之间';
		}
		if ( (utf8_strlen($this->request->post['qq'])>0) && ( preg_match('/^\d*$/',$this->request->post['qq']) == 0 || (utf8_strlen($this->request->post['qq']) < 5) || (utf8_strlen($this->request->post['qq']) > 18) ) ) {
			$this->error['qq'] = 'QQ号不是纯数字或长度不符合要求';
		}

		if ( (utf8_strlen($this->request->post['place'])>0) && ((utf8_strlen($this->request->post['place']) < 1) || (utf8_strlen($this->request->post['place']) > 40)) ) {
            $this->error['place'] = '地址不能大于20个字';
        }
		if ( (utf8_strlen($this->request->post['telephone'])>0) && (preg_match('/^\d*$/',$this->request->post['telephone']) == 0 || (utf8_strlen($this->request->post['telephone']) != 11)) ) {
			$this->error['telephone'] = '手机号码必须为11位数字';
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>