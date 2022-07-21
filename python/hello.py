#!/usr/local/bin/python3

# 第一个注释
# 第二个注释
 
'''
第三注释
第四注释
'''
 
"""
第五注释
第六注释
"""

# Python之蝉
import this

print('-------------Hello-----------------')
print('Hello, World!')

s = 'Hello, World!'

# 换行输出
print(s)
from multiprocessing.connection import _ConnectionBase
import sys; sys.stdout.write(s + '\n')

# 不换行输出
print(s, end=' ')
sys.stdout.write(s)
print()

x = 10
print(x)                   # print automatically convert anything to string
sys.stdout.write(str(x))   # stdout.write need to convert number to string
print()

print('hello\nrunoob')      # 使用反斜杠(\)+n转义特殊字符
print(r'hello\nrunoob')     # 在字符串前面添加一个 r，表示原始字符串，不会发生转义

print('-------------Strings 字符串-----------------')
s = '123456789' 
print(s)                 # 输出字符串
print(s[0:-1])           # 输出第一个到倒数第二个的所有字符
print(s[0])              # 输出字符串第一个字符
print(s[2:5])            # 输出从第三个开始到第五个的字符
print(s[2:])             # 输出从第三个开始后的所有字符
print(s[1:5:2])          # 输出从第二个开始到第五个且每隔一个的字符（步长为2）
print(s * 2)             # 输出字符串两次
print(s + '你好')         # 连接字符串
print(f'Hello {s}!')     # 嵌入字符串 since python3.6

s = ' rick cheN '
print(f'{s} {s.title()} {s.upper()} {s.lower()}')
print(s.strip())
print(s.lstrip())
print(s.rstrip())

print('-------------Num 数字-----------------')
'''
int: + - * / ** 乘方 相除一直返回float
>>> 4/2
2.0
float: 返回小数位数可能不确定
>>> 0.2+0.1
0.30000000000000004
'''

print(10_000)   # 10000=10_000=100_00 since python 3.6

a,b,c=1,2,3.5     # 多个数赋值
print(f'{a} {b} {c}')   # 字符串里输出数值变量

# Python没有常量，但通常用大写来代表变量
MAX_Connections=1000

print('--------------Lists 列表----------------')
bycycles = ['trek', 'cannondale', 'redline', 'specialized']
print(bycycles)
print(bycycles[0])
print(bycycles[-1])
print(bycycles[1:3])
print(bycycles[:3])
print(bycycles[2:])
print(bycycles[-3:])
print(len(bycycles))

motorcycles = ['honda', 'yamaha', 'suzuki']
print(motorcycles)
motorcycles.append('ducati')
print(motorcycles)
del motorcycles[-1]
print(motorcycles)
motorcycles.insert(0, 'ducati')
print(motorcycles)
print(motorcycles.pop())
print(motorcycles)
print(motorcycles.pop(0))
print(motorcycles)
motorcycles.remove('yamaha')
print(motorcycles)

cars = ['bmw', 'audi', 'toyota', 'subaru']
cars.sort()
print(cars)
cars.sort(reverse=True)
print(cars)
cars.reverse()
print(cars)

cars = ['bmw', 'audi', 'toyota', 'subaru']
print(sorted(cars)) # only returns result but does not change the list
print(sorted(cars, reverse=True))

for car in cars:
    print(car)

my_foods = ['pizza', 'falafel', 'carrot cake']
# duplicate a list
friend_foods = my_foods[:]
# don't use `friend_foods = my_foods`, that is not duplication but a reference to the same
my_foods.append('cannoli')
friend_foods.append('ice cream')
print("My favorite foods are:")
print(my_foods)
print("My friend's favorite foods are:")
print(friend_foods)

# 数字列表
for i in range(1,5):
    print(i)

print(list(range(1,5)))

for i in list(range(1,5)):
    print(i)

even_numbers = list(range(2, 11, 2))
print(even_numbers)

digits = list(range(0,10))
print(min(digits))
print(max(digits))
print(sum(digits))

squares = [value**2 for value in range(1, 11)]
print(squares)

print('--------------Dimensions 元组----------------')
# 就是不能修改的列表
dimensions = (200, 50)
print(dimensions[0])
print(dimensions[1])
# single element must use ,
dimensions = (200,)

# 打印命令行及输入参数
print('------------------------------')
import sys; print(sys.argv)

if True:
    print ("True")
else:
    print ("False")

 
 

#input("\n\n按下 enter 键后退出。")
