<?php

    /*
     * 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
     * 2. Описать свойства класса из п.1 (состояние).
     * 3. Описать поведение класса из п.1 (методы).
     * 4. Придумать наследников класса из п.1. Чем они будут отличаться?
     */

    class Product {
        
        public $id; // id товара
        public $category; // категория товара
        public $title; // название товара
        public $description; // описание товара
        public $price; // цена
        public $amount; // количество

        public function __construct($id, $category, $title, $description, $price, $amount) {
            
            $this->id = $id;
            $this->category = $category;
            $this->title = $title;
            $this->description = $description;
            $this->price = $price;
            $this->amount = $amount;
                               
        }
        
        public function ProductDisplay() {
            
            echo "<strong>Отображение товара</strong>"."<br/>";
            echo "ID товара: ".$this->id."<br/>";
            echo "Категоря товара: ".$this->category."<br/>";
            echo "Название товара: ".$this->title."<br/>";
            echo "Описание товара: ".$this->description."<br/>";
            echo "Цена товара: ".$this->price."<br/>";
            echo "Кол-во товара: ".$this->amount."<br/>";
                        
        }

        public function OrderGoods($quantity) {
            
            $sum = $this->amount - $quantity;
            $total = $this->price * $sum;
            $this->amount -= $quantity;
            
            echo "Вы заказали ".$quantity." единиц товара."."<br/>";
            echo "Итоговая сумма заказа ".$total." у.е."."<br/>";
            echo "Остаток ".$this->amount."<br/>";  
            
        }
        
    }
    
    class Action extends Product {
    
        public $season;
        public $color;
        public $size;
    
        function __construct($id, $category, $title, $description, $price, $amount, $season, $color, $size) {

            parent::__construct($id, $category, $title, $description, $price, $amount);
        
            $this->season = $season;        
            $this->color = $color;        
            $this->size = $size;

        }
    
        public function ProductDisplay() {
            
            parent::ProductDisplay();
            
            echo "Сезон товара: ".$this->season."<br/>";
            echo "Цвет товара: ".$this->color."<br/>";
            echo "Размер товара: ".$this->size."<br/>";

        }
        
    }    
    

    $obj1 = new Product(100, "Черви", "Калифорнийский", "Наживка для рыб средних размеров", 25, 250);
    $obj1 -> ProductDisplay();
    echo "================="."<br/>";
    $obj1 -> OrderGoods(60);
    echo "================="."<br/>";
    
    $obj2 = new Action (200, "Черви", "Дендробена", "Наживка для рыб крупных размеров", 50, 250, "Зима", "Красный", "Мелкий");
    $obj2 -> ProductDisplay();
    echo "================="."<br/>";
    $obj2 -> OrderGoods(100);
    echo "================="."<br/>";    


    /*
     * 5. Дан код:
     */
    
    class A {

        public function foo() {

            static $x = 0;
            echo ++$x;

        }
    }

    $a1 = new A();
    $a2 = new A();
    $a1->foo(); // 0 + 1 = 1
    $a2->foo(); // 1 + 1 = 2
    $a1->foo(); // 2 + 1 = 3
    $a2->foo(); // 3 + 1 = 4
    
    // Переменная x задана как статическая. Значение сохраняется в методе.
    
    /*
     * Немного изменим п.5:
     * 6. Объясните результаты в этом случае.
     */

    class A {
    
        public function foo() {
            
            static $x = 0;
            echo ++$x;
        }
    }

    class B extends A {
        
    }

    $a1 = new A();
    $b1 = new B();
    $a1->foo(); // 0 + 1 = 1
    $b1->foo(); // 0 + 1 = 1
    $a1->foo(); // 1 + 1 = 2
    $b1->foo(); // 1 + 1 = 2
    
    // используем объект дочернего класса с наследуемыми свойствами
    
    
    /*
     * 7. *Дан код:
     * Что он выведет на каждом шаге? Почему?
     */
    
    class A {
    
        public function foo() {
        
            static $x = 0;
            echo ++$x;
                
        }
    }

    class B extends A {
        
    }

    $a1 = new A;
    $b1 = new B;
    $a1->foo(); // 0 + 1 = 1
    $b1->foo(); // 0 + 1 = 1
    $a1->foo(); // 1 + 1 = 2
    $b1->foo(); // 1 + 1 = 2    
    
    // отсутствует конструктор, можно не передавать аргументы