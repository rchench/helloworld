import matplotlib.pyplot as plt

#print(plt.style.available)
plt.style.use('seaborn')

fig, ax = plt.subplots()
input_values = [1, 2, 3, 4, 5]
squares = [1, 4, 9, 16, 25]
ax.plot(input_values, squares, linewidth=3)
plt.show()

fig, ax = plt.subplots()
ax.scatter(2, 4, c='red', s=200)
plt.show()

fig, ax = plt.subplots()
x_values = [1, 2, 3, 4, 5]
y_values = [1, 4, 9, 16, 25]
ax.scatter(x_values, y_values, c=(0, 0.8, 0), s=100)
plt.show()

fig, ax = plt.subplots()
x_values = range(1, 1001)
y_values = [x**2 for x in x_values]
ax.scatter(x_values, y_values, c=y_values, cmap=plt.cm.Blues, s=10)
ax.axis([0, 1100, 0, 1100000])

ax.set_title("Square Numbers", fontsize=24)
ax.set_xlabel("Value", fontsize=14)
ax.set_ylabel("Square", fontsize=14)
ax.tick_params(axis='both', which='major', labelsize=14)

plt.show()
#plt.savefig('squares_plot.png', bbox_inches='tight')

from random import choice
class RandomWalk:
    def __init__(self, num_points=5000):
        self.num_points = num_points
        self.x_values = [0]
        self.y_values = [0]
    
    def fill_walk(self):
        while len(self.x_values) < self.num_points:
            x_direction = choice([1, -1])
            x_distance = choice([0, 1, 2, 3, 4])
            x_step = x_direction * x_distance
            y_direction = choice([1, -1])
            y_distance = choice([0, 1, 2, 3, 4])
            y_step = y_direction * y_distance
            if x_step == 0 and y_step == 0:
                continue
            x = self.x_values[-1] + x_step
            y = self.y_values[-1] + y_step
            self.x_values.append(x)
            self.y_values.append(y)

rw = RandomWalk()
rw.fill_walk()
fig, ax = plt.subplots()
ax.scatter(rw.x_values, rw.y_values, s=15)
plt.show()