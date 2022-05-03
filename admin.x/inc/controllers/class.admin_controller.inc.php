<?php

class Admin_Controller extends Backend_Controller
{

	protected $model;
	protected $data_per_page;

	public function __construct($module, $start_state, $require_login)
	{
		parent::__construct($module, $start_state, $require_login);

		$this->model                = new Admin_Model($this->user, $this->acl);
		$this->model->data_per_page = $this->data_per_page = 200;

		$this->smarty->assign('app', 'admin');

		parent::execute();
		parent::display('b_admin.tpl');
	}

	public function listUsers()
	{
		$this->order = Utils::validateOrder($this->order, ['lastname']);

		$cnt  = $this->model->selectUsers('', $this->filter, true);
		$data = $this->model->selectUsers('', $this->filter, false, $this->order, $this->sort);

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'users');
	}

	public function createUser()
	{
		if ($_POST) {
			$data =& $_POST['data'];
			$data = $this->model->cleanInput($data);

			$required = [
				'username' => [],
				'password' => [],
			];
			$error    = Utils::validateForm($required, $data);

			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createUser') {
					$this->model->insertUser($data);
				} elseif ($this->state == 'editUser') {
					$this->model->updateUser($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listUsers')
					: Utils::redirect(
						'?s=listUsers'
					));
			}
		} else {
			if ($this->state == 'createUser') {
				$data = [
					'active' => '1',
				];
			} elseif ($this->state == 'editUser') {
				$data = $this->model->selectUsers($_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'users');
	}

	public function editUser()
	{
		$this->createUser();
	}

	public function deleteUser()
	{
		if ($_POST) {
			$this->model->deleteUser($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listUsers')
				: Utils::redirect(
					'?s=listUsers'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listUsers');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'users');
		}
	}

	public function listCategories()
	{
		if ($this->order == '') {
			$this->order = 'sort asc, name';
		}

		$this->order = Utils::validateOrder($this->order, ['sort asc, name', 'name', 'active']);

		$cnt  = $this->model->selectCategories('0', '', $this->filter, true);
		$data = $this->model->selectCategories('0', '', $this->filter, false, $this->order, $this->sort);

		foreach ($data as $key => $val) {
			$data[$key]['active'] = Utils::opt01($val['active'], false, true);

			$childs = $this->model->selectCategories(
				$val['id'],
				'',
				$this->filter,
				false,
				$this->order,
				$this->sort,
				false
			);
			foreach ($childs as $key2 => $val2) {
				$childs[$key2]['active'] = Utils::opt01($val2['active'], false, true);
			}
			$data[$key]['childs'] = $childs;
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'categories');
	}

	public function createCategory()
	{
		if ($_POST) {
			$data  =& $_POST['data'];
			$data  = $this->model->cleanInput($data);
			$error = false;

			if ($_FILES['file']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file']['path']
						.$_SESSION['backend'][$this->module]['upload']['file']
					);
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}

				$path = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file = md5($_FILES['file']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file'],
					$path.$file,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file'] = [
						'path' => $path,
						'file' => $file,
						'name' => $_FILES['file']['name'],
					];
				}
			}

			if ($_FILES['file2']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file2']['path']
						.$_SESSION['backend'][$this->module]['upload']['file2']
					);
					$_SESSION['backend'][$this->module]['upload']['file2'] = [];
				}

				$path  = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file2 = md5($_FILES['file2']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file2']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file2'],
					$path.$file2,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file2'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file2'] = [
						'path' => $path,
						'file' => $file2,
						'name' => $_FILES['file2']['name'],
					];
				}
			}

			///////
			if ($_FILES['file_en']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file_en']['path']
						.$_SESSION['backend'][$this->module]['upload']['file_en']
					);
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}

				$path = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file = md5($_FILES['file_en']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file_en']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file_en'],
					$path.$file,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file_en'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [
						'path' => $path,
						'file' => $file,
						'name' => $_FILES['file_en']['name'],
					];
				}
			}

			if ($_FILES['file2_en']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2_en'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file2_en']['path']
						.$_SESSION['backend'][$this->module]['upload']['file2_en']
					);
					$_SESSION['backend'][$this->module]['upload']['file2_en'] = [];
				}

				$path  = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file2 = md5($_FILES['file2_en']['tmp_name']).'.'.Utils::filenameToExtension(
						$_FILES['file2_en']['name']
					);

				if ($error = Utils::uploadFile(
					$_FILES['file2_en'],
					$path.$file2,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file2_en'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file2_en'] = [
						'path' => $path,
						'file' => $file2,
						'name' => $_FILES['file2_en']['name'],
					];
				}
			}

			if (!$error) {
				$required = [
					'name'  => [],
					'alias' => [],
				];
			}

			if ($error = Utils::validateForm($required, $data)) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					$data['file']                                         = $_SESSION['backend'][$this->module]['upload']['file']['file'];
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2'])) {
					$data['file2']                                         = $_SESSION['backend'][$this->module]['upload']['file2']['file'];
					$_SESSION['backend'][$this->module]['upload']['file2'] = [];
				}

				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					$data['file_en']                                         = $_SESSION['backend'][$this->module]['upload']['file_en']['file'];
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2_en'])) {
					$data['file2_en']                                         = $_SESSION['backend'][$this->module]['upload']['file2_en']['file'];
					$_SESSION['backend'][$this->module]['upload']['file2_en'] = [];
				}

				if ($this->state == 'createCategory') {
					$data['cdate'] = time();
					$this->model->insertCategory($data);
				} elseif ($this->state == 'editCategory') {
					$this->model->updateCategory($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listCategories')
					: Utils::redirect(
						'?s=listCategories'
					));
			}
		} else {
			if ($this->state == 'createCategory') {
				$data = [
					'parent_id' => (!empty($_GET['parent_id']) ? $_GET['parent_id'] : '0'),
					'active'    => '1',
				];
			} elseif ($this->state == 'editCategory') {
				$data = $this->model->selectCategories('', $_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files', $_SESSION['backend'][$this->module]['upload']);
		}
		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files2', $_SESSION['backend'][$this->module]['upload']);
		}

		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files_en', $_SESSION['backend'][$this->module]['upload']);
		}
		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files2_en', $_SESSION['backend'][$this->module]['upload']);
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'categories');
	}

	public function editCategory()
	{
		$this->createCategory();
	}

	public function deleteCategory()
	{
		if ($_POST) {
			$this->model->deleteCategory($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listCategories')
				: Utils::redirect(
					'?s=listCategories'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listCategories');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'categories');
		}
	}

	public function listVendors()
	{
		$this->order = Utils::validateOrder(
			$this->order,
			['id', 'company', 'street', 'postalcode', 'location', 'uid', 'phone', 'email', 'active', 'package']
		);

		$cnt  = $this->model->selectVendors('', $this->filter, true);
		$data = $this->model->selectVendors('', $this->filter, false, $this->order, $this->sort);

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'vendors');
	}

	public function createVendor()
	{
		if ($_POST) {
			$data =& $_POST['data'];
			$data = $this->model->cleanInput($data);

			$required = [
				'company' => [],
			];
			$error    = Utils::validateForm($required, $data);

			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				$coordinates       = $this->model->addressToCoordinates(
					$data['street'],
					$data['postalcode'],
					$data['location']
				);
				$data['longitude'] = $coordinates['longitude'];
				$data['latitude']  = $coordinates['latitude'];

				if ($this->state == 'createVendor') {
					$this->model->insertVendor($data);
				} elseif ($this->state == 'editVendor') {
					$this->model->updateVendor($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listVendors')
					: Utils::redirect(
						'?s=listVendors'
					));
			}
		} else {
			if ($this->state == 'createVendor') {
				$data = [
					'package_payed' => '0',
					'active'        => '1',
					'package_id'    => '',
				];
			} elseif ($this->state == 'editVendor') {
				$data = $this->model->selectVendors($_GET['id']);
			}
		}

		$data['opt_allow_root_access'] = Utils::opt01($data['allow_root_access']);
		$data['opt_active']            = Utils::opt01($data['active']);
		$data['opt_payed']             = Utils::opt01($data['package_payed']);
		$data['opt_package']           = $this->model->optPackage($data['package_id']);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'vendors');
	}

	public function editVendor()
	{
		$this->createVendor();
	}

	public function deleteVendor()
	{
		if ($_POST) {
			$this->model->deleteVendor($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listVendors')
				: Utils::redirect(
					'?s=listVendors'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listVendors');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'vendors');
		}
	}

	public function listAds()
	{
		$this->order = Utils::validateOrder(
			$this->order,
			['id', 'title', 'vendor', 'category', 'active', 'fb_likes', 'fb_shares', 'fb_comments', 'valid_to']
		);

		$cnt  = $this->model->selectAds('', $this->filter, true);
		$data = $this->model->selectAds('', $this->filter, false, $this->order, $this->sort);

		foreach ($data as $key => $val) {
			$data[$key]['hash'] = sha1(md5($val['id']));
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'ads');
	}

	public function listAdLikes()
	{
		$data = $this->model->selectAds($_GET['id']);
		if (!empty($data['fb_likes_raw'])) {
			$data = json_decode($data['fb_likes_raw']);
		} else {
			$data = [];
		}

		//print_r($data);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'ads');
	}

	public function createAd()
	{
		if ($_POST) {
			$data                  =& $_POST['data'];
			$data['valid_to']      = (!empty($data['valid_to']) ? strtotime($data['valid_to']) : 0);
			$data['featured_from'] = (!empty($data['featured_from']) ? strtotime($data['featured_from']) : 0);
			$data['featured_to']   = (!empty($data['featured_to']) ? strtotime($data['featured_to']) : 0);

			$data = $this->model->cleanInput($data, ['content']);

			$required = [
				'title'    => [],
				'valid_to' => [],
			];
			$error    = Utils::validateForm($required, $data);

			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createAd') {
					$this->model->insertAd($data);
				} elseif ($this->state == 'editAd') {
					$this->model->updateAd($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listAds')
					: Utils::redirect(
						'?s=listAds'
					));
			}
		} else {
			if ($this->state == 'createAd') {
				$data = [
					'vendor_id'            => '',
					'category_id'          => '',
					'valid_to'             => (time() + 60 * 60 * 24 * 30),
					'featured'             => '0',
					'featured_from'        => '',
					'featured_to'          => '',
					'active'               => '1',
					'featured_category_id' => '',
					'type'                 => '',
				];
			} elseif ($this->state == 'editAd') {
				$data = $this->model->selectAds($_GET['id']);
			}
		}

		$data['opt_type']                 = $this->model->optAdType($data['type']);
		$data['opt_raffle_type']          = $this->model->optRaffleType($data['raffle_type']);
		$data['opt_vendor']               = $this->model->optVendor($data['vendor_id']);
		$data['opt_category']             = $this->model->optCategory($data['category_id']);
		$data['opt_active']               = Utils::opt01($data['active']);
		$data['valid_to']                 = ($data['valid_to'] ? date('d.m.Y', $data['valid_to']) : '');
		$data['opt_featured']             = Utils::opt01($data['featured']);
		$data['featured_from']            = ($data['featured_from'] ? date('d.m.Y', $data['featured_from']) : '');
		$data['featured_to']              = ($data['featured_to'] ? date('d.m.Y', $data['featured_to']) : '');
		$data['opt_featured_category_id'] = $this->model->optCategory($data['featured_category_id'], true);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'ads');
	}

	public function editAd()
	{
		$this->createAd();
	}

	public function deleteAd()
	{
		if ($_POST) {
			$this->model->deleteAd($_POST['data']['id']);

			(Utils::isAjax() ? $this->successBox('Löschen erfolgreich!', '?s=listAds') : Utils::redirect('?s=listAds'));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listAds');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'ads');
		}
	}

	public function listContents()
	{
		$this->order = Utils::validateOrder($this->order, ['title', 'page']);

		$cnt  = $this->model->selectContents('', $this->filter, true);
		$data = $this->model->selectContents('', $this->filter, false, $this->order, $this->sort);

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'contents');
	}

	public function createContent()
	{
		if ($_POST) {
			$data  =& $_POST['data'];
			$data  = $this->model->cleanInput($data, ['content']);
			$error = false;

			if ($_FILES['file']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file']['path']
						.$_SESSION['backend'][$this->module]['upload']['file']
					);
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}

				$path = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file = md5($_FILES['file']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file'],
					$path.$file,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file'] = [
						'path' => $path,
						'file' => $file,
						'name' => $_FILES['file']['name'],
					];
				}
			}

			if ($_FILES['file_en']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file_en']['path']
						.$_SESSION['backend'][$this->module]['upload']['file_en']
					);
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}

				$path    = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file_en = md5($_FILES['file_en']['tmp_name']).'.'.Utils::filenameToExtension(
						$_FILES['file_en']['name']
					);

				if ($error = Utils::uploadFile(
					$_FILES['file_en'],
					$path.$file_en,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file_en'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [
						'path' => $path,
						'file' => $file_en,
						'name' => $_FILES['file_en']['name'],
					];
				}
			}

			if (!$error) {
				$required = [
					'title' => [],
					'page'  => [],
					'alias' => [],
				];

				$error = Utils::validateForm($required, $data);
			}


			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					$data['file']                                         = $_SESSION['backend'][$this->module]['upload']['file']['file'];
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}
				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					$data['file_en']                                         = $_SESSION['backend'][$this->module]['upload']['file_en']['file'];
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}

				if ($this->state == 'createContent') {
					$this->model->insertContent($data);
				} elseif ($this->state == 'editContent') {
					$this->model->updateContent($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listContents')
					: Utils::redirect(
						'?s=listContents'
					));
			}
		} else {
			if ($this->state == 'createContent') {
				$data = [
					'active' => '1',
					'page'   => '',
				];
			} elseif ($this->state == 'editContent') {
				$data = $this->model->selectContents($_GET['id']);
			}
		}

		$data['opt_page']   = $this->model->optPage($data['page']);
		$data['opt_active'] = Utils::opt01($data['active']);

		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files', $_SESSION['backend'][$this->module]['upload']);
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'contents');
	}

	public function editContent()
	{
		$this->createContent();
	}

	public function deleteContent()
	{
		if ($_POST) {
			$this->model->deleteContent($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listContents')
				: Utils::redirect(
					'?s=listContents'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listContents');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'contents');
		}
	}

	public function listStartImages()
	{
		$this->order = Utils::validateOrder($this->order, ['title', 'position']);

		$cnt  = $this->model->selectStartImages('', $this->filter, true);
		$data = $this->model->selectStartImages('', $this->filter, false, $this->order, $this->sort);

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'start_image');
	}

	public function createStartImage()
	{
		if ($_POST) {
			$data  =& $_POST['data'];
			$data  = $this->model->cleanInput($data);
			$error = false;

			if ($_FILES['file']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file']['path']
						.$_SESSION['backend'][$this->module]['upload']['file']
					);
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}

				$path = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file = md5($_FILES['file']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file'],
					$path.$file,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file'] = [
						'path' => $path,
						'file' => $file,
						'name' => $_FILES['file']['name'],
					];
				}
			}

			if ($_FILES['file_en']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file_en']['path']
						.$_SESSION['backend'][$this->module]['upload']['file_en']
					);
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}

				$path = DOCUMENT_ROOT_PATH.UPLOAD_PATH_AD;
				$file = md5($_FILES['file_en']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file_en']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file_en'],
					$path.$file,
					['jpg', 'jpeg', 'png', 'gif'],
					[],
					UPLOAD_MAX_FILESIZE_AD
				)
				) {
					$error = [
						'fields' => ['file_en'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [
						'path' => $path,
						'file' => $file,
						'name' => $_FILES['file_en']['name'],
					];
				}
			}

			if (!$error) {
				$required = [
					'title' => [],
				];
				$error    = Utils::validateForm($required, $data);
			}

			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					$data['file']                                         = $_SESSION['backend'][$this->module]['upload']['file']['file'];
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}
				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					$data['file_en']                                         = $_SESSION['backend'][$this->module]['upload']['file_en']['file'];
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}

				if ($this->state == 'createStartImage') {
					$this->model->insertStartImage($data);
				} elseif ($this->state == 'editStartImage') {
					$this->model->updateStartImage($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listStartImages')
					: Utils::redirect(
						'?s=listStartImages'
					));
			}
		} else {
			if ($this->state == 'createStartImage') {
				$data = [
					'active' => '1',
				];
			} elseif ($this->state == 'editStartImage') {
				$data = $this->model->selectStartImages($_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files', $_SESSION['backend'][$this->module]['upload']);
		}
		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files_en', $_SESSION['backend'][$this->module]['upload']);
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'start_image');
	}

	public function editStartImage()
	{
		$this->createStartImage();
	}

	public function deleteStartImage()
	{
		if ($_POST) {
			$this->model->deleteStartImage($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listStartImages')
				: Utils::redirect(
					'?s=listStartImages'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listStartImages');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'start_image');
		}
	}

	public function facebookStats()
	{
		$data = $this->model->getFacebookStats($_GET['ad_id']);
		print_r($data);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'fb');
	}

	public function editKeywordList()
	{
		if ($_POST) {
			$data =& $_POST['data'];
			$data = $this->model->cleanInput($data);

			$required = [
			];
			$error    = Utils::validateForm($required, $data);

			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				$data['id'] = 1;
				$this->model->updateKeywordList($data);
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=editKeywordList')
					: Utils::redirect(
						'?s=editKeywordList'
					));
			}
		} else {
			$data = $this->model->selectKeywordList(1);
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'keyword_list');
	}

	public function listTranslations()
	{
		$this->order = Utils::validateOrder($this->order, ['id', 'lang_de', 'lang_en']);

		$cnt  = $this->model->selectTranslations('', $this->filter, true);
		$data = $this->model->selectTranslations('', $this->filter, false, $this->order, $this->sort);

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'translations');
	}

	public function createTranslation()
	{
		if ($_POST) {
			$data =& $_POST['data'];

			$required = [
				'key' => [],
				//'lang_de' => array(),
			];
			if ($error = Utils::validateForm($required, $data)) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createTranslation') {
					$this->model->insertTranslation($data);
				} elseif ($this->state == 'editTranslation') {
					$this->model->updateTranslation($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listTranslations')
					: Utils::redirect(
						'?s=listTranslations'
					));
			}
		} else {
			if ($this->state == 'createTranslation') {
				$data = [
				];
			} elseif ($this->state == 'editTranslation') {
				$data = $this->model->selectTranslations($_GET['id']);
			}
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_tinymce', true);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'translations');
	}

	public function editTranslation()
	{
		$this->createTranslation();
	}

	public function deleteTranslation()
	{
		if ($_POST) {
			$this->model->deleteTranslation($_POST['data']['id']);
			Utils::redirect('?s=listTranslations');
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listTranslations');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
		}
	}

	public function listVideos()
	{
		$this->order = Utils::validateOrder($this->order, ['name', 'active']);

		$cnt  = $this->model->selectVideos('', $this->filter, true);
		$data = $this->model->selectVideos('', $this->filter, false, $this->order, $this->sort);

		foreach ($data as $key => $val) {
			$data[$key]['active'] = Utils::opt01($val['active'], false, true);
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'videos');
	}

	public function createVideo()
	{
		if ($_POST) {
			$data  =& $_POST['data'];
			$data  = $this->model->cleanInput($data);
			$error = false;

			if ($_FILES['file']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file']['path']
						.$_SESSION['backend'][$this->module]['upload']['file']
					);
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}

				$path = DOCUMENT_ROOT_PATH.UPLOAD_PATH_VIDEO;
				$file = md5($_FILES['file']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file'],
					$path.$file,
					['mp4', 'webm'],
					[],
					UPLOAD_MAX_FILESIZE_VIDEO
				)
				) {
					$error = [
						'fields' => ['file'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file'] = [
						'path' => $path,
						'file' => $file,
						'name' => $_FILES['file']['name'],
					];
				}
			}

			if ($_FILES['file2']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file2']['path']
						.$_SESSION['backend'][$this->module]['upload']['file2']
					);
					$_SESSION['backend'][$this->module]['upload']['file2'] = [];
				}

				$path  = DOCUMENT_ROOT_PATH.UPLOAD_PATH_VIDEO;
				$file2 = md5($_FILES['file2']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file2']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file2'],
					$path.$file2,
					['jpg', 'jpeg', 'png', 'gif', 'png'],
					[],
					UPLOAD_MAX_FILESIZE_VIDEO
				)
				) {
					$error = [
						'fields' => ['file2'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file2'] = [
						'path' => $path,
						'file' => $file2,
						'name' => $_FILES['file2']['name'],
					];
				}
			}

			///////
			if ($_FILES['file_en']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file_en']['path']
						.$_SESSION['backend'][$this->module]['upload']['file_en']
					);
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}

				$path = DOCUMENT_ROOT_PATH.UPLOAD_PATH_VIDEO;
				$file = md5($_FILES['file_en']['tmp_name']).'.'.Utils::filenameToExtension($_FILES['file_en']['name']);

				if ($error = Utils::uploadFile(
					$_FILES['file_en'],
					$path.$file,
					['mp4', 'webm'],
					[],
					UPLOAD_MAX_FILESIZE_VIDEO
				)
				) {
					$error = [
						'fields' => ['file_en'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [
						'path' => $path,
						'file' => $file,
						'name' => $_FILES['file_en']['name'],
					];
				}
			}

			if ($_FILES['file2_en']['name']) {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2_en'])) {
					Utils::deleteFile(
						$_SESSION['backend'][$this->module]['upload']['file2_en']['path']
						.$_SESSION['backend'][$this->module]['upload']['file2_en']
					);
					$_SESSION['backend'][$this->module]['upload']['file2_en'] = [];
				}

				$path  = DOCUMENT_ROOT_PATH.UPLOAD_PATH_VIDEO;
				$file2 = md5($_FILES['file2_en']['tmp_name']).'.'.Utils::filenameToExtension(
						$_FILES['file2_en']['name']
					);

				if ($error = Utils::uploadFile(
					$_FILES['file2_en'],
					$path.$file2,
					['jpg', 'jpeg', 'png', 'gif', 'png'],
					[],
					UPLOAD_MAX_FILESIZE_VIDEO
				)
				) {
					$error = [
						'fields' => ['file2_en'],
						'msg'    => $error,
					];
				} else {
					$_SESSION['backend'][$this->module]['upload']['file2_en'] = [
						'path' => $path,
						'file' => $file2,
						'name' => $_FILES['file2_en']['name'],
					];
				}
			}

			if (!$error) {
				$required = [
					'name' => [],
				];
			}

			if ($error = Utils::validateForm($required, $data)) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if (!empty($_SESSION['backend'][$this->module]['upload']['file'])) {
					$data['file']                                         = $_SESSION['backend'][$this->module]['upload']['file']['file'];
					$_SESSION['backend'][$this->module]['upload']['file'] = [];
				}
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2'])) {
					$data['file2']                                         = $_SESSION['backend'][$this->module]['upload']['file2']['file'];
					$_SESSION['backend'][$this->module]['upload']['file2'] = [];
				}

				if (!empty($_SESSION['backend'][$this->module]['upload']['file_en'])) {
					$data['file_en']                                         = $_SESSION['backend'][$this->module]['upload']['file_en']['file'];
					$_SESSION['backend'][$this->module]['upload']['file_en'] = [];
				}
				if (!empty($_SESSION['backend'][$this->module]['upload']['file2_en'])) {
					$data['file2_en']                                         = $_SESSION['backend'][$this->module]['upload']['file2_en']['file'];
					$_SESSION['backend'][$this->module]['upload']['file2_en'] = [];
				}


				if ($this->state == 'createVideo') {
					$data['cdate'] = time();
					$this->model->insertVideo($data);
				} elseif ($this->state == 'editVideo') {
					$this->model->updateVideo($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listVideos')
					: Utils::redirect(
						'?s=listVideos'
					));
			}
		} else {
			if ($this->state == 'createVideo') {
				$data = [
					'active' => '1',
				];
			} elseif ($this->state == 'editVideo') {
				$data = $this->model->selectVideos($_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files', $_SESSION['backend'][$this->module]['upload']);
		}
		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files2', $_SESSION['backend'][$this->module]['upload']);
		}

		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files_en', $_SESSION['backend'][$this->module]['upload']);
		}
		if (!empty($_SESSION['backend'][$this->module]['upload'])) {
			$this->smarty->assign('files2_en', $_SESSION['backend'][$this->module]['upload']);
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'videos');
	}

	public function editVideo()
	{
		$this->createVideo();
	}

	public function deleteVideo()
	{
		if ($_POST) {
			$this->model->deleteVideo($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listVideos')
				: Utils::redirect(
					'?s=listVideos'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listVideos');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'videos');
		}
	}

	public function listPackages()
	{
		$this->order = Utils::validateOrder($this->order, ['name_de', 'active']);

		$cnt  = $this->model->selectPackages('', $this->filter, true);
		$data = $this->model->selectPackages('', $this->filter, false, $this->order, $this->sort);

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'packages');
	}

	public function createPackage()
	{
		if ($_POST) {
			$data =& $_POST['data'];
			$data = $this->model->cleanInput($data);

			$required = [
				'name_de' => [],
			];
			$error    = Utils::validateForm($required, $data);

			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createPackage') {
					$this->model->insertPackage($data);
				} elseif ($this->state == 'editPackage') {
					$this->model->updatePackage($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listPackages')
					: Utils::redirect(
						'?s=listPackages'
					));
			}
		} else {
			if ($this->state == 'createPackage') {
				$data = [
					'price_suggestion' => '0',
					'auto'             => '',
				];
			} elseif ($this->state == 'editPackage') {
				$data = $this->model->selectPackages($_GET['id']);
			}
		}

		$data['opt_price_suggestion'] = Utils::opt01($data['price_suggestion']);
		$data['opt_auto']             = Utils::opt01($data['auto']);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'packages');
	}

	public function editPackage()
	{
		$this->createPackage();
	}

	public function deletePackage()
	{
		if ($_POST) {
			$this->model->deletePackage($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listPackages')
				: Utils::redirect(
					'?s=listPackages'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listPackages');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'packages');
		}
	}

	public function listCustomers()
	{
		$this->order = Utils::validateOrder($this->order, ['id', 'email', 'active']);

		$cnt  = $this->model->selectCustomers('', $this->filter, true);
		$data = $this->model->selectCustomers('', $this->filter, false, $this->order, $this->sort);

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'customers');
	}

	public function createCustomer()
	{
		if ($_POST) {
			$data =& $_POST['data'];
			$data = $this->model->cleanInput($data);

			$required = [
				'email' => [],
			];
			$error    = Utils::validateForm($required, $data);

			if ($error) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createCustomer') {
					$this->model->insertCustomer($data);
				} elseif ($this->state == 'editCustomer') {
					$this->model->updateCustomer($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listCustomers')
					: Utils::redirect(
						'?s=listCustomers'
					));
			}
		} else {
			if ($this->state == 'createCustomer') {
				$data = [
					'active' => '1',
				];
			} elseif ($this->state == 'editCustomer') {
				$data = $this->model->selectCustomers($_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'customers');
	}

	public function editCustomer()
	{
		$this->createCustomer();
	}

	public function deleteCustomer()
	{
		if ($_POST) {
			$this->model->deleteCustomer($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listCustomers')
				: Utils::redirect(
					'?s=listCustomers'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listCustomers');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'customers');
		}
	}

	public function backendreport1()
	{
		$this->order = Utils::validateOrder(
			$this->order,
			['id', 'company', 'street', 'postalcode', 'location', 'uid', 'phone', 'email', 'active', 'package']
		);

		$cnt  = $this->model->backendreport1(true);
		$data = $this->model->backendreport1(false);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('page_links', Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state));
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'backendreports');
	}

	public function listFacilities()
	{
		if ($this->order == '') {
			$this->order = 'sort asc, name';
		}

		$this->order = Utils::validateOrder($this->order, ['sort asc, name', 'name', 'active', 'icon']);

		$cnt  = $this->model->selectFacilities('', $this->filter, true);
		$data = $this->model->selectFacilities('', $this->filter, false, $this->order, $this->sort);

		foreach ($data as $key => $val) {
			$data[$key]['active'] = Utils::opt01($val['active'], false, true);

			$childs = $this->model->selectFacilities(
				'',
				$this->filter,
				false,
				$this->order,
				$this->sort,
				false
			);
			foreach ($childs as $key2 => $val2) {
				$childs[$key2]['active'] = Utils::opt01($val2['active'], false, true);
			}
			$data[$key]['childs'] = $childs;
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'facilities');
	}

	public function createFacility()
	{
		if ($_POST) {
			$data  =& $_POST['data'];
			$data  = $this->model->cleanInput($data);

			$required = [
				'name'  => [],
			];

			if ($error = Utils::validateForm($required, $data)) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createFacility') {
					$data['cdate'] = time();
					$this->model->insertFacility($data);
				} elseif ($this->state == 'editFacility') {
					$this->model->updateFacility($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listFacilities')
					: Utils::redirect(
						'?s=listFacilities'
					));
			}
		} else {
			if ($this->state == 'createFacility') {
				$data = [
					'active'    => '1',
				];
			} elseif ($this->state == 'editFacility') {
				$data = $this->model->selectFacilities($_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'facilities');
	}

	public function editFacility()
	{
		$this->createFacility();
	}

	public function deleteFacility()
	{
		if ($_POST) {
			$this->model->deleteFacility($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listFacilities')
				: Utils::redirect(
					'?s=listFacilities'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listFacilities');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'facilities');
		}
	}

	public function listProvisions()
	{
		if ($this->order == '') {
			$this->order = 'sort asc, name';
		}

		$this->order = Utils::validateOrder($this->order, ['sort asc, name', 'name', 'active']);

		$cnt  = $this->model->selectProvisions('', $this->filter, true);
		$data = $this->model->selectProvisions('', $this->filter, false, $this->order, $this->sort);

		foreach ($data as $key => $val) {
			$data[$key]['active'] = Utils::opt01($val['active'], false, true);

			$childs = $this->model->selectProvisions(
				'',
				$this->filter,
				false,
				$this->order,
				$this->sort,
				false
			);
			foreach ($childs as $key2 => $val2) {
				$childs[$key2]['active'] = Utils::opt01($val2['active'], false, true);
			}
			$data[$key]['childs'] = $childs;
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'provisions');
	}

	public function createProvision()
	{
		if ($_POST) {
			$data  =& $_POST['data'];
			$data  = $this->model->cleanInput($data);

			$required = [
				'name'  => [],
			];

			if ($error = Utils::validateForm($required, $data)) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createProvision') {
					$data['cdate'] = time();
					$this->model->insertProvision($data);
				} elseif ($this->state == 'editProvision') {
					$this->model->updateProvision($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listProvisions')
					: Utils::redirect(
						'?s=listProvisions'
					));
			}
		} else {
			if ($this->state == 'createProvision') {
				$data = [
					'active'    => '1',
				];
			} elseif ($this->state == 'editProvision') {
				$data = $this->model->selectProvisions($_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'provisions');
	}

	public function editProvision()
	{
		$this->createProvision();
	}

	public function deleteProvision()
	{
		if ($_POST) {
			$this->model->deleteProvision($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listProvisions')
				: Utils::redirect(
					'?s=listProvisions'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listProvisions');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'provisions');
		}
	}

	public function listCountries()
	{
		if ($this->order == '') {
			$this->order = 'name asc';
		}

		$this->order = Utils::validateOrder($this->order, ['name', 'name', 'active']);

		$cnt  = $this->model->selectCountries('', $this->filter, true);
		$data = $this->model->selectCountries('', $this->filter, false, $this->order, $this->sort);

		foreach ($data as $key => $val) {
			$data[$key]['active'] = Utils::opt01($val['active'], false, true);

			$childs = $this->model->selectCountries(
				'',
				$this->filter,
				false,
				$this->order,
				$this->sort,
				false
			);
			foreach ($childs as $key2 => $val2) {
				$childs[$key2]['active'] = Utils::opt01($val2['active'], false, true);
			}
			$data[$key]['childs'] = $childs;
		}

		$this->smarty->assign('data', $data);
		$this->smarty->assign(
			'page_links',
			Utils::pageLinks($cnt, $this->data_per_page, '?s='.$this->state.'&order='.$this->order.'&sort='.$this->sort)
		);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'countries');
	}

	public function createCountry()
	{
		if ($_POST) {
			$data  =& $_POST['data'];
			$data  = $this->model->cleanInput($data);

			$required = [
				'name'  => [],
			];

			if ($error = Utils::validateForm($required, $data)) {
				$this->smarty->assign('css', $error['fields']);
				$this->smarty->assign('msg', $error['msg']);
				$this->smarty->assign('B_error', true);
			} else {
				if ($this->state == 'createCountry') {
					$data['cdate'] = time();
					$this->model->insertCountry($data);
				} elseif ($this->state == 'editCountry') {
					$this->model->updateCountry($data);
				}
				(Utils::isAjax()
					? $this->successBox('Speichern erfolgreich!', '?s=listCountries')
					: Utils::redirect(
						'?s=listCountries'
					));
			}
		} else {
			if ($this->state == 'createCountry') {
				$data = [
					'active'    => '1',
				];
			} elseif ($this->state == 'editCountry') {
				$data = $this->model->selectCountries($_GET['id']);
			}
		}

		$data['opt_active'] = Utils::opt01($data['active']);

		$this->smarty->assign('data', $data);
		$this->smarty->assign('B_'.$this->state, true);
		$this->smarty->assign('menu', 'countries');
	}

	public function editCountry()
	{
		$this->createCountry();
	}

	public function deleteCountry()
	{
		if ($_POST) {
			$this->model->deleteCountry($_POST['data']['id']);

			(Utils::isAjax()
				? $this->successBox('Löschen erfolgreich!', '?s=listCountries')
				: Utils::redirect(
					'?s=listCountries'
				));
		} else {
			$this->smarty->assign('id', intval($_GET['id']));
			$this->smarty->assign('form_back', '?s=listCountries');
			$this->smarty->assign('form_action', '?s='.$this->state);
			$this->smarty->assign('B_del', true);
			$this->smarty->assign('menu', 'countries');
		}
	}
}

?>
