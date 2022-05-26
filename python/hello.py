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

print('-------------Hello-----------------')
print('Hello, World!')

s = 'Hello, World!'

# 换行输出
print(s)
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

print('-------------Strings-----------------')
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

print('-------------Num-----------------')
print(10_000)     # 10000=10_000=100_00
print(2**4)       # **乘方

# 常量用大写，但实际上也是变量
MAX=10
print(MAX)
MAX=100
print(MAX)

a,b,c=1,2,3
print(f'{a} {b} {c}')

print('--------------Lists----------------')
bycycles = ['trek', 'cannondale', 'redline', 'specialized']
print(bycycles)
print(bycycles[0])
print(bycycles[-1])

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

cars = ['bmw', 'audi', 'toyota', 'subaru']
print(sorted(cars))
print(cars)
print(sorted(cars, reverse=True))

cars.reverse()
print(cars)

print(len(cars))

for car in cars:
    print(car)

for i in range(1,5):
    print(i)

# 打印命令行及输入参数
print('------------------------------')
import sys; print(sys.argv)

if True:
    print ("True")
else:
    print ("False")

 
 

#input("\n\n按下 enter 键后退出。")
