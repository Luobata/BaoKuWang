<?php
final class Front {
	protected $registry;
	protected $pre_action = array();
	protected $error;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function addPreAction($pre_action) {
		$this->pre_action[] = $pre_action;
	}

	public function dispatch($action, $error) {
		$this->error = $error;

        // 预置方法，可能与安全有关，未仔细考察
		foreach ($this->pre_action as $pre_action) {
			$result = $this->execute($pre_action);

			if ($result) {
				$action = $result;

				break;
			}
		}

        //执行
		while ($action) {
			$action = $this->execute($action);
		}
	}

    // 如果存在方法，就执行且返回结果；如果不存在，就返回处理错误的方法
	private function execute($action) {
		if (file_exists($action->getFile())) {
			require_once($action->getFile());

			$class = $action->getClass();

			$controller = new $class($this->registry);

			if (is_callable(array($controller, $action->getMethod()))) {
                $action = call_user_func_array(array($controller, $action->getMethod()), $action->getArgs());
			} else {
				$action = $this->error;
				$this->error = '';
			}
		} else {
			$action = $this->error;
			$this->error = '';
		}

		return $action;
	}
}
?>