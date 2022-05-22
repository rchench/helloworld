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

print('Hello, World!')

s = 'Hello, World!'

# 换行输出
print(s)
import sys; sys.stdout.write(s + '\n')

# 不换行输出
print( s, end=' ' )
sys.stdout.write(s)
print()

x = 10
print(x)                   # print automatically convert anything to string
sys.stdout.write(str(x))   # stdout.write need to convert number to string
print()

print('hello\nrunoob')      # 使用反斜杠(\)+n转义特殊字符
print(r'hello\nrunoob')     # 在字符串前面添加一个 r，表示原始字符串，不会发生转义

print('------------------------------')
str = '123456789' 
print(str)                 # 输出字符串
print(str[0:-1])           # 输出第一个到倒数第二个的所有字符
print(str[0])              # 输出字符串第一个字符
print(str[2:5])            # 输出从第三个开始到第五个的字符
print(str[2:])             # 输出从第三个开始后的所有字符
print(str[1:5:2])          # 输出从第二个开始到第五个且每隔一个的字符（步长为2）
print(str * 2)             # 输出字符串两次
print(str + '你好')         # 连接字符串
print(f'Hello {str}!')     # 嵌入字符串 since python3.6

print('------------------------------')
str = ' rick cheN '
print(f'{str} {str.title()} {str.upper()} {str.lower()}')
print(str.strip())
print(str.lstrip())
print(str.rstrip())


# 打印命令行及输入参数
print('------------------------------')
import sys; print(sys.argv)

if True:
    print ("True")
else:
    print ("False")

 
 

#input("\n\n按下 enter 键后退出。")