<?php

class Controller extends Core
{
	protected $smarty;
	protected $module;
	protected $filter;
	protected $state;
	protected $redirectToAfterLogin;
	protected $order;
	protected $sort;


	public function __construct($module, $start_state)
	{
		parent::__construct();

		if (!$module) {
			die('Undefined Module');
		}
		if (!$start_state) {
			die('Undefined start state');
		}

		$this->smarty = $this->getSmarty();
		$this->module = $module;
		$this->state = (isset($_GET['s']) && $_GET['s'] ? $_GET['s'] : $start_state);
	}

	protected function getFilter($state = '', $module = '')
	{
		if ($state == '') {
			$state = $this->state;
		}
		if ($module == '') {
			$module = $this->module;
		}

		if (!empty($_SESSION['backend'][$module]['filter'][$state])) {
			return $_SESSION['backend'][$module]['filter'][$state];
		}
		return array();
	}

	protected function execute()
	{
		if (method_exists($this, $this->state)) {
			if (isset($_POST['filter'])) {
				if (isset($_POST['clear']) || (isset($_POST['xclear']) && $_POST['xclear'] != 'false')) {
					$_POST['filter'] = array();
				}
				$_SESSION['backend'][$this->module]['filter'][$this->state] = $_POST['filter'];
			} else if (isset($_GET['filter'])) {
				$_SESSION['backend'][$this->module]['filter'][$this->state] = $_GET['filter'];
			}
			$this->filter = (isset($_SESSION['backend'][$this->module]['filter'][$this->state]) ? $_SESSION['backend'][$this->module]['filter'][$this->state] : array());

			if (isset($_GET['order'])) {
				$this->order = $_SESSION['backend'][$this->module]['order'][$this->state] = $_GET['order'];
			} else if (isset($_SESSION['backend'][$this->module]['order'][$this->state])) {
				$this->order = $_SESSION['backend'][$this->module]['order'][$this->state];
			} else {
				$this->order = '';
			}

			if (isset($_GET['sort'])) {
				$this->sort = $_SESSION['backend'][$this->module]['sort'][$this->state] = (strtolower($_GET['sort']) == 'desc' ? 'desc' : 'asc');
			} else if (isset($_SESSION['backend'][$this->module]['sort'][$this->state])) {
				$this->sort = $_SESSION['backend'][$this->module]['sort'][$this->state];
			} else {
				$this->sort = 'asc';
			}

			$this->{$this->state}();
		} else {
			die('Undefined state');
		}

		$this->smarty->assign('filter', $this->filter);
		$this->smarty->assign('state', $this->state);
		$this->smarty->assign('order', $this->order);
		$this->smarty->assign('sort', ($this->sort == 'asc' ? 'desc' : 'asc'));
		if ($this->order != '') {
			//replace table name for smarty
			$key = $this->order;
			$key = explode('.', $key);
			if (count($key) > 1) {
				$key = $key[count($key) - 1];
			} else {
				$key = $key[0];
			}
			$sort_icon = array($key => ($this->sort == 'asc' ? '&nbsp;<span class="glyphicon glyphicon-arrow-up" alt="aufsteigend" title="aufsteigend"></span>' : '&nbsp;<span class="glyphicon glyphicon-arrow-down" alt="absteigend" title="abgsteigend"></span>'));
			$this->smarty->assign('sort_icon', $sort_icon);
		}
	}

	protected function display($template)
	{
		restore_error_handler();

		$this->smarty->display($template);
	}
}
