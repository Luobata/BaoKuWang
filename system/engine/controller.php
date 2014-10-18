<?php
abstract class Controller {
	protected $registry;	
	protected $id;
	protected $layout;
	protected $template;
	protected $children = array();
	protected $data = array();
	protected $output;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function __get($key) {
		return $this->registry->get($key);
	}

	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}

	protected function forward($route, $args = array()) {
		return new Action($route, $args);
	}

	protected function redirect($url, $status = 302) {
		header('Status: ' . $status);
		header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url));
		exit();				
	}

    // 此函数会把 $child 执行后输出的页面内容返回
	protected function getChild($child, $styles = array(), $scripts = array(), $args = array()) {
		$action = new Action($child, $args);

		if (file_exists($action->getFile())) {
			require_once($action->getFile());

			$class = $action->getClass();

			$controller = new $class($this->registry);

            // header 设置需要的文件
            foreach ( $styles as $style ) {
                $controller->document->addStyle($style);
            }
            foreach ( $scripts as $script ) {
                $controller->document->addStyle($script);
            }

            // 执行
			$controller->{$action->getMethod()}($action->getArgs());

			return $controller->output;
		} else {
			trigger_error('Error: Could not load controller ' . $child . '!');
			exit();					
		}		
	}

	protected function hasAction($child, $args = array()) {
		$action = new Action($child, $args);

		if (file_exists($action->getFile())) {
			require_once($action->getFile());

			$class = $action->getClass();

			$controller = new $class($this->registry);

			if(method_exists($controller, $action->getMethod())){
				return true;
			}else{
				return false;
			}
		} else {
			return false;				
		}		
	}

    // 此函数会将输出内容保存在 所有者函数 的 output 成员内，并将 output 返回
	protected function render( $styles = array() , $scripts = array() ) {
		foreach ( $this->children as $child ) {
            // 如果是头部 就将需要文件传进去
            if( $child == 'common/header' ) {
                $this->data[basename($child)] = $this->getChild($child,$styles,$scripts);
            } else {
                $this->data[basename($child)] = $this->getChild($child);
            }
		}

		if (file_exists(DIR_TEMPLATE . $this->template)) {
			extract($this->data);

			ob_start();

			require(DIR_TEMPLATE . $this->template);

			$this->output = ob_get_contents();

			ob_end_clean();

			return $this->output;
		} else {
			trigger_error('Error: Could not load template ' . DIR_TEMPLATE . $this->template . '!');
			exit();				
		}
	}
}
?>