from car import Car

class Battery:
    def __init__(self, battery_size=75):
        self.battery_size = battery_size

    def describe_battery(self):
        print(f"This car has a {self.battery_size}-kWh battery.")

    def get_range(self):
        if self.battery_size == 75:
            range = 260
        elif self.battery_size == 100:
            range = 315

        print(f"This car can go about {range} miles on a full charge.")

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