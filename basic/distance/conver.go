package distance

import (
	"fmt"
	"strconv"
)

//字符串转整形
func string2int()  {
	carNum := "12"

	var num64Pre int64
	num64Pre = 0
	//string to int64
	num64,_ := strconv.ParseInt(carNum, 10, 64)
	num64Pre += num64
	fmt.Println(num64Pre)

	var num32Pre int32
	num32Pre = 0

	//string to int32
	num32,_ := strconv.ParseInt(carNum, 10, 32)
	num32Pre+= int32(num32)

	fmt.Println(num32Pre)

	var num16Pre int16
	num16Pre = 0

	//string to int16
	num16,_ := strconv.ParseInt(carNum, 10, 16)
	num16Pre+= int16(num16)

	fmt.Println(num16Pre)

	var num8Pre int8
	num8Pre = 0

	//string to int8
	num8,_ := strconv.ParseInt(carNum, 10, 8)
	num8Pre+= int8(num8)

	fmt.Println(num8Pre)

	var numPre int
	numPre = 0

	//string to int
	num,_ := strconv.Atoi(carNum)
	numPre+= num


	fmt.Println(numPre)
}

//整形转字符串
func int2string()  {

	var num64 int64
	num64 = 12

	// int64 to string
	str64 := strconv.FormatInt(num64, 10)
	fmt.Println(str64)

	var num32 int32
	num32 = 12

	// int32 to string
	str32 := strconv.FormatInt(int64(num32), 10)
	fmt.Println(str32)

}

//浮点数转字符串
func float2string()  {
	var float64 float64
	float64 = 1.0987656765

	// float to string
	strF64 := strconv.FormatFloat(float64, 'f',-1,64)

	fmt.Println(strF64)
}

//整形和浮点数互转
func inteachfloat()  {
	var numfloat64 float64
	numfloat64 = 1.8765432

	//float64 to int64
	var number64 int64
	number64 = int64(numfloat64)

	fmt.Println(number64)

	var numint64 int64
	numint64 = 12

	//int64 to float64
	var floatto64 float64
	floatto64 = float64(numint64)

	fmt.Println(floatto64)
}

//浮点数运算取精
func accuracy() {
	a := 0.7
	b := 0.1

	c := round(a+b, 2)

	if a + b == 0.8 {
		fmt.Println("a + b == 0.8 eq")
	}else{
		fmt.Println("a + b == 0.8 not eq")
	}

	if c == 0.8 {
		fmt.Println("c == 0.8 eq")
	}else{
		fmt.Println("c == 0.8 not eq")
	}
}

func round(f float64, n int) float64 {
	floatStr := fmt.Sprintf("%."+strconv.Itoa(n)+"f", f)
	inst, _ := strconv.ParseFloat(floatStr, 64)
	return inst
}


func ConverLogic()  {

	//string2int()

	//int2string()

	//inteachfloat()

	accuracy()
}