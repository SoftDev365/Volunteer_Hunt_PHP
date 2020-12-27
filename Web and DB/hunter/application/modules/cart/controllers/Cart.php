<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Cart extends MY_Controller {



    Public function __construct(){

        parent::__construct();

        $this->load->model("cart_model","kart");

    }

    public function showCartData()
	{
		echo "<pre>";
		print_r ($this->session->all_userdata());
		echo "</pre>";die;
	}



	public function addProductInCart()

	{
		// print_r($_POST); die;
		$data = $this->kart->addProductInCart($_POST);
		
		header('Content-type: application/json; charset=utf-8"');

		echo json_encode($data);die;

	}

	public function deleteProductFromCart()

	{
		//echo "string"; die;
		$data = $this->kart->deleteProductFromCart($_POST);
		checkCouponAmmount();
		header('Content-type: application/json; charset=utf-8"');

		echo json_encode($data);die;

	}

	public function destroyCart()

	{
		if($this->cart->destroy()){
			$this->session->unset_userdata('user_coupon');
		}

		redirect(base_url("shopping-cart"));

	}

	public function updateCart()
	{

		if($this->kart->updateCartProductQty($_POST))

		{
			checkCouponAmmount();
			redirect(base_url("shopping-cart"));

		}else{

			redirect("sign-in");

		}

	}

	public function updateCartCheckout()
	{
		$_POST['qty'] = explode(' | ', $_POST['qty']);
		$_POST['rowid'] = explode(' | ', $_POST['rowid']);
		if($this->kart->updateCartProductQty($_POST))
		{
			checkCouponAmmount();
			echo 1;
		}else{
			redirect("sign-in");
			echo 0;
		}

	}

}