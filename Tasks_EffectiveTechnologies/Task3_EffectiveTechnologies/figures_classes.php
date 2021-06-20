<?php
include "function.php";

abstract class Figure
{
	public function getFigureArea()
	{
		return "*Вернул площадь";
	}
	public function getTitle()
	{
		return "*Вывел заголовок";
	}
}

class Rectangle extends Figure
{
	private $X;
	private $Y;

	function __construct()
	{
		$this->X = rand(1,20);
		$this->Y = rand(1,20);
	}
	public function getFigureArea()
	{
		return ($this->X * $this->Y);
	}
	public function getTitle()
	{
		echo getTitleString($this);
	}
}

class Circle extends Figure
{
	private $R;

	function __construct()
	{
		$this->R = rand(1, 20);
	}
	public function getFigureArea()
	{
		return ((pi()*pow($this->R, 2)));
	}
	public function getTitle()
	{
		echo getTitleString($this);
	}
}

class Triangle extends Figure
{
	private $A;
	private $B;
	private $C;

	function __construct()
	{
		$this->A = rand(1, 20);
		$this->B = rand(1, 20);
		$this->C = rand(abs(($this->A - $this->B)) + 1, (($this->A + $this->B) - 1));
	}
	public function getFigureArea()
	{
		$p = ($this->A + $this->B + $this->C) / 2;
		return (sqrt($p * ($p - $this->A) * ($p - $this->B) * ($p - $this->C)));
	}
	public function getTitle()
	{
		echo getTitleString($this);
	}
}


// Классы заводов -->


abstract class FactoryFigure
{
	public function Create()
	{
		return "Вернул созданный объект";
	}
}

class FactoryRectangle extends FactoryFigure
{
	public function Create()
	{
		return new Rectangle();
	}
}
class FactoryCircle extends FactoryFigure
{
	public function Create()
	{
		return new Circle();
	}
}
class FactoryTriangle extends FactoryFigure
{
	public function Create()
	{
		return new Triangle();
	}
}

// Завод случайных фигур
// Использует "Подзаводы" каждой из фигур
// Создает фигуру на случайном "Подзаводе"
class FactoryRandomFigure extends FactoryFigure
{
	private $FactorysFigure;
	private $FactoryCount;

	function __construct($FactorysFigure)
	{
		$this->FactorysFigure = $FactorysFigure;
		$this->FactoryCount = count($FactorysFigure);
	}
	public function Create()
	{
		$randFactory = rand(0, ($this->FactoryCount - 1));
		return ($this->FactorysFigure[$randFactory]->Create());
	}
}
