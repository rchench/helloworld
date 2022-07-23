#!/usr/local/bin/python3

# 注释
 
'''
注释
'''
 
"""
注释
"""

# Python之蝉
from re import L
import this

def hello(name='world'):
    print('-------------Hello-----------------')
    print(f'Hello, {name.title()}!')

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

def hello_strings():
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

def hello_num():
    print('-------------Num 数字-----------------')
    '''
    int: + - * / ** // % 乘方 相除一直返回float
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

def hello_lists():
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

def hello_tuple():
    print('--------------Tuple 元组----------------')
    # 就是不能修改的列表
    tuples = (200, 50)
    print(tuples[0])
    print(tuples[1])
    # single element must use ,
    tuples = (200,)

def hello_if():
    print('--------------If/While 条件语句----------------')
    car = "toyota"
    if car.lower() == 'bmw':
        print("This is a BMW")
    elif car.lower() == 'toyota':
        print("This is a TOYOTA")
    else:
        print("This is not a car I know")

    # True False
    # == != > < >= <= in and or ()
    banned_users = ['andrew', 'carolina', 'david']
    user = 'marie'
    if user not in banned_users:
        print(f"{user.title()}, you can post a response if you wish.")

    '''
    while True:
        break
        continue
    '''

def hello_dicitonary():
    print('--------------Dictionary 字典----------------')
    alien_0 = {'color': 'green', 'points': 5}
    print(alien_0)
    print(alien_0['points'])
    del alien_0['points']
    print(alien_0)
    point_value = alien_0.get('points', 'No point value assigned.')	# use .get to avoid error that key does not exist
    print(point_value)

    mydict = {
        'jen': 'python',
        'sarah': 'c',
        'edward': 'ruby',
        'phil': 'python',
        }

    for k, v in mydict.items():
        print(f"Key: {k} Value: {v}")
    for k in mydict.keys():
        print(f"Key: {k}")
    for v in mydict.values():
        print(f"Value: {v}")

    for language in set(mydict.values()):	# set removes duplicated values
        print(language.title())

    # Dict List
    alien_0 = {'color': 'green', 'points': 5}
    alien_1 = {'color': 'yellow', 'points': 10}
    alien_2 = {'color': 'red', 'points': 15}
    aliens = [alien_0, alien_1, alien_2]
    for alien in aliens:
        print(alien)
    print(aliens)

    new_alien = {'color': 'black', 'points': 100}
    aliens.append(new_alien)
    print(aliens)

    # Dict in Dict
    users = {
        'aeinstein': {
            'first': 'albert',
            'last': 'einstein',
            'location': 'princeton',
            },
        'mcurie': {
            'first': 'marie',
            'last': 'curie',
            'location': 'paris',
            },
    }
    for username, user_info in users.items():
        print(f"\nUsername: {username}")
        full_name = f"{user_info['first']} {user_info['last']}"
        location = user_info['location']
        print(f"\tFull name: {full_name.title()}")
        print(f"\tLocation: {location.title()}")

def hello_input():
    print('--------------Input----------------')
    name = input("Tell me your name:")
    print(f"Hello {name}")
    age = input("Tell me your age:")
    age = int(age)
    if age >= 18:
        print("You are good to go")
    else:
        print("You can not go")

def hello_func():
    print('--------------Function 函数----------------')
    unprinted_designs = ['phone case', 'robot pendant', 'dodecahedron']
    completed_models = []
    print_models(unprinted_designs, completed_models)
    show_completed_models(completed_models)
    print(unprinted_designs)

    unprinted_designs = ['phone case', 'robot pendant', 'dodecahedron']
    completed_models = []
    print_models(unprinted_designs[:], completed_models)
    show_completed_models(completed_models)
    print(unprinted_designs)

    # import a module, need module name when calling the functions
    import pizza
    pizza.make_pizza(12, 'pepperoni')
    pizza.make_pizza(16, 'mushrooms', 'green peppers', 'extra cheese')

    # import functions from a module, no module name need when calling the functions
    # from module import func1, func2, ...
    # from module import *
    from pizza import make_pizza
    make_pizza(16, 'pepperoni')
    make_pizza(12, 'mushrooms', 'green peppers', 'extra cheese')

    # from module import func as fn 指定func别名
    # import module as mn 指定module别名

    user_profile = build_profile('albert', 'einstein', location='princeton', field='physics')
    print(user_profile)

def print_models(unprinted_designs, completed_models):
    while unprinted_designs:
        current_design = unprinted_designs.pop()
        print(f"Printing model: {current_design}")
        completed_models.append(current_design)

def show_completed_models(completed_models):
    print("\nThe following models have been printed:")
    for completed_model in completed_models:
        print(completed_model)

def build_profile(first, last, **user_info):
    # **user_info: kv pairs
    user_info['first_name'] = first
    user_info['last_name'] = last
    return user_info

def hello_class():
    print('--------------Class 类----------------')
    my_dog = Dog('Mylee', 0.5)
    your_dog = Dog('Coco', 10)

    print(f"my dog's name is {my_dog.name}.")
    print(f"my dog is {my_dog.age} years old.")

    my_dog.sit()
    my_dog.roll_over()

    your_dog.sit()

    my_car = Car('volkswagen', 'passat', 2017)
    print(my_car.get_descriptive_name())

    my_car.odometer_reading = 60
    print(f'{my_car.odometer_reading}')

    my_car.update_odometer(23_500)
    my_car.read_odometer()
    my_car.increment_odometer(100)
    my_car.read_odometer()
    my_car.fill_gas_tank(15)

    my_tesla = ElectricCar('tesla', 'model s', 2019)
    print(my_tesla.get_descriptive_name())
    my_tesla.read_odometer()
    my_tesla.launch_auto_pilot()
    my_tesla.battery.describe_battery()
    my_tesla.fill_gas_tank(15)

class Dog:
    def __init__(self, name, age):
        self.name = name
        self.age = age

    def sit(self):
        print(f'{self.name} is now sitting.')

    def roll_over(self):
        print(f'{self.name} rolled over!')

class Car:
    def __init__(self, make, model, year):
        self.make = make
        self.model = model
        self.year = year
        self.odometer_reading = 0

    def get_descriptive_name(self):
        long_name = f"{self.year} {self.make} {self.model}"
        return long_name.title()

    def read_odometer(self):
        print(f"This car has {self.odometer_reading} miles on it.")

    def update_odometer(self, mileage):
        if mileage >= self.odometer_reading:
            self.odometer_reading = mileage
        else:
            print("You can't roll back an odometer!")

    def increment_odometer(self, miles):
        self.odometer_reading += miles

    def fill_gas_tank(self, gallon):
        print(f'{gallon} gallon gas filled in the gas tank.')

class Battery:
    def __init__(self, battery_size=75):
        self.battery_size = battery_size

    def describe_battery(self):
        print(f"This car has a {self.battery_size}-kWh battery.")

# 继承 必须放在Car Class后面
class ElectricCar(Car):
    def __init__(self, make, model, year):
        super().__init__(make, model, year)
        # 添加新属性
        self.auto_pilot = True
        # 新属性来自另一s个子类
        self.battery = Battery()

    # 添加新方法
    def launch_auto_pilot(self):
        if self.auto_pilot:
            print('Auto pilot launched. Please put your hands behind the wheel.')
        else:
            print('Your Telsa does not support auto pilot.')

    # 重写方法
    def fill_gas_tank(self, gallon):
        print("This car doesn't have a gas tank!")

# 打印命令行及输入参数
import sys; print(sys.argv)

if len(sys.argv) > 1:
    s = sys.argv[1]
    l = False
else:
    s = input('\ngive me an input (enter "quit" or press Enter to quit):')
    l = True

while True:
    if s.lower() == 'quit' or s == '':
        break
    elif s == 'helloworld':
        hello()
    elif s == 'hello':
        n = input('give me your name:')
        hello(name=n)
    elif f'hello_{s}' in globals():
        globals()[f'hello_{s}']()
    else:
        print(f'hello_{s} not define. try something else:')

    if l:
        s = input('\ngive me an input (enter "quit" or press Enter to quit):')
    else:
        break
