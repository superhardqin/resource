package distance

import "fmt"

//format 的格式 https://studygolang.com/articles/2644
func FormatOut()  {
	price := 64.7

	num := 12

	name := "porsche"

	f := fmt.Sprintf("%s price is %.2f,we need %d", name, price, num)

	fmt.Println(f)
}