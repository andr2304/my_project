<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.05.2016
 * Time: 10:37
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;
use yii\web\Controller;
use app\services\MailService;


class CartController extends Controller{

    private $mail_service;
    private $session;
    private static $remove_session;


    public function __construct($id, $module, MailService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->mail_service = $service;
        $this->session =Yii::$app->session;
        $this->session->open();
    }

    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        if( !Yii::$app->request->isAjax ){
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        $session = $this->session;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear(){
        self::removeSession($this->session);
        $this->layout = false;
        $session = $this->session;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        $session = $this->session;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow(){
        $this->layout = false;
        $session = $this->session;
        return $this->render('cart-modal', compact('session'));
    }
    public function actionItems(){
        return $this->session['cart.qty'];
    }

    public function actionView(){
        $order = new Order();
        if( $order->load(Yii::$app->request->post()) ){
            $order->qty = $this->session['cart.qty'];
            $order->sum = $this->session['cart.sum'];
            if($order->save()){
                $this->saveOrderItems($this->session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
                $this->mail_service->order_send($order, ['session' => $this->session]);
                self::removeSession($this->session);
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }
        $session = $this->session;
        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems($items, $order_id){
        foreach($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }

    public static function removeSession($session){
        self::$remove_session = $session;
        self::$remove_session->remove('cart');
        self::$remove_session->remove('cart.qty');
        self::$remove_session->remove('cart.sum');
    }

}