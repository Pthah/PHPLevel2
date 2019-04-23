<?php

    /*
     * 1. Создать структуру классов ведения товарной номенклатуры.
     * а) Есть абстрактный товар.
     * б) Есть цифровой товар, штучный физический товар и товар на вес.
     * в) У каждого есть метод подсчета финальной стоимости.
     * г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
     * д) Что можно вынести в абстрактный класс, наследование?
     */

    abstract class Product {
        
        private $name;
        private $price;
        private $quantity;
        
        /*
         *  итого
         */
        abstract function total(); 
        
        /*
         * вывод товара
         */
        abstract protected function ProductDisplay();                
        
    }
    
    class DigitalGoods extends Product {
        
        function __construct($name, $price, $quantity) {
        
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
        }
    
        public function total() {
        
            return ($this->price / 2);
                
        }

        public function ProductDisplay() {
            
            echo "<strong>Цифровой товар</strong>"."<br/>";
            echo "Название товара: ".$this->name."<br/>";
            echo "Цена товара: ".$this->price."<br/>";
            echo "Кол-во товара: ".$this->quantity."<br/>";
            echo "Итого: ".$this->total()."<br/>";
            
        }        
        
    }
    
    class PieceGoods extends Product {

        function __construct($name, $price, $quantity) {
        
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;

        }
    
        public function total() {
        
            return ($this->price);
                
        }

        public function ProductDisplay() {
            
            echo "<strong>Штучный товар</strong>"."<br/>";
            echo "Название товара: ".$this->name."<br/>";
            echo "Цена товара: ".$this->price."<br/>";
            echo "Кол-во товара: ".$this->quantity."<br/>";
            echo "Итого: ".$this->total()."<br/>";
            
        }  
        
    }    
    
    class WeightGoods extends Product {

        function __construct($name, $price, $quantity) {
        
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;

        }
    
        public function total() {
        
            return ($this->price * $this->quantity);
                
        }

        public function ProductDisplay() {
            
            echo "<strong>Штучный товар</strong>"."<br/>";
            echo "Название товара: ".$this->name."<br/>";
            echo "Цена товара: ".$this->price."<br/>";
            echo "Кол-во товара: ".$this->quantity."<br/>";
            echo "Итого: ".$this->total()."<br/>";
            
        }  
        
    }    
    
    $dg = new DigitalGoods("Лицензия", "1500", "15");    
    $dg -> ProductDisplay();
    echo "================="."<br/>";
    $pg = new PieceGoods("Автомобиль", "1500000", "3");    
    $pg -> ProductDisplay();
    echo "================="."<br/>";
    $wg = new WeightGoods("Пшено", "200", "3");    
    $wg -> ProductDisplay();
    
    /*
     * д) Что можно вынести в абстрактный класс, наследование?
     * 
     * Выносим поля и общий абстрактный метод, который необходимо переопределить в каждом дочернем классе.
     */



    
    /*
     * 2. *Реализовать паттерн Singleton при помощи traits.
     */
    trait SingletonTrait {
        
        private static $instance;

        private function __construct() { 
            
            /* @return Singleton */ 
            
        } 
        
        private function __clone() { 
            
            /* @return Singleton */ 
            
        }
    
        private function __wakeup()  { 
            
            /* @return Singleton */ 
            
        }

        public static function getInstance() {

            if ( empty(self::$instance) ) {
                
                self::$instance = new self();
            
            }
            
            return self::$instance;
        }
    }
    
    class Singleton {
    
        use singletontrait;
    
        public function doAction() { 
    
            echo "Тест ...";
            
        }
    }
    
    Singleton::getInstance()->doAction();     