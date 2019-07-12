package distance

import "fmt"

type Car struct {
	engine string
}

type Moto interface {
	SetName(name string)
	GetName()string
}

type mCar struct {

	name string
}

func (c *mCar) SetName(name string) {
	c.name = name
}

func (c *mCar) GetName() string {
	return c.name
}

// 值类型 引用类型
func Logic()  {

	var a bool
	a = true

	var b int32
	b = 12

	var c float32
	c = 1.89

	var d string
	d = "d"

	var e = [2]string{"a", "b"}

	var f = []string{"a","b"}

	var g map[string]string
	g = make(map[string]string)
	g["a"] = "a"

	var h = Car{"ferrari"}

	var s = mCar{"ferrari"}

	s.SetName("porsche")

	m := s.GetName()

	fmt.Println(m)


	fmt.Println(a,b,c,d,e,f,g,h)

	change(a,b,c,d,e,f,g,h)

	fmt.Println(a,b,c,d,e,f,g,h)

	change_origin(&a,&b,&c,&d,&e)

	fmt.Println(a,b,c,d,e)
}

func change(a bool, b int32, c float32, d string, e [2]string, f[]string, g map[string]string,car Car)  {
	a = false
	b = 10
	c = 1.00
	d = "a"
	e[0] = "c"
	f[0] = "c"
	g["a"] = "c"
	car.engine = "porsche"
}

func change_origin(a *bool, b *int32, c *float32, d *string,e *[2]string)  {
	*a = false
	*b = 10
	*c = 1.00
	*d = "a"
	e[0] = "c"
}