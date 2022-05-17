<?php
// 클래스 선언
class Sample
{
    // member variable (멤버변수)
    // 멤버변수를 정의할 땐 $ 붙이지만 활용할 땐 붙이지 않는다.
    private $name;
    private $age;

    // constructor (생성자)
    public function __construct()
    {
      // 멤버변수에 접급할 땐 $를 붙이지 않는다. 
        $this->name = "yse";
        $this->age = "10";
    }

    // method
    public function tell()
    {
        echo "my name is {$this->name} .";
        echo " and my age is {$this->age} .";
    }

    // method. return $this
    public function add_age($age)
    {
        $this->age += $age;
        return $this;
    }

    // static method (정적메소드)
    // 정적인 속성을 가진 변수나 메소드는 인스턴스에 속하지 않고 클래스에 속한다
    // 디자인 패턴으로 인스턴스 생성
    public static function factory()
    {
        return new Sample();
    }

    public static function factory2()
    {
      // 정적인 메소드나 프로퍼티 호출할 땐 :: 사용
        return self::factory();
    }    
}
// 변수에 클래스 적용 
$sample = new Sample();
// 클래스 외부에서 메소드 참조
$sample->tell();

echo "<br />";
Sample::factory()->add_age(3)->tell();

// 팩토리 + 싱글톤 패턴 예시 
// 싱글톤은 생성자를 여러번 호출해서 인스턴스를 하나만 만드는 패턴이다

// private static $sample = null;
// public static function factory()
// {
//     if (self::$sample == null){
//         self::$sample = new Sample();
//     }

//     return self::$sample;
// }